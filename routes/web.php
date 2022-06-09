<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Models\Servicio;
use App\Models\Factura;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReseñaController;
use App\Http\Controllers\GestionCitasController;
use App\Http\Controllers\GestionUsersController;

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

//Mis citas
Route::get('/misCitas', function () {
    return view('misCitas', [
        'facturas' => Factura::all()
    ]);
});


//Reseñas
Route::resource('reseñas', 'ReseñaController')->middleware('auth.basic');
Route::get('cita/reseña/{id}', [ReseñaController::class, 'show'])
->middleware('auth.basic');
Route::get('reseñas/dejar/{id}', [ReseñaController::class, 'update'])
->middleware('auth.basic');


//Gestion citas
Route::resource('gestion', 'GestionCitasController')
->middleware('auth.admin');

Route::get('gestion/borrar/{id}', [GestionCitasController::class, 'destroy'])
->middleware('auth.admin');


//Gestion usuarios
Route::resource('gestionusers', 'GestionUsersController')
->middleware('auth.admin');

Route::get('gestionUsers/borrar/{id}', [GestionUsersController::class, 'destroy'])
->middleware('auth.admin');


//Cita
Route::resource('citas', 'CitaController')->middleware('auth.basic');


Route::get('citas/generarPDF/{id}', [CitaController::class, 'generarPDF'])
->name('generarPDF')->middleware('auth.basic');

Route::get('/citas', function () {
    return view('citas', [
        'servicios' => Servicio::all(),
        'users'     => User::where('type', 'C')->get()
    ]);
});

//Users
Route::resource('users', 'UserController');


//Sobre mi
Route::get('/sobreMi', function () {
    return view('sobreMi');
});

//PERMISO DENEGADO
Route::get('denegado', function(){
    return view('denegado');
});



Auth::routes();

Route::get('/home', function(){
    return view('inicio');
})->name('home');
