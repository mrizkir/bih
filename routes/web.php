<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 

use App\Http\Controllers\KontenAdminController; 
use App\Http\Controllers\LoginAdminController; 


Auth::routes(['register'=>'false', 'logout'=>false]);


Route::get('/', [HomeController::class, 'index'])->name('home');  

Route::group(['middleware'=>['disablepreventback', 'web', 'auth']], function() {   
  // Route::get('/home', [HomeController::class, 'index'])->name('home');   
  Route::get('/paneladmin', [LoginAdminController::class, 'index']);
  Route::get('/dashboard', [KontenadminController::class, 'index'])->name('dashboard'); 
});