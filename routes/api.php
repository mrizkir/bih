<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/sosial/', function () use ($router) {
  return 'Bintan in Hand API versi 1';
});

Route::group(['prefix'=>'v1', 'middleware'=>'api'], function () use ($router)
{
  //SOSIAL presentasi penduduk miskin (ppm) - [m_1_pres_pend_miskin]
  $router->get('/sosial/ppm', [App\Http\Controllers\API\APISosialController::class, 'ppmIndex'])->name('sosial-ppm.index');	
  //SOSIAL Indeks Pembangunan Manusia (IPM)  - [m_2_ipm]
  $router->get('/sosial/ipm', [App\Http\Controllers\API\APISosialController::class, 'ipmIndex'])->name('sosial-ipm.index');	
  //SOSIAL Angka Rata-Rata Lama Sekolah (RLS) - [m_3_rls]
  $router->get('/sosial/rls', [App\Http\Controllers\API\APISosialController::class, 'rlsIndex'])->name('sosial-rls.index');	
  //SOSIAL Angka Melek Huruf (AMH) - [m_4_amh]
  $router->get('/sosial/amh', [App\Http\Controllers\API\APISosialController::class, 'amhIndex'])->name('sosial-amh.index');	
  //SOSIAL Angka Harapan Hidup (AHH) - [m_5_ahh]
  $router->get('/sosial/ahh', [App\Http\Controllers\API\APISosialController::class, 'ahhIndex'])->name('sosial-ahh.index');	
  //SOSIAL Angka Kelangsungan Hidup Bayi (AKHB) - [m_6_akhb]
  $router->get('/sosial/akhb', [App\Http\Controllers\API\APISosialController::class, 'akhbIndex'])->name('sosial-akhb.index');	
  //SOSIAL Angka kematian ibu melahirkan (AKIM) - [m_7_kematian_ibu]
  Route::get('/sosial/akim', [App\Http\Controllers\API\APISosialController::class, 'akimIndex'])->name('sosial-akim.index');  
  //SOSIAL Perkembangan Kondisi Ketenagakerjaan di Kabupaten Bintan (PKK) - [m_8_tenaga_kerja]
  Route::get('/sosial/pkk', [App\Http\Controllers\API\APISosialController::class, 'pkkIndex'])->name('sosial-pkk.index');      
  //SOSIAL Indeks Pembangunan Gender (IPG) - [m_9_ipg]
  Route::get('/sosial/ipg', [App\Http\Controllers\API\APISosialController::class, 'ipgIndex'])->name('sosial-ipg.index');   
  //SOSIAL Angka Partisipasi Kasar (APK) - [m_10_apk]
  Route::get('/sosial/apk', [App\Http\Controllers\API\APISosialController::class, 'apkIndex'])->name('sosial-apk.index');   
  //SOSIAL Angka partisipasi Murni (APM) - [m_11_apm]
  Route::get('/sosial/apm', [App\Http\Controllers\API\APISosialController::class, 'apmIndex'])->name('sosial-apm.index');  
  //SOSIAL Angka Harapan Lama Sekolah (HLS) - [m_12_hls]
  Route::get('/sosial/hls', [App\Http\Controllers\API\APISosialController::class, 'hlsIndex'])->name('sosial-hls.index');
  //SOSIAL Jumlah Rumah Tidak Layak Huni Yang Direhab (JRTLH) - [m_13_rtlh]
  Route::get('/sosial/jrtlh', [App\Http\Controllers\API\APISosialController::class, 'jrtlhIndex'])->name('sosial-jrtlh.index');      
  //SOSIAL Indeks Gini (IG) - [m_14_gini]
  Route::get('/sosial/ig', [App\Http\Controllers\API\APISosialController::class, 'igIndex'])->name('sosial-ig.index');  
  //SOSIAL Indeks Daya Beli - Purchasing Power Parity (IDB) - [m_15_idb]
  Route::get('/sosial/idb', [App\Http\Controllers\API\APISosialController::class, 'idbIndex'])->name('sosial-idb.index');    
  //SOSIAL Persentase Penduduk Usia 15 Tahun ke atas menurut Pendidikan yang Ditamatkan (PPU) - [m_16_lulusan_pendidikan]
  Route::get('/sosial/ppu', [App\Http\Controllers\API\APISosialController::class, 'ppuIndex'])->name('sosial-ppu.index');   
  //SOSIAL  Indeks Pemberdayaan Gender (IPG) - [m_38_idg]
  Route::get('/sosial/ipgg', [App\Http\Controllers\API\APISosialController::class, 'ipggIndex'])->name('sosial-ipgg.index'); 
  
});