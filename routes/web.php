<?php

use Illuminate\Support\Facades\Route;
use App\Models\Usuario;
use App\Models\Servicio;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\UserController;

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
    return view('inicio');
});

//Cita
Route::resource('citas', 'CitaController');

Route::get('citas/generarPDF/{id}', [CitaController::class, 'generarPDF'])
->name('generarPDF');

Route::get('/citas', function () {
    return view('citas', [
        'servicios' => Servicio::all()
    ]);
});

//Users
Route::resource('users', 'UserController');


//Sobre mi
Route::get('/sobreMi', function () {
    return view('sobreMi');
});



Route::get('/admin', function () {
    return view('auth.login');
});



Auth::routes();

Route::get('/home', function(){
    return view('inicio');
})->name('home');
