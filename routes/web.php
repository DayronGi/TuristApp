<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PuntoController;
use App\Http\Controllers\VendedorController;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function() { return Redirect::to('/login'); });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::controller(PlanController::class)->group(function() {
    Route::get('/planes', 'list')->name('planes.list');
    Route::get('planes/adm', 'adm')->name('planes.adm');
    Route::get('planes/add', 'add')->name('planes.add');
    Route::post('planes/store', 'store')->name('planes.store');
    Route::get('planes/{id}/edit', 'edit')->name('planes.edit');
    Route::put('planes/{id}', 'update')->name('planes.update');
    Route::delete('planes/{id}', 'destroy')->name('planes.delete');
});

Route::controller(VendedorController::class)->group(function() {
    Route::get('/vendedores', 'list')->name('vendedores.list');
    Route::get('vendedores/adm', 'adm')->name('vendedores.adm');
    Route::get('vendedores/add', 'add')->name('vendedores.add');
    Route::post('vendedores/store', 'store')->name('vendedores.store');
    Route::get('vendedores/{id}/edit', 'edit')->name('vendedores.edit');
    Route::put('vendedores/{id}', 'update')->name('vendedores.update');
    Route::delete('vendedores/{id}', 'destroy')->name('vendedores.delete');
});

Route::controller(ClienteController::class)->group(function() {
    Route::get('/clientes', 'list')->name('clientes.list');
    Route::get('clientes/add', 'add')->name('clientes.add');
    Route::post('clientes/store', 'store')->name('clientes.store');
    Route::get('clientes/{id}/edit', 'edit')->name('clientes.edit');
    Route::put('clientes/{id}', 'update')->name('clientes.update');
    Route::delete('clientes/{id}', 'destroy')->name('clientes.delete');
});

Route::controller(PuntoController::class)->group(function() {
    Route::get('/puntos', 'list')->name('puntos.list');
    Route::get('puntos/adm', 'adm')->name('puntos.adm');
    Route::get('puntos/add', 'add')->name('puntos.add');
    Route::post('puntos/store', 'store')->name('puntos.store');
    Route::get('puntos/{id}/edit', 'edit')->name('puntos.edit');
    Route::put('puntos/{id}', 'update')->name('puntos.update');
    Route::delete('puntos/{id}', 'destroy')->name('puntos.delete');
});