<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TransacaoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/categorias',CategoriaController::class);
Route::apiResource('/usuarios',UsuarioController::class);
Route::apiResource('/transacoes',TransacaoController::class);