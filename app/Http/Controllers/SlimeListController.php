<?php

namespace App\Http\Controllers;

use App\Models\SlimeList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SlimeListController extends Controller
{
    public function index(User $user){
        $slimes = $user->slimes();
        return view('list.index', compact('slimes'));
    }
    public function create(){
        return view('list.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            "first_name" => ["required", "max:20"],
            "last_name" => ["required", "max:20"],
            "reason" => ["required", "max:200"],
            "estimated_date" => ["required"],
            "user_id" => ["required"],
            "slime_type_id" => ["required"]
        ]);
        SlimeList::create([
            "first_name" => $validated["first_name"],
            "last_name" => $validated["last_name"],
            "reason" => $validated["reason"],
            "estimated_date" => $validated["estimated_date"],
            "user_id" => $validated["user_id"],
            "slime_type_id" => $validated["slime_type_id"]
        ]);
        $request->session()->regenerate();
        return redirect("/list");
    }
}
