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

    Route::get('/list', [SlimeListController::class, 'index'])->name('list');
    Route::get('/list/create', [SlimeListController::class, 'create']);
    Route::post('/list/create', [SlimeListController::class, 'store']);
    Route::get('/list/{list}', [SlimeListController::class, 'show']);
    Route::put('/list/{list}', [SlimeListController::class, 'update']);
    Route::delete('/list/{list}', [SlimeListController::class, 'destroy']);
    Route::get('/list/{list}/edit', [SlimeListController::class, 'edit']);

    Route::get('/type', [SlimeTypeController::class, 'index']);
    Route::get('/type/create', [SlimeTypeController::class, 'create']);
    Route::post('/type/create', [SlimeTypeController::class, 'store']);
    Route::get('/type/{type}', [SlimeTypeController::class, 'show']);
    Route::put('/type/{type}', [SlimeTypeController::class, 'update']);
    Route::delete('/type/{type}', [SlimeTypeController::class, 'destroy']);
});
