<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 

use App\Http\Controllers\KontenAdminController; 
use App\Http\Controllers\LoginAdminController; 

Route::get('/', [HomeController::class, 'index'])->name('home');  
Route::get('/home', [HomeController::class, 'index'])->name('home');   

Route::get('/paneladmin', [LoginAdminController::class, 'index']);
Route::get('/dashbord', [KontenadminController::class, 'index'])->name('dasbord'); 