<?php

namespace App\Http\Controllers\Amk;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlayerTransferToGameWalletController extends Controller
{
    public function showPlaySlotGameForm()
{
    $providerCoders = DB::table('providers')->get();
    return view('amk_test.play_slot_game', compact('providerCoders'));
}

public function playSlotGame(Request $request) {
    $user = Auth::user();
    $amount = $request->input('amount');
    $providerCode = 'PG'; // Use the provider code as per your configuration
    $config = config('common'); // Fetching config values

    // Check if the user has a related wallet and enough balance
    // Check user's balance
        if ($user->balance < $amount) {
            return response()->json(['error' => 'Insufficient balance'], 400);
        }
        /** @var \App\Models\User $user **/
        // Deduct from user's balance
        $user->balance -= $amount;
        $user->save();

        // Add to user's wallet
        $userWallet = $user->wallet; // Assuming $user->wallet() relationship exists
        $userWallet->pg_wallet += $amount;
        $userWallet->save();
        
    // Prepare API call parameters
    $operatorCode = $config['operatorcode'];
    $password = $config['backend_password']; // The password for the game provider
    $type = '0'; // '0' for withdrawal based on your successful Postman test
    $referenceId = Str::random(10); // Generate a unique reference ID

    // Ensure the amount is formatted correctly as per the successful Postman test
    $formattedAmount = number_format((float)$amount, 2, '.', ''); // Use two decimal places if that is what works 10000.0

    $signature = $this->generateSignature($formattedAmount, $operatorCode, $password, $providerCode, $referenceId, $type, $user->name, $config['secret_key']);

    // Generate the URL as per Postman request
    $url = "https://gsmd.336699bet.com/makeTransfer.aspx?" . http_build_query([
        'operatorcode' => $operatorCode,
        'username' => $user->name,
        'password' => $password,
        'signature' => $signature,
        'providercode' => $providerCode,
        'referenceid' => $referenceId,
        'type' => $type,
        'amount' => $formattedAmount
    ]);
// Make API call
$response = $this->makeApiCall($url);

// Check if the response includes an error code or message
if (isset($response['errCode']) && $response['errCode'] !== '0') {
    // Refund the deducted amount if the transfer fails
    $user->wallet->wallet += $amount;
    $user->wallet->save();

    // Provide the error message from the response
    $errorMessage = $response['errMsg'] ?? 'API call failed';
    return response()->json(['error' => $errorMessage], 500);
} else {
    // Check if the 'balance' key exists in the response array
    if (!isset($response['balance'])) {
        // Handle the case where 'balance' key is missing
        // Perhaps set a default or fetch the latest balance from your system
        $newBalance = $user->wallet->wallet; // This should be the fallback balance
    } else {
        // If 'balance' key exists, use it to update the user's balance
        $newBalance = $response['balance'];
        $user->wallet->wallet = $newBalance;
        $user->wallet->save();
    }

    $this->logTransaction($user, $amount, $response, $referenceId);

    // Respond with success
    return response()->json(['success' => 'Game played successfully', 'balance' => $newBalance]);
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

private function makeApiCall($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200) {
        return json_decode($response, true);
    }
    
    return ['status' => 'failed'];
}

private function updateUserBalance($user, $newBalance) {
    // Update the user's balance with the new balance
    $user->wallet = $newBalance; // user table should have a 'balance' column
    $user->save();
}
private function logTransaction($user, $amount, $gameResult, $referenceId) {
    // Check if 'balance' key exists in the gameResult array
    $balance = $gameResult['balance'] ?? null; // Use null as a default value or choose a different default

    // Log the transaction in the player_transfer_logs table
    DB::table('player_transfer_logs')->insert([
        'from_user_id' => $user->id,
        'to_user_id' => $user->id, // or another relevant user ID
        'refrence_id' => $referenceId,
        'cash_in' => $amount, // or 'cash_out' depending on the context
        'cash_balance' => $balance ?? '0' , // Use the checked balance here
        // ... other fields as needed
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}

}