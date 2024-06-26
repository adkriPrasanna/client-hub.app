<?php

use App\Http\Controllers\ClientsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/client', [ClientsController::class, 'store'])->name('create.partner');
Route::get('/client', [ClientsController::class, 'list'])->name('list.partner');
