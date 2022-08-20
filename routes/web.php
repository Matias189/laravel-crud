<?php

use Illuminate\Support\Facades\Route;



// Ruta para el login de jetstream
Route::get('/', function () {
    return view('auth.login');
});

// Ruta para visualizar el CRUD  ('Definir ruta',  ' ')
Route::resource('articulos', 'App\Http\Controllers\ArticuloController');

Route::resource('articulos', 'App\Http\Controllers\ArticuloController',[ArticuloController::class, 'archive']);


// vista prueba
Route::get('/prueba3', function () {
    return view ('prueba3');
});


// Autentificación de jetstream
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
