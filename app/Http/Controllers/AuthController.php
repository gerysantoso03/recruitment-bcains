<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Return register page
    public function registerPage()
    {
        return view('admin.register');
    }

    public function loginPage()
    {
        return view('admin.login');
    }

    // Sign In Verification
    public function signInVerification(request $request)
    {
        // Validate fields before request login
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin-dashboard')->with('success', 'User successfully logged in!!');
        }
        // Get request input
        return back()->with('error', 'Failed to attempt login request, username or password are incorrect!!');
    }

    // Create new user / Register
    public function registerNewUser(request $request)
    {
        // Validate request input
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|regex:/[0-9]/|min:11|max:13',
            'password' => 'required|min:8'
        ]);

        // Get request input
        $data = $request->all();

        // Create new user
        User::create([
            "username" => $data['username'],
            "email" => $data['email'],
            "phone_number" => $data['phone_number'],
            "password" => Hash::make($data['password']),
        ]);

        return redirect('/login')->with('success', 'New user successfully registered!');
    }

    // Logout function 
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login')->with('success', 'User successfully logout!!');
    }
}
