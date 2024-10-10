<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Ruta para listar usuarios
Route::get('/prueba', [UsuarioController::class, 'index'])->name('usuario.index');

// Rutas para crear y almacenar un nuevo usuario
Route::get('/create', [UsuarioController::class, 'create'])->name('usuario.create');
/*Route::post('/store', [UsuarioController::class, 'store'])->name('usuario.store');*/

// Rutas para editar y actualizar un usuario
Route::get('/edit/{usuario}', [UsuarioController::class, 'edit'])->name('usuario.edit');
Route::put('/update/{usuario}', [UsuarioController::class, 'update'])->name('usuario.update');

// Ruta para eliminar un usuario
Route::delete('/destroy/{usuario}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');

// Ruta para mostrar un usuario específico
Route::get('/show/{usuario}', [UsuarioController::class, 'show'])->name('usuario.show');
Route::get('/usuario/creado', [UsuarioController::class, 'create']);
Route::post('/usuario/creado', [UsuarioController::class, 'store'])->name('user.store');
Route::get('/usuario/list', [UsuarioController::class,'list'])->name('user.list');
Route::get('/usuario/update/{id}', [UsuarioController::class,'edit'])->name('user.update');
Route::post('/usuario/update', [UsuarioController::class,'update'])->name('user.update.data');
Route::get('/usuario/delete/{id}', [UsuarioController::class,'destroy'])->name('user.destroy');