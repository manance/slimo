<?php

namespace App\Http\Controllers;
use App\Models\History;
use App\Models\SlimeList;
use App\Models\SlimeType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SlimeListController extends Controller
{
    public function index(User $user){
        $people = $user->people();
        return view('list.index', compact('people'));
    }
    public function show(SlimeList $list){
        if($list->user_id !== Auth::id()){
            abort(404, "Page not found.");
        }
        return view('list.show', compact('list'));
    }
    public function create(){
        $slimes = SlimeType::all();
        return view('list.create', compact('slimes'));
    }
    public function store(Request $request){
        $slimes = SlimeType::all();
        $validated = $request->validate([
            "first_name" => ["required", "max:20"],
            "last_name" => ["required", "max:20"],
            "reason" => ["required", "max:200"],
            "estimated_date" => ["required"],
            "user_id" => ["required"],
            "slime" => ["required"]
        ]);
        foreach($slimes as $slime){
            if($validated["slime"] == $slime->id){
                $count = 1;
                $count += $slime->affected_people;
                $slime->update([
                    "affected_people" => $count
                ]);
            }
        }
        SlimeList::create([
            "first_name" => $validated["first_name"],
            "last_name" => $validated["last_name"],
            "reason" => $validated["reason"],
            "estimated_date" => $validated["estimated_date"],
            "user_id" => $validated["user_id"],
            "slime_type_id" => $validated["slime"]
        ]);
        History::create([
            "name" => $validated["first_name"],
            "surname" => $validated["last_name"],
            "execution" => "none",
            "time_of_event" => $validated["estimated_date"],
            "user_id" => $validated["user_id"],
            "slime_type_id" => $validated["slime"]
        ]);
        $request->session()->regenerate();
        return redirect("/list");
    }
    public function edit(SlimeList $list){
        $slimes = SlimeType::all();
        if($list->user_id !== Auth::id()){
            abort(404, "page not found.");
        }
        return view('list.edit', compact('list', 'slimes'));
    }
    public function update(Request $request, SlimeList $list){
        $validated = $request->validate([
            "first_name" => ["required", "max:20"],
            "last_name" => ["required", "max:20"],
            "estimated_date" => ["required"],
            "user_id" => ["required"],
            "slime" => ["required"]
        ]);
        $list->update([
            "first_name" => $validated["first_name"],
            "last_name" => $validated["last_name"],
            "estimated_date" => $validated["estimated_date"],
            "user_id" => $validated["user_id"],
            "slime_type_id" => $validated["slime"]
        ]);
        $request->session()->regenerate();
        return redirect("/list");
    }
    public function destroy(SlimeList $list, Request $request){
        $people = User::find(Auth::id())->history;
        foreach($people as $person){
            if($person->id == $list->id){
                $person->update([
                    "execution" => "canceled"
                ]);
            }
        }
        $list->delete();
        $request->session()->regenerate();
        return redirect("/list");
    }
}
