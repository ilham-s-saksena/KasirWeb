<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(Request $request, AuthService $authService){
        $validated = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($request->expectsJson()) {
            
            $data = $authService->index($validated);
    
            return response()->json([
                'message' => $data['message'],
                'token' => $data['token'],
                'role' => $data['role'],
                'isMerchantExist' => $data['isMerchantExist']
            ]);

        } else {
            if ($authService->login($validated)) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->with('message', 'invalid email or password');
            }
            
        }
    }

    public function login(){
        return view('auth.login');
    }
}
