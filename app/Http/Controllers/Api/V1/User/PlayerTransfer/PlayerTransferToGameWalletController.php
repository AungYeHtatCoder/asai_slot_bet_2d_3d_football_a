<?php

namespace App\Http\Controllers\Api\V1\User\PlayerTransfer;

use App\Models\User; 
use App\Traits\HttpResponses;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Provider;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PlayerTransferToGameWalletController extends Controller
{
    use HttpResponses;
    public function showPlaySlotGameForm()
    {
        $providers = Provider::all();
        // Convert the providers to an array and then to JSON
        $providersArray = $providers->toArray();
        // Return the providers as a JSON response
        return $this->success($providersArray);
    }
    public function playSlotGame(Request $request) {
        $user = Auth::user();
         $validatedData = $request->validate([
        'amount' => 'required|numeric',
        'provider_code' => 'required|string',
    ]);
    
    // Now we can be sure that $amount and $providerCode are present and correct
    $amount = $validatedData['amount'];
    $providerCode = $validatedData['provider_code'];
        $amount = $request->input('amount');
        $providerCode = $request->input('provider_code'); // Use the provider code from the request
        $config = config('common'); // Fetching config values

        // Check if the user has enough balance
        if ($user->balance < $amount) {
            return response()->json(['error' => 'Insufficient balance'], 400);
        }

        // Start transaction
        DB::beginTransaction();
        try {
            // Deduct from user's balance
            /** @var \App\Models\User $user **/
            $user->decrement('balance', $amount);

            // Get or create the user's wallet
            /** @var \App\Models\User $user **/

            $userWallet = $user->userWallet()->firstOrCreate(['user_id' => $user->id]);

            // Dynamically determine the wallet field name based on the provider code
            $walletField = strtolower($providerCode) . '_wallet'; // e.g., 'pg_wallet'

            // Check that this wallet field exists on the model to prevent errors
            if (!array_key_exists($walletField, $userWallet->getAttributes())) {
                return response()->json(['error' => 'Invalid provider code'], 400);
            }

            // Add to provider's wallet
            $userWallet->increment($walletField, $amount);

            // Prepare API call parameters
            $operatorCode = $config['operatorcode'];
            $password = $config['backend_password']; // The password for the game provider
            $type = '0'; // '0' for withdrawal based on your successful Postman test
            $referenceId = Str::random(10); // Generate a unique reference ID

            // Ensure the amount is formatted correctly
            $formattedAmount = number_format((float)$amount, 2, '.', ''); // Two decimal places

            // Generate the signature for the API call
            $signature = $this->generateSignature($formattedAmount, $operatorCode, $password, $providerCode, $referenceId, $type, $user->name, $config['secret_key']);

            // Make the API call
            $response = $this->makeApiCall($operatorCode, $user->name, $password, $signature, $providerCode, $referenceId, $type, $formattedAmount);

            // Check the API response
            // ... after making the API call

    if (isset($response['status']) && $response['status'] === 'failed') {
        // The API call failed, handle this case as needed
        DB::rollBack();
        return response()->json(['error' => $response['errMsg']], 500);
    }

        // If API call was successful and 'balance' key exists, use it to update the user's balance
        $newBalance = $response['balance'] ?? $userWallet->{$walletField};
        $userWallet->update([$walletField => $newBalance]);

        // Log the transaction
        $this->logTransaction($user, $amount, $response, $referenceId);

        // If everything was successful, commit the transaction
        DB::commit();

        $wallet = $userWallet::with('user')->where('user_id', auth()->user()->id)->first();
        // return response()->json(['success' => 'Game played successfully', 'balance' => $newBalance]);
        return $this->success($wallet);
    } catch (\Exception $e) {
        // If there was an exception, roll back the transaction
        DB::rollBack();
        return response()->json(['error' => 'Transaction failed', 'message' => $e->getMessage()], 500);
    }
    }

    private function generateSignature($amount, $operatorCode, $password, $providerCode, $referenceId, $type, $username, $secretKey) {
        // Format the amount to ensure it has two decimal places
        $formattedAmount = number_format((float)$amount, 2, '.', '');

        // Concatenate the parameters
        $signatureString = $formattedAmount . $operatorCode . $password . $providerCode . $referenceId . $type . $username . $secretKey;
        
        // MD5 encryption and then convert to uppercase
        return strtoupper(md5($signatureString));
    }
    private function makeApiCall($operatorCode, $username, $password, $signature, $providerCode, $referenceId, $type, $formattedAmount) {
        $url = "https://gsmd.336699bet.com/makeTransfer.aspx";
        $response = Http::get($url, [
            'operatorcode' => $operatorCode,
            'username' => $username,
            'password' => $password,
            'signature' => $signature,
            'providercode' => $providerCode,
            'referenceid' => $referenceId,
            'type' => $type,
            'amount' => $formattedAmount,
        ]);
        
        if ($response->successful()) {
            $responseBody = $response->json();
            // Check if 'errCode' is set and is '0', which might indicate success in your API's case
            if (isset($responseBody['errCode']) && $responseBody['errCode'] === '0') {
                return ['status' => 'success', 'data' => $responseBody];
            } else {
                // Handle the case where 'errCode' is not '0' or not set
                return ['status' => 'failed', 'errMsg' => $responseBody['errMsg'] ?? 'API call failed'];
            }
        }
        
        // Handle the case where the HTTP call itself fails
        return ['status' => 'failed', 'errMsg' => 'HTTP request failed'];
    }


    private function updateUserBalance($user, $newBalance) {
        // Update the user's balance with the new balance
        $user->wallet = $newBalance; // user table should have a 'balance' column
        $user->save();
    }
    private function logTransaction($user, $amount, $gameResult, $referenceId) {
        // Check if 'balance' key exists in the gameResult array
        $balance = $gameResult['balance'] ?? null; // Use null as a default value or choose a different default
        $request = request();
        $providerCode = $request->input('provider_code'); // Use the provider code from the request
        // Log the transaction in the player_transfer_logs table
        DB::table('player_transaction_logs')->insert([
            
            'user_id' => $user->id, // or another relevant user ID
            'refrence_id' => $referenceId,
            'cash_in' => $amount, // or 'cash_out' depending on the context
            'p_code' => $providerCode, // Use the provider code from the request
            'sync' => 0,
            'sync_time' => 0,
            //'note' => 'Game played successfully', // or another relevant note
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

}