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
    public function edit(SlimeType $type){
        return view('slimes.edit', compact('type'));
    }
    public function update(Request $request, SlimeType $type){
        $validated = $request->validate([ 
            "rating" => ["required", "gte:1", "lte:10"] 
        ]);
        
        $count = $type->people_rated + 1;
        $x = ($type->rating * $count) + $validated["rating"];
        // dd($type->rating, $count, $x, $x / $count);
        $rating = (($type->rating * $type->people_rated) + $validated["rating"]) / $count;
        $type->update([
            "rating" => $rating,
            "people_rated" => $count
        ]);
        $request->session()->regenerate();
        return redirect("/type/$type->id");
    }
    public function destroy(SlimeType $type, Request $request){
        $type->delete();
        $request->session()->regenerate();
        return redirect("/type");
    }
}