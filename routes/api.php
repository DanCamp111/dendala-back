<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PolizasController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\ServiciosController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [LoginController::class, 'login']);

// API CLIENTES  
Route::get('clientes', [ClientesController::class, 'index']);
Route::get('cliente/{id}', [ClientesController::class, 'client']);
Route::delete('cliente/eliminar/{id}', [ClientesController::class, 'destroy']);
Route::post('cliente/guardar', [ClientesController::class, 'store']);

// API POLIZAS  
Route::get('polizas', [PolizasController::class, 'index']);
Route::get('poliza/{id}', [PolizasController::class, 'show']);
Route::delete('poliza/eliminar/{id}', [PolizasController::class, 'destroy']);
Route::post('poliza/guardar', [PolizasController::class, 'store']);

// API FACTURAS  
Route::get('facturas', [FacturasController::class, 'index']);
Route::get('factura/{id}', [FacturasController::class, 'show']);
Route::delete('factura/eliminar/{id}', [FacturasController::class, 'destroy']);
Route::post('factura/guardar', [FacturasController::class, 'store']);
Route::put('factura/actualizar/{id}', [FacturasController::class, 'update']);

//API TECNICOS
Route::get('tecnicos', [ClientesController::class, 'indexTecnicos']);
Route::get('tecnico/{id}', [ClientesController::class, 'tecnic']);
Route::delete('tecnico/eliminar/{id}', [ClientesController::class, 'deleteTecnico']);
Route::post('tecnico/guardar', [ClientesController::class, 'storeTecnico']);

//API SERVICIOS

Route::get('servicios', [ServiciosController::class, 'index']);
Route::get('servicio/{id}', [ServiciosController::class, 'show']);
Route::post('servicio/guardar', [ServiciosController::class, 'store']);
Route::put('servicio/actualizar/{id}', [ServiciosController::class, 'update']);
Route::delete('servicio/eliminar/{id}', [ServiciosController::class, 'destroy']);