<?php

namespace App\Http\Controllers;

use App\Models\SlimeType;
use Illuminate\Http\Request;

class SlimeTypeController extends Controller
{
    public function index(){
        $slimes = SlimeType::all();
        return view('slimes.index', compact('slimes'));
    }
    public function show(SlimeType $type){
        return view('slimes.show', compact('type'));
    }
    public function create(){
        return view('slimes.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            "name" => ["required", "max:100"]
        ]);
        SlimeType::create([
            "name" => $validated["name"]
        ]);
        $request->session()->regenerate();
        return redirect('/type');
    }
}
