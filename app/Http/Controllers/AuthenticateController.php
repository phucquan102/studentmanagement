<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    // Login view
    public function login()
    {
        return view('auth.login');
    }

    // Register view
    public function register()
    {
        if (auth()->check()) {
            return redirect()->route('success');
        }
        return view('auth.register');
    }

    // Login action
    public function doLogin(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to log the user in
        if (auth()->attempt($request->only('email', 'password'))) {
            // Redirect to success page
            return redirect()->route('success');
        }

        // Redirect to login page with an error message
        return redirect()->route('login')->with('error', 'Email or password is incorrect');
    }

    // Register action
    public function doRegister(Request $request)
    {
        $role = $request->input('role'); 
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
    
        if ($role === 'admin' || $role === 'student') { 
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $role,
            ]);
    
            if ($user) {
                return $this->redirectToDashboard($role);
            }
        }
    
        return redirect()->route('login');
    }
    

    protected function redirectToDashboard($role)
    {
        switch ($role) {
            case 'admin':
                return redirect()->route('students.index'); 
            case 'student':
                return redirect()->route('home');
            default:
                return redirect()->route('login');
        }
    }

    // Logout action
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
