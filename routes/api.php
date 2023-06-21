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
  
  //EKONOMI  uraian pdrb - [m_uraian_pdrb]
  Route::get('/ekonomi/uraian', [App\Http\Controllers\API\APIEkonomiController::class, 'uraianIndex'])->name('ekonomi-uraian.index');   
  //EKONOMI  Petumbuhan Ekonomi (PE) - [m_17_ekonomi]
  Route::get('/ekonomi/pe', [App\Http\Controllers\API\APIEkonomiController::class, 'peIndex'])->name('ekonomi-pe.index');   
  //EKONOMI  Laju Inflasi (LI) - [m_18_inflasi]
  Route::get('/ekonomi/li', [App\Http\Controllers\API\APIEkonomiController::class, 'liIndex'])->name('ekonomi-li.index');    
  //EKONOMI   Distribusi PDRB Atas Dasar Harga Berlaku (ADHB) - [m_19_pdrb_berlaku]
  Route::post('/ekonomi/adhb', [App\Http\Controllers\API\APIEkonomiController::class, 'adhbIndex'])->name('ekonomi-adhb.index');  
  //EKONOMI  Distribusi PDRB Atas Dasar Harga Konstan (ADHK) - [m_19_pdrb_konstan]
  Route::post('/ekonomi/adhk', [App\Http\Controllers\API\APIEkonomiController::class, 'adhkIndex'])->name('ekonomi-adhk.index');    
  //EKONOMI Kunjungan Wisata (KW) - [m_20_kunjungan]
  Route::get('/ekonomi/kw', [App\Http\Controllers\API\APIEkonomiController::class, 'kwIndex'])->name('ekonomi-kw.index');  
  //EKONOMI Realisasi Investasi (PMA/ PMDN) - [m_35_pma]
  Route::get('/ekonomi/pma', [App\Http\Controllers\API\APIEkonomiController::class, 'pmaIndex'])->name('ekonomi-pma.index'); 

  //PERTANIAN Produksi Perikanan Budidaya (PPB) - [m_21_perikanan_budidaya]
  Route::get('/pertanian/ppb', [App\Http\Controllers\API\APIPertanianController::class, 'ppbIndex'])->name('pertanian-ppb.index');   
  //PERTANIAN  Produksi Perikanan Tangkap(PPT) - [m_22_perikanan_tangkap]
  Route::get('/pertanian/ppt', [App\Http\Controllers\API\APIPertanianController::class, 'pptIndex'])->name('pertanian-ppt.index');   
  //PERTANIAN Capaian Produksi Komoditi Unggulan Perkebunan (CPKUP) - [m_23_perkebunan]
  Route::get('/pertanian/cpkup', [App\Http\Controllers\API\APIPertanianController::class, 'cpkupIndex'])->name('pertanian-cpkup.index'); 
  //PERTANAIN Capaian Produksi Komoditi Hortikultura (CPKH) - [m_24_holtikultura]
  Route::get('/pertanian/cpkh', [App\Http\Controllers\API\APIPertanianController::class, 'cpkhIndex'])->name('pertanian-cpkh.index');   
  //PERTANAIN Jumlah Produksi Peternakan (JPP) - [m_25_peternakan]
  Route::get('/pertanian/jpp', [App\Http\Controllers\API\APIPertanianController::class, 'jppIndex'])->name('pertanian-jpp.index');   

  //KEPENDUDUKAN Jumlah Penduduk (JP) - [m_36_jumlah_penduduk]
  Route::get('/kependudukan/jp', [App\Http\Controllers\API\APIKependudukanController::class, 'jpIndex'])->name('kependudukan-jp.index'); 
  //KEPENDUDUKAN Jumlah Penduduk Berdasarkan Kecamatan Tahun 2021 (JPBK) - [m_26_penduduk_kecamatan]
  Route::get('/kependudukan/jpbk', [App\Http\Controllers\API\APIKependudukanController::class, 'jpbkIndex'])->name('kependudukan-jpbk.index'); 
  //KEPENDUDUKAN  Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU) - [m_26_penduduk_umur]
  Route::get('/kependudukan/jpbku', [App\Http\Controllers\API\APIKependudukanController::class, 'jpbkuIndex'])->name('kependudukan-jpbku.index'); 
  //KEPENDUDUKAN  Pertumbuhan Penduduk (PP) - [m_27_laju_pertumbuhan]
  Route::get('/kependudukan/pp', [App\Http\Controllers\API\APIKependudukanController::class, 'ppIndex'])->name('kependudukan-pp.index');  

  //INFRASTRUKTUR Panjang Jalan Yang Dibangun dan Ditingkatkan (PJDD) - [m_28_jalan]
  Route::get('/infrastruktur/pjdd', [App\Http\Controllers\API\APIInfrastrukturController::class, 'pjddIndex'])->name('infrastruktur-pjdd.index'); 
  //INFRASTRUKTUR Persentase Rumah Tangga yang menggunakan air bersih (PRT) - [m_29_air]
  Route::get('/infrastruktur/prt', [App\Http\Controllers\API\APIInfrastrukturController::class, 'prtIndex'])->name('infrastruktur-prt.index'); 
  //INFRASTRUKTUR  Persentase Tingkat Kemantapan Jalan (PTKJ) - [m_37_kemantapan_jalan]
  Route::get('/infrastruktur/ptkj', [App\Http\Controllers\API\APIInfrastrukturController::class, 'ptkjIndex'])->name('infrastruktur-ptkj.index'); 

  //video profil bintan - [m_video]
  Route::get('/video', [App\Http\Controllers\API\APIVideoController::class, 'videoIndex'])->name('api-video.index'); 
});