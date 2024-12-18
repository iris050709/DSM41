<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\isAuthenticated;

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

Route::middleware([isAuthenticated::class])->group(function(){
    Route::get('/usuario/list', [UsuarioController::class,'list'])->name('user.list');
});
Route::get('/usuario/creado', [UsuarioController::class, 'create'])->name('user.create');
Route::post('/usuario/creado', [UsuarioController::class, 'store'])->name('user.store');

Route::get('/usuario/update/{id}', [UsuarioController::class,'edit'])->name('user.update');
Route::post('/usuario/update', [UsuarioController::class,'update'])->name('user.update.data');
Route::get('/usuario/delete/{id}', [UsuarioController::class,'destroy'])->name('user.destroy');

Route::get('login', [AuthController::class, 'showLogin']);
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('/home', function(){
    return view('home');
})->name('home');

Route::get('/product/created', [ProductController::class, 'create'])->name('products.create');
Route::post('/product/created', [ProductController::class, 'store'])->name('products.store');
Route::get('/product/list', [ProductController::class, 'list'])->name('products.list');
Route::get('/product/show/{product}', [ProductController::class,'show'])->name('products.show');
Route::get('/product/update/{id}', [ProductController::class,'edit'])->name('products.update');
Route::post('/product/update', [ProductController::class,'update'])->name('products.update.data');
Route::get('/product/delete/{id}', [ProductController::class,'destroy'])->name('products.destroy');

