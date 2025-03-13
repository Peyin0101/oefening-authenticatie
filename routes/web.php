<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::redirect('/', '/clients');

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'handle']);

Route::resource('clients', ClientController::class);
