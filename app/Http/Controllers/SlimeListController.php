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
    public function store(){
        
    }
}
