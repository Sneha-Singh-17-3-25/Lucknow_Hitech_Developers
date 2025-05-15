<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class registerController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function landing_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|unique:users|regex:/^[6-9][0-9]{9}$/',

            'password' => 'required|string|min:8',
            'userType' => 'required|in:buyer,seller,agent',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->userType);

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 200);
    }

    public function landing_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'status' => 'success',
                'message' => 'Login successful',
                'user' => Auth::user()
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials'
        ], 401);
    }

    public function landing_logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); // Invalidates the session
        $request->session()->regenerateToken(); // Prevents CSRF reuse

        return response()->json([
            'status' => 'success',
            'message' => 'Logout successful'
        ]);
    }
}