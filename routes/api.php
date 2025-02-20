<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PolizasController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login',[LoginController::class,'login']);

//API CLIENTES  
Route::get('clientes', [ClientesController::class, 'index']);
Route::get('cliente/{id}', [ClientesController::class, 'client']);
Route::delete('cliente/eliminar/{id}', [ClientesController::class, 'destroy']);
Route::post('cliente/guardar', [ClientesController::class, 'store']);

// API POLIZAS  
Route::get('polizas', [PolizasController::class, 'index']);
Route::get('poliza/{id}', [PolizasController::class, 'show']);
Route::delete('poliza/eliminar/{id}', [PolizasController::class, 'destroy']);
Route::post('poliza/guardar', [PolizasController::class, 'store']);