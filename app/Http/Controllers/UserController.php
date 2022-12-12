<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    // 

    function index(Request $request)
    {
        // $user= User::where('email', $request->email)->first();
        // print_r($data);
            // if (!$user || !Hash::check($request->password, $user->password)) {
            //     return response([
            //         'message' => ['These credentials do not match our records.']
            //     ], 404);
            // }
        
            //  $token = $user->createToken('my-app-token')->plainTextToken;
        
            // $response = [
            //     'user' => $user,
            //     'token' => $token
            // ];
        
            //  return response($response, 201);
    }

    function login(Request $request)
    {
        $credential = $request->validate([
        'email' => 'required',
        'password' => 'required',
        ]);

        if(!Auth::attempt($credential)) {
            throw ValidationException::withMessages([
                'email' => [
                    __('auth.failed')
                ]
            ]);
        }
        $user = $request->user();
        $token = $token = $user->createToken('my-app-token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
    
         return response($response, 201);
    }

    public function logout() 
    {
        return Auth::logout();
    }
}

