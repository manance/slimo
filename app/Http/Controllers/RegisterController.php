<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class RegisterController extends Controller
{
    public function create() {
        return view('auth.register');
    }
    public function store(Request $request) {
        $validated = $request->validate([
            "name" => ["required", "max:50"],
            "email" => ["required", "email", Rule::unique("users", "email")],
            "password" => ["required", Password::min(8)->numbers(2)->letters()->symbols(), "confirmed"]
        ]);
        $user = User::create($validated);
        Auth::login($user);
        $request->session()->regenerate();
        return redirect('/list');
    }
}
