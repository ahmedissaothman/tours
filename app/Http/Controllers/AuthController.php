<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'destination' => 'nullable|string|max:255',
        ]);

        // If validation fails, redirect with an error message
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'The email already exists or other validation errors occurred.');
        }

        // Create a new user if validation passes
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'destination' => $request->destination,
        ]);

        $user->assignRole('normal');

        // Redirect to the welcome page with a success message
        return redirect('/')->with('success', 'User registered successfully.');
    }


    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $user = Auth::user();

    //         if ($user->hasRole('admin')) {
    //             return redirect()->route('/admin-page.index'); 
    //         } else {
    //             return redirect()->route('/welcome'); 
    //         }
    //     }

    //     return redirect()->back()->with('error', 'Invalid credentials.');
    // }
}