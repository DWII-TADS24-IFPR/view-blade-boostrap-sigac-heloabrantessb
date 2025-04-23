<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pessoas', [NivelController::class, 'index'])->name('pessoas.index');