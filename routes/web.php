<?php

use Illuminate\Support\Facades\Route;
use App\Models\Usuario;
use App\Models\Servicio;
use App\Http\Controllers\CitaController;

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

//Cita
Route::resource('citas', 'CitaController');

Route::get('/', function () {
    return view('inicio');
});

Route::get('/sobreMi', function () {
    return view('sobreMi');
});

Route::get('/citas', function () {
    return view('citas', [
        'servicios' => Servicio::all()
    ]);
});

Route::get('/admin', function () {
    return view('auth.login');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');