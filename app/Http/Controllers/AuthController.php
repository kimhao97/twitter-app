<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        dump('register');
        return view('auth.register');
    }

    public function store()
    {
        dump('store');
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed'
        ]);

        User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );
        dump(request()->get('email'));
        return redirect()->route('dashboard')->with('success','Account created successfully!');
    }
}
