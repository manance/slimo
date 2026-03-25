<?php

namespace App\Http\Controllers;
use App\Models\History;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        $people = User::find(Auth::id())->history;
        return view('history.index', compact('people'));
    }
}
