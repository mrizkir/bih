<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 

use App\Http\Controllers\KontenAdminController; 
use App\Http\Controllers\LoginAdminController; 
use App\Http\Controllers\SosialAdminController; 


Auth::routes(['register'=>'false', 'logout'=>false]);


Route::get('/', [HomeController::class, 'index'])->name('home');  
Route::get('/logout',['uses'=>'App\Http\Controllers\Auth\LoginController@logout','as'=>'logout']);

Route::group(['middleware'=>['disablepreventback', 'web', 'auth']], function() {   
  // Route::get('/home', [HomeController::class, 'index'])->name('home');   
  Route::get('/paneladmin', [LoginAdminController::class, 'index']);
  Route::get('/dashboard', [KontenadminController::class, 'index'])->name('dashboard'); 


  Route::get('/ppm', [SosialAdminController::class, 'ppm'])->name('sosial-presentasi-penduduk-miskin'); 
});