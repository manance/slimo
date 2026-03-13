<?php
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SlimeListController;
use App\Models\SlimeList;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('profile', function (){
        return view('auth.profile');
    });
    Route::delete('/logout', [SessionController::class, 'destroy']);
    Route::get('/list', [SlimeListController::class, 'index']);
    Route::get('/create', [SlimeListController::class, 'create']);
    Route::post('/create', [SlimeListController::class, 'store']);
});
