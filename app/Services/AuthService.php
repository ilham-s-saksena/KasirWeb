<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthService
{
    public function index(array $data){
        $emailCheck = User::where("email", $data['email'])->first();

        if (!$emailCheck) {
            throw new ModelNotFoundException("User not found");            
        }

        if (Auth::attempt($data)) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->plainTextToken;

            return [
                'message' => 'Login successful',
                'token' => $token,
                'role' => $user->role,
                'isMerchantExist' => false
            ];
        }
        else {
            throw new AuthenticationException("User not authenticated");            
        }


    }

    public function login(array $data){
        $emailCheck = User::where("email", $data['email'])->first();
        if (!$emailCheck) {
            return false;            
        }
        if (Auth::attempt($data)) {
            return true;
        }
        else {
            return false;            
        }
    }

}