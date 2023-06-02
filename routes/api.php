<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () use ($router) {
  return 'Bintan in Hand API versi 1';
});

Route::group(['prefix'=>'v1', 'middleware'=>'api'], function () use ($router)
{
  //SOSIAL presentasi penduduk miskin (ppm) - [m_1_pres_pend_miskin]
  $router->get('/sosial/ppm', [App\Http\Controllers\API\APISosialController::class, 'ppmIndex'])->name('sosial-ppm.index');	
});