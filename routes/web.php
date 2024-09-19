<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', [UsuarioController::class, 'index']);
Route::get('/create', [UsuarioController::class, 'create']);
Route::get('/destroy', [UsuarioController::class, 'destroy']);
Route::get('/edit', [UsuarioController::class, 'edit']);
Route::get('/show', [UsuarioController::class, 'show']);
Route::get('/store', [UsuarioController::class, 'store']);
Route::get('/update', [UsuarioController::class, 'update']);