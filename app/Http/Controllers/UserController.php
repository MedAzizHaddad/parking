<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
//        Log::info('Showing the user profile for user: {id}', ['id' => $request->all()]);
//
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash::make($request->password),
        ]);


        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }



    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Assuming 'role' is a field in the users table
            $role = $user->role;

            // Or if you have a separate roles table with a relationship
            // $role = $user->role()->first()->name;

            // Redirect based on role
            if ($role === 'admin') {
                return redirect()->intended('/parkings');
            } elseif ($role === 'user') {
                return redirect()->intended('/home');
            }

            // Default redirect if role doesn't match
            return redirect()->intended('/dashboard');
        }

        return redirect()->route('login')->with('error', 'Invalid credentials. Please try again.');
    }
}
