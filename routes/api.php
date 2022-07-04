<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/drinks', \App\Http\Controllers\DrinkController::class)->only('index');
Route::apiResource('/teams', \App\Http\Controllers\TeamController::class)->only('index');
Route::apiResource('/purchases', \App\Http\Controllers\PurchaseController::class)->only('index', 'store');
