<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

# Sessions Controller controls both loging in and registering
class SessionsController extends Controller
{
    public function create()
    {
        # Getting the blade view for the login page
        return view ('sessions.create');

    }

    public function register()
    {
        # Handling registration for an unregistered user
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'unique:users,username', 'min:3', 'max:255'],
            'password' => ['required', 'min:7', 'max:255'],
            'email' => ['required', 'unique:users,email', 'email', 'max:255'],
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/')->with('success', 'Your account has been created!');

    }

    public function store()
    {
        # Handling login for a registered user
        $attribute = request()->validate([
            'email' => ['required', 'exists:users,email'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($attribute)){
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect.'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome back, ' . Auth::user()->name . '!');

    }

    public function destroy()
    {
        # Handling the logout process
        Auth::logout();

        return redirect('/')->with('success', 'Goodbye!');

    }
}
