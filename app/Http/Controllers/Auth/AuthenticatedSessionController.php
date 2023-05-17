<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // login user
        if(!auth()->attempt($request->only('email','password'))){
            return response()->json([
                'message' => 'Invalid login details',
                'status' => 401
            ]);
        }

        // generate token
        $token = auth()->user()->createToken('authToken')->plainTextToken;
        return response()->json([
            'message' => 'Login successful',
            'status' => 200,
            'token' => $token
        ]);
    }


    public function register(Request $request)
    {
        // api validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        // create data
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) // encrypt password
        ];

        // store data
        $user = User::create($data);
        return response()->json([
            'message' => 'Registration successful',
            'status' => 200,
            'data' => $user
        ]);

    }
}
