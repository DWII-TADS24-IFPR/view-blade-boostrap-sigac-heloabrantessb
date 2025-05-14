<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NivelController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('niveis', NivelController::class); 

// Route::get('/relatorios', [RelatorioController::class, 'emitirRelatorio'])->name('relatorio.emitir');

// Route::get('/graficos', function (){
//     return view('graficos.index')
// })->name('graficos');   