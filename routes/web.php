<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('principal');
});
// rutas nombradas
//           parametro      controlador             metodo        // nombre de la ruta con el cual se instancia
Route::get('/registro', [RegisterController::class, 'index'])->name('register');
Route::post('/crear-cuenta', [RegisterController::class, 'store']);

//ir a view login
Route::get('/login',[LoginController::class,'index'])->name('login');
//ir a validacion de inicio de sesion
Route::post('/login',[LoginController::class,'store']);
//cerrar sesion
Route::post('/logout',[LogoutController::class,'store'])->name('logout');


//aplicando modelo router end poit, en este caso apunta al controller user
//se mostrara el url como del username {user:name}
Route::get('/{user:username}/',[PostController::class,'index'])->name('post.index');

Route::get('/post/create',[PostController::class,'create'])->name('post.create'); //imprime el formulaeio
Route::post('/post',[PostController::class,'store'])->name('post.store');  //guarda el contenido

Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');