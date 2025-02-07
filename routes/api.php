<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login',[LoginController::class,'login']);

//API CLIENTES  
Route::get('clientes', [ClientesController::class, 'index']);
Route::get('cliente/{id}', [ClientesController::class, 'client']);
Route::delete('cliente/eliminar/{id}', [ClientesController::class, 'destroy']);
Route::post('cliente/guardar', [ClientesController::class, 'store']);