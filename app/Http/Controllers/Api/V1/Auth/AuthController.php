<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ChangePasswordRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\ProfileRequest;
use App\Http\Resources\PlayerResource;
use App\Models\Admin\Provider;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    use HttpResponses;
    public function login(LoginRequest $request)
    {
        $request->validated($request->all());
        $credentials = $request->only('phone', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::where('phone', $request->phone)->first();
            return $this->success([
                'user' => $user,
                'token' => $user->createToken('Api Token of '. $user->name)->plainTextToken
            ], "Logged In Successfully.");
        } else {
            return $this->error("", "Credentials do not match!", 401);
        }
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return $this->success([
            'message' => 'Logged out successfully.'
        ]);
    }

    public function getUser()
    {
        return $this->success(Auth::user(),'User Success');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $request->validated();
        $player = User::find(Auth::user()->id);
        if(Hash::check($request->currentPassword, $player->password)) {
             $player->update([
                'password' => $request->password
             ]);
        }else{
             return $this->error('','Old Passowrd is incorrect',401);
        }
        return $this->success($player,'Password has been changed successfully.');
    }

    public function profile(ProfileRequest $request)
    {
        
        $image = $request->file('profile');
        $filename = null;
        if($image){
            $ext = $image->getClientOriginalExtension();
            $filename = uniqid('player_profile') . '.' . $ext; // Generate a unique filename
            $image->move(public_path('assets/img/player_profile/'), $filename); // Save the file

        }
        $player = Auth::user();
        $player->update([
            'profile' => $filename,
            'phone' => $request->phone
        ]);
     
        return new PlayerResource($player);
      
    }

    public function callback(Request $request)
    {
        $player = User::where('name',$request->username)->first();
        $provider = Provider::where('p_code',$request->provider)->first();
        
        if(!is_null($player) && !is_null($provider) && $request->password == config('common.backend_password'))
        {
            Log::info($request->all());
            return "true";
        }else{
            
            return "false";
        }

    }
}