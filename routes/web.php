<?php

use App\Http\Controllers\EmprendedorController;
use App\Http\Controllers\FeriaController;

Route::get('/', fn() => redirect()->route('ferias.index'));

// Aquí pasamos un array ‘parameters’ para ajustar el placeholder
Route::resource('emprendedores', EmprendedorController::class)
     ->parameters(['emprendedores' => 'emprendedor']);

Route::resource('ferias', FeriaController::class);
