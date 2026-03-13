<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function destroy() {
        Auth::logout();
        return redirect('/');
    }
    public function create() {
        return view('auth.login');
    }
    public function store(Request $request) {
        $validated = $request->validate([
            "name" => ["required", "max:50"],
            "password" => ["required"]
        ]);
        if(!Auth::attempt($validated)){
            throw ValidationException::withMessages([
                "name" => "Incorect name or password"
            ]);
        }
        $request->session()->regenerate();
        return redirect('/list');
    }
}
