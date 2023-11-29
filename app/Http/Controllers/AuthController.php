<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'admin']);
        $this->middleware('auth')->only(['admin']);
    }
    

    // Show registration form
    public function showRegistrationForm()
    {
        return view('LoginRegister.Register');
    }

    // Handle registration form submission
        public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);


        return redirect('/login')->with('success', 'Registration successful. Please log in.');
    }

    

    // Show login form
    public function showLoginForm()
    {
        return view('LoginRegister.Login');
    }

    // Handle login form submission
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Check if the logged-in user has the 'admin' role
            if (Auth::user()->role == 'admin') {
                // Redirect admin user to the admin dashboard
                return redirect()->route('admin');
            }
    
            // For non-admin users, redirect them to the intended page after login
            return redirect()->intended('/admin'); // Change this to your default redirect path
        }
    
        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
    // Log out the user
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
