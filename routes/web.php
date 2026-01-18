<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('formulario');
})->name('formulario');
Route::post('/generate-password', [App\Http\Controllers\PasswordController::class, 'generate'])->name('password.generate');
