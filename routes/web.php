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


  //sosial presentasi penduduk miskin (ppm)
  Route::get('/ppm', [SosialAdminController::class, 'ppmIndex'])->name('sosial-ppm.index'); 
  Route::post('/ppm/store', [SosialAdminController::class, 'ppmStore'])->name('sosial-ppm.store'); 
  Route::get('/ppm/{id}/edit', [SosialAdminController::class, 'ppmEdit'])->name('sosial-ppm.edit'); 
  Route::put('/ppm/{id}', [SosialAdminController::class, 'ppmUpdate'])->name('sosial-ppm.update'); 
});