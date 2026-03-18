<?php
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SlimeListController;
use App\Http\Controllers\SlimeTypeController;
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
    Route::get('/list/create', [SlimeListController::class, 'create']);
    Route::post('/list/create', [SlimeListController::class, 'store']);
    Route::get('/list/{list}', [SlimeListController::class, 'show']);
    Route::get('/list/{list}/edit', [SlimeListController::class, 'edit']);
    Route::put('/list/{list}', [SlimeListController::class, 'update']);
    Route::delete('/list/{list}', [SlimeListController::class, 'destroy']);

    Route::get('/type', [SlimeTypeController::class, 'index']);
    Route::get('/add-type', [SlimeTypeController::class, 'create']);
    Route::post('/add-type', [SlimeTypeController::class, 'store']);
});
