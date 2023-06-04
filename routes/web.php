<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\KontenAdminController;

//SOSIAL
use App\Http\Controllers\SosialAdminController;
use App\Http\Controllers\SosialIpmAdminController;
use App\Http\Controllers\SosialRlsAdminController;
use App\Http\Controllers\SosialAhmAdminController;
use App\Http\Controllers\SosialAhhAdminController;
use App\Http\Controllers\SosialAkhbAdminController;
use App\Http\Controllers\SosialAkimAdminController;
use App\Http\Controllers\SosialPkkAdminController;
use App\Http\Controllers\SosialIpgAdminController;
use App\Http\Controllers\SosialApkAdminController;
use App\Http\Controllers\SosialApmAdminController;
use App\Http\Controllers\SosialHlsAdminController;
use App\Http\Controllers\SosialJrtlhAdminController;
use App\Http\Controllers\SosialIgAdminController;
use App\Http\Controllers\SosialIdbAdminController;
use App\Http\Controllers\SosialPpuAdminController;
use App\Http\Controllers\SosialIpggAdminController;

//EKONONI
use App\Http\Controllers\EkonomiPeAdminController;
use App\Http\Controllers\EkonomiLiAdminController;
use App\Http\Controllers\EkonomiAdhbAdminController;
use App\Http\Controllers\EkonomiAdhkAdminController;
use App\Http\Controllers\EkonomiKwAdminController;
use App\Http\Controllers\EkonomiPmaAdminController;

// PERTANIAN
use App\Http\Controllers\PertanianPpbAdminController;
use App\Http\Controllers\PertanianPptAdminController;
use App\Http\Controllers\PertanianCpkupAdminController;
use App\Http\Controllers\PertanianCpkhAdminController;
use App\Http\Controllers\PertanianJppAdminController;

// KEPENDUDUKAN
use App\Http\Controllers\KependudukanJpAdminController;
use App\Http\Controllers\KependudukanJpbkAdminController;
use App\Http\Controllers\KependudukanJpbkuAdminController;
use App\Http\Controllers\KependudukanPpAdminController;

// INFRASTRUKTUR
use App\Http\Controllers\InfrastrukturPjddAdminController;
use App\Http\Controllers\InfrastrukturPrtAdminController;
use App\Http\Controllers\InfrastrukturPtkjAdminController;

// INFRASTRUKTUR
use App\Http\Controllers\VideoDvAdminController;

// USER
use App\Http\Controllers\ManajemenUserController;
use Illuminate\Contracts\Cache\Store;

Auth::routes(['register' => 'false', 'logout' => false]);


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginAdminController::class, 'index'])->name('login');
Route::get('/logout', ['uses' => 'App\Http\Controllers\Auth\LoginController@logout', 'as' => 'logout']);

Route::group(
  ['middleware' => ['disablepreventback', 'web', 'auth']],
  function () {
    Route::get('/dashboard', [KontenadminController::class, 'index'])->name('dashboard');

    // =================================SOSIAL===========================================
    //SOSIAL presentasi penduduk miskin (ppm) - [m_1_pres_pend_miskin]
    Route::get('/ppm', [SosialAdminController::class, 'ppmIndex'])->name('sosial-ppm.index');
    Route::post('/ppm/store', [SosialAdminController::class, 'ppmStore'])->name('sosial-ppm.store');
    Route::get('/ppm/{id}/edit', [SosialAdminController::class, 'ppmEdit'])->name('sosial-ppm.edit');
    Route::put('/ppm/{id}', [SosialAdminController::class, 'ppmUpdate'])->name('sosial-ppm.update');
    Route::get('/ppmdel/{id}', [SosialAdminController::class, 'ppmDel'])->name('sosial-ppm.del'); 

    //SOSIAL Indeks Pembangunan Manusia (IPM)  - [m_2_lpm]
    Route::get('/ipm', [SosialIpmAdminController::class, 'ipmIndex'])->name('sosial-ipm.index');
    Route::post('/ipm/store', [SosialIpmAdminController::class, 'ipmStore'])->name('sosial-ipm.store');
    Route::get('/ipm/{id}/edit', [SosialIpmAdminController::class, 'ipmEdit'])->name('sosial-ipm.edit');
    Route::put('/ipm/{id}', [SosialIpmAdminController::class, 'ipmUpdate'])->name('sosial-ipm.update'); 
    Route::get('/ipmdel/{id}', [SosialIpmAdminController::class, 'ipmDel'])->name('sosial-ipm.del'); 

    //SOSIAL Angka Rata-Rata Lama Sekolah (RLS) - [m_3_rls]
    Route::get('/rls', [SosialRlsAdminController::class, 'rlsIndex'])->name('sosial-rls.index');
    Route::post('/rls/store', [SosialRlsAdminController::class, 'rlsStore'])->name('sosial-rls.store');
    Route::get('/rls/{id}/edit', [SosialRlsAdminController::class, 'rlsEdit'])->name('sosial-rls.edit');
    Route::put('/rls/{id}', [SosialRlsAdminController::class, 'rlsUpdate'])->name('sosial-rls.update');
    Route::get('/rlsdel/{id}', [SosialRlsAdminController::class, 'rlsDel'])->name('sosial-rls.del');

    //SOSIAL Angka Melek Huruf (AMH) - [m_4_amh]
    Route::get('/ahm', [SosialAhmAdminController::class, 'ahmIndex'])->name('sosial-ahm.index');
    Route::post('/ahm/store', [SosialAhmAdminController::class, 'ahmStore'])->name('sosial-ahm.store');
    Route::get('/ahm/{id}/edit', [SosialAhmAdminController::class, 'ahmEdit'])->name('sosial-ahm.edit');
    Route::put('/ahm/{id}', [SosialAhmAdminController::class, 'ahmUpdate'])->name('sosial-ahm.update');
    Route::get('/ahmdel/{id}', [SosialAhmAdminController::class, 'ahmDel'])->name('sosial-ahm.del');

    //SOSIAL Angka Harapan Hidup (AHH) - [m_5_ahh]
    Route::get('/ahh', [SosialAhhAdminController::class, 'ahhIndex'])->name('sosial-ahh.index');
    Route::post('/ahh/store', [SosialAhhAdminController::class, 'ahhStore'])->name('sosial-ahh.store');
    Route::get('/ahh/{id}/edit', [SosialAhhAdminController::class, 'ahhEdit'])->name('sosial-ahh.edit');
    Route::put('/ahh/{id}', [SosialAhhAdminController::class, 'ahhUpdate'])->name('sosial-ahh.update');
    Route::get('/ahhdel/{id}', [SosialAhhAdminController::class, 'ahhDel'])->name('sosial-ahh.del');

    //SOSIAL Angka Kelangsungan Hidup Bayi (AKHB) - [m_6_akhb]
    Route::get('/akhb', [SosialAkhbAdminController::class, 'akhbIndex'])->name('sosial-akhb.index');
    Route::post('/akhb/store', [SosialAkhbAdminController::class, 'akhbStore'])->name('sosial-akhb.store');
    Route::get('/akhb/{id}/edit', [SosialAkhbAdminController::class, 'akhbEdit'])->name('sosial-akhb.edit');
    Route::put('/akhb/{id}', [SosialAkhbAdminController::class, 'akhbUpdate'])->name('sosial-akhb.update');
    Route::get('/akhbdel/{id}', [SosialAkhbAdminController::class, 'akhbDel'])->name('sosial-akhb.del');

    //SOSIAL Angka kematian ibu melahirkan (AKIM) - [m_7_kematian_ibu]
    Route::get('/akim', [SosialAkimAdminController::class, 'akimIndex'])->name('sosial-akim.index');
    Route::post('/akim/store', [SosialAkimAdminController::class, 'akimStore'])->name('sosial-akim.store');
    Route::get('/akim/{id}/edit', [SosialAkimAdminController::class, 'akimEdit'])->name('sosial-akim.edit');
    Route::put('/akim/{id}', [SosialAkimAdminController::class, 'akimUpdate'])->name('sosial-akim.update');
    Route::get('/akimdel/{id}', [SosialAkimAdminController::class, 'akimDel'])->name('sosial-akim.del');

    //SOSIAL Perkembangan Kondisi Ketenagakerjaan di Kabupaten Bintan (PKK) - [m_8_tenaga_kerja]
    Route::get('/pkk', [SosialPkkAdminController::class, 'pkkIndex'])->name('sosial-pkk.index');    
    Route::post('/pkk/store', [SosialPkkAdminController::class, 'pkkStore'])->name('sosial-pkk.store');
    Route::get('/pkk/{id}/edit', [SosialPkkAdminController::class, 'pkkEdit'])->name('sosial-pkk.edit');
    Route::put('/pkk/{id}', [SosialPkkAdminController::class, 'pkkUpdate'])->name('sosial-pkk.update');
    Route::get('/pkkdel/{id}', [SosialPkkAdminController::class, 'pkkDel'])->name('sosial-pkk.del');

    //SOSIAL Indeks Pembangunan Gender (IPG) - [m_9_ipg]
    Route::get('/ipg', [SosialIpgAdminController::class, 'ipgIndex'])->name('sosial-ipg.index'); 
    Route::post('/ipg/store', [SosialIpgAdminController::class, 'ipgStore'])->name('sosial-ipg.store');
    Route::get('/ipg/{id}/edit', [SosialIpgAdminController::class, 'ipgEdit'])->name('sosial-ipg.edit');
    Route::put('/ipg/{id}', [SosialIpgAdminController::class, 'ipgUpdate'])->name('sosial-ipg.update');
    Route::get('/ipgdel/{id}', [SosialIpgAdminController::class, 'ipgDel'])->name('sosial-ipg.del');
    
    //SOSIAL Angka Partisipasi Kasar (APK) - [m_10_apk]
    Route::get('/apk', [SosialApkAdminController::class, 'apkIndex'])->name('sosial-apk.index'); 
    Route::post('/apk/store', [SosialApkAdminController::class, 'apkStore'])->name('sosial-apk.store');
    Route::get('/apk/{id}/edit', [SosialApkAdminController::class, 'apkEdit'])->name('sosial-apk.edit');
    Route::put('/apk/{id}', [SosialApkAdminController::class, 'apkUpdate'])->name('sosial-apk.update');     

    //SOSIAL Angka Partisipasi Kasar (APK) - [m_10_apk]
    Route::get('/sosial_apk_SD_tampil', [SosialApkAdminController::class, 'apk_SD'])->name('sosial-apk_SD'); 
    Route::post('/apksd/store', [SosialApkAdminController::class, 'apksdStore'])->name('sosial-apksd.store');
    Route::put('/apksd/{id}', [SosialApkAdminController::class, 'apksdUpdate'])->name('sosial-apksd.update'); 
    Route::get('/apksddel/{id}', [SosialApkAdminController::class, 'apksdDel'])->name('sosial-apk_SD.del');   
    //UPDATE

    Route::get('/sosial_apk_SMP_tampil', [SosialApkAdminController::class, 'apk_SMP'])->name('sosial-apk_SMP'); 
    Route::post('/apksmp/store', [SosialApkAdminController::class, 'apksmpStore'])->name('sosial-apksmp.store');
    Route::put('/apksmp/{id}', [SosialApkAdminController::class, 'apksmpUpdate'])->name('sosial-apksmp.update'); 
    Route::get('/apksmpdel/{id}', [SosialApkAdminController::class, 'apksmpDel'])->name('sosial-apksmp.del');  
        
    Route::get('/sosial_apk_SMA_tampil', [SosialApkAdminController::class, 'apk_SMA'])->name('sosial-apk_SMA'); 
    Route::post('/apksma/store', [SosialApkAdminController::class, 'apksmaStore'])->name('sosial-apksma.store');
    Route::put('/apksma/{id}', [SosialApkAdminController::class, 'apksmaUpdate'])->name('sosial-apksma.update'); 
    Route::get('/apksmadel/{id}', [SosialApkAdminController::class, 'apksmaDel'])->name('sosial-apksma.del');  
    

    //SOSIAL Angka partisipasi Murni (APM) - [m_11_apm]
    Route::get('/apm', [SosialApmAdminController::class, 'apmIndex'])->name('sosial-apm.index');
    Route::post('/apm/store', [SosialApmAdminController::class, 'apmStore'])->name('sosial-apm.store');
    Route::get('/apm/{id}/edit', [SosialApmAdminController::class, 'apmEdit'])->name('sosial-apm.edit');
    Route::put('/apm/{id}', [SosialApmAdminController::class, 'apmUpdate'])->name('sosial-apm.update');     

    //SOSIAL Angka partisipasi Murni (APM) - [m_11_apm]
    Route::get('/sosial_apm_SD_tampil', [SosialApmAdminController::class, 'apm_SD'])->name('sosial-apm_SD');
    Route::post('/apmsd/store', [SosialApmAdminController::class, 'apmsdStore'])->name('sosial-apmsd.store');
    Route::get('/apmsd/{id}/edit', [SosialApmAdminController::class, 'apmsdEdit'])->name('sosial-apmsd.edit');
    Route::put('/apmsd/{id}', [SosialApmAdminController::class, 'apmsdUpdate'])->name('sosial-apmsd.update');   
    Route::get('/apmsddel/{id}', [SosialApmAdminController::class, 'apmsdDel'])->name('sosial-apmsd.del');     

    Route::get('/sosial_apmSMP', [SosialApmAdminController::class, 'apm_SMP'])->name('sosial-apm_SMP');
    Route::post('/apmsmp/store', [SosialApmAdminController::class, 'apmsmpStore'])->name('sosial-apmsmp.store');
    Route::get('/apmsmp/{id}/edit', [SosialApmAdminController::class, 'apmsmpEdit'])->name('sosial-apmsmp.edit');
    Route::put('/apmsmp/{id}', [SosialApmAdminController::class, 'apmsmpUpdate'])->name('sosial-apmsmp.update');   
    Route::get('/apmsmpdel/{id}', [SosialApmAdminController::class, 'apmsmpDel'])->name('sosial-apmsmp.del');     

    Route::get('/sosial_apmSMA', [SosialApmAdminController::class, 'apm_SMA'])->name('sosial-apm_SMA');
    Route::post('/apmsma/store', [SosialApmAdminController::class, 'apmsmaStore'])->name('sosial-apmsma.store');
    Route::get('/apmsma/{id}/edit', [SosialApmAdminController::class, 'apmsmaEdit'])->name('sosial-apmsma.edit');
    Route::put('/apmsma/{id}', [SosialApmAdminController::class, 'apmsmaUpdate'])->name('sosial-apmsma.update');   
    Route::get('/apmsmadel/{id}', [SosialApmAdminController::class, 'apmsmaDel'])->name('sosial-apmsma.del');  


    //SOSIAL Angka Harapan Lama Sekolah (HLS) - [m_12_hls]
    Route::get('/hls', [SosialHlsAdminController::class, 'hlsIndex'])->name('sosial-hls.index'); 
    Route::post('/hls/store', [SosialHlsAdminController::class, 'hlsStore'])->name('sosial-hls.store');
    Route::get('/hls/{id}/edit', [SosialHlsAdminController::class, 'hlsEdit'])->name('sosial-hls.edit');
    Route::put('/hls/{id}', [SosialHlsAdminController::class, 'hlsUpdate'])->name('sosial-hls.update');      
    Route::get('/hlsdel/{id}', [SosialHlsAdminController::class, 'hlsDel'])->name('sosial-hls.del');  

    //SOSIAL Jumlah Rumah Tidak Layak Huni Yang Direhab (JRTLH) - [m_13_rtlh]
    Route::get('/jrtlh', [SosialJrtlhAdminController::class, 'jrtlhIndex'])->name('sosial-jrtlh.index');    
    Route::post('/jrtlh/store', [SosialJrtlhAdminController::class, 'jrtlhStore'])->name('sosial-jrtlh.store');
    Route::get('/jrtlh/{id}/edit', [SosialJrtlhAdminController::class, 'jrtlhEdit'])->name('sosial-jrtlh.edit');
    Route::put('/jrtlh/{id}', [SosialJrtlhAdminController::class, 'jrtlhUpdate'])->name('sosial-jrtlh.update');  
    Route::get('/jrtlhdel/{id}', [SosialJrtlhAdminController::class, 'jrtlhDel'])->name('sosial-jrtlh.del');    
  
    //SOSIAL Indeks Gini (IG) - [m_14_gini]
    Route::get('/ig', [SosialIgAdminController::class, 'igIndex'])->name('sosial-ig.index');
    Route::post('/ig/store', [SosialIgAdminController::class, 'igStore'])->name('sosial-ig.store');
    Route::get('/ig/{id}/edit', [SosialIgAdminController::class, 'igEdit'])->name('sosial-ig.edit');
    Route::put('/ig/{id}', [SosialIgAdminController::class, 'igUpdate'])->name('sosial-ig.update');    
    Route::get('/igdel/{id}', [SosialIgAdminController::class, 'igDel'])->name('sosial-ig.del');  
    
    //SOSIAL Indeks Daya Beli - Purchasing Power Parity (IDB) - [m_15_idb]
    Route::get('/idb', [SosialIdbAdminController::class, 'idbIndex'])->name('sosial-idb.index');  
    Route::post('/idb/store', [SosialIdbAdminController::class, 'idbStore'])->name('sosial-idb.store');
    Route::get('/idb/{id}/edit', [SosialIdbAdminController::class, 'idbEdit'])->name('sosial-idb.edit');
    Route::put('/idb/{id}', [SosialIdbAdminController::class, 'idbUpdate'])->name('sosial-idb.update');   
    Route::get('/idbdel/{id}', [SosialIdbAdminController::class, 'idbDel'])->name('sosial-idb.del');     
  
    //SOSIAL Persentase Penduduk Usia 15 Tahun ke atas menurut Pendidikan yang Ditamatkan (PPU) - [m_16_lulusan_pendidikan]
    Route::get('/ppu', [SosialPpuAdminController::class, 'ppuIndex'])->name('sosial-ppu.index'); 
    Route::post('/ppu/store', [SosialPpuAdminController::class, 'ppuStore'])->name('sosial-ppu.store');
    Route::get('/ppu/{id}/edit', [SosialPpuAdminController::class, 'ppuEdit'])->name('sosial-ppu.edit');
    Route::put('/ppu/{id}', [SosialPpuAdminController::class, 'ppuUpdate'])->name('sosial-ppu.update');   
    Route::get('/ppudel/{id}', [SosialPpuAdminController::class, 'ppuDel'])->name('sosial-ppu.del');     

    //SOSIAL  Indeks Pemberdayaan Gender (IPGG) - [m_38_idg]
    Route::get('/ipgg', [SosialIpggAdminController::class, 'ipggIndex'])->name('sosial-ipgg.index'); 
    Route::post('/ipgg/store', [SosialIpggAdminController::class, 'ipggStore'])->name('sosial-ipgg.store');
    Route::get('/ipgg/{id}/edit', [SosialIpggAdminController::class, 'ipggEdit'])->name('sosial-ipgg.edit');
    Route::put('/ipgg/{id}', [SosialIpggAdminController::class, 'ipggUpdate'])->name('sosial-ipgg.update');   
    Route::get('/ipggdel/{id}', [SosialIpggAdminController::class, 'ipggDel'])->name('sosial-ipgg.del');     


 

  // =================================EKONOMI===========================================
    //EKONOMI  Petumbuhan Ekonomi (PE) - [m_17_ekonomi]
    Route::get('/pe', [EkonomiPeAdminController::class, 'peIndex'])->name('ekonomi-pe.index'); 
    Route::post('/pe/store', [EkonomiPeAdminController::class, 'peStore'])->name('ekonomi-pe.store');
    Route::get('/pe/{id}/edit', [EkonomiPeAdminController::class, 'peEdit'])->name('ekonomi-pe.edit');
    Route::put('/pe/{id}', [EkonomiPeAdminController::class, 'peUpdate'])->name('ekonomi-pe.update');        

    //EKONOMI  Laju Inflasi (LI) - [m_18_inflasi]
    Route::get('/li', [EkonomiLiAdminController::class, 'liIndex'])->name('ekonomi-li.index');  
    Route::post('/li/store', [EkonomiPeAdminController::class, 'liStore'])->name('ekonomi-li.store');
    Route::get('/li/{id}/edit', [EkonomiPeAdminController::class, 'liEdit'])->name('ekonomi-li.edit');
    Route::put('/li/{id}', [EkonomiPeAdminController::class, 'liUpdate'])->name('ekonomi-li.update');         
    
    //EKONOMI   Distribusi PDRB Atas Dasar Harga Berlaku (ADHB) - [m_19_pdrb_berlaku]
    Route::get('/adhb', [EkonomiAdhbAdminController::class, 'adhbIndex'])->name('ekonomi-adhb.index');  
    Route::post('/adhb/store', [EkonomiAdhbAdminController::class, 'adhbStore'])->name('ekonomi-adhb.store');
    Route::get('/adhb/{id}/edit', [EkonomiAdhbAdminController::class, 'adhbEdit'])->name('ekonomi-adhb.edit');
    Route::put('/adhb/{id}', [EkonomiAdhbAdminController::class, 'adhbUpdate'])->name('ekonomi-adhb.update');         

    //EKONOMI   Distribusi PDRB Atas Dasar Harga Berlaku (ADHB) - [m_19_pdrb_berlaku]
    Route::get('/adhb_a', [EkonomiAdhbAdminController::class, 'adhb_a'])->name('ekonomi-adhb_A'); 
    Route::get('/adhb_b', [EkonomiAdhbAdminController::class, 'adhb_b'])->name('ekonomi-adhb_B'); 
    Route::get('/adhb_c', [EkonomiAdhbAdminController::class, 'adhb_c'])->name('ekonomi-adhb_C');  
    Route::get('/adhb_d', [EkonomiAdhbAdminController::class, 'adhb_d'])->name('ekonomi-adhb_D');  
    Route::get('/adhb_e', [EkonomiAdhbAdminController::class, 'adhb_e'])->name('ekonomi-adhb_E');  
    Route::get('/adhb_f', [EkonomiAdhbAdminController::class, 'adhb_f'])->name('ekonomi-adhb_F');  
    Route::get('/adhb_g', [EkonomiAdhbAdminController::class, 'adhb_g'])->name('ekonomi-adhb_G');  
    Route::get('/adhb_h', [EkonomiAdhbAdminController::class, 'adhb_h'])->name('ekonomi-adhb_H');  
    Route::get('/adhb_i', [EkonomiAdhbAdminController::class, 'adhb_i'])->name('ekonomi-adhb_I');  
    Route::get('/adhb_j', [EkonomiAdhbAdminController::class, 'adhb_j'])->name('ekonomi-adhb_J');  
    Route::get('/adhb_k', [EkonomiAdhbAdminController::class, 'adhb_k'])->name('ekonomi-adhb_K');  
    Route::get('/adhb_l', [EkonomiAdhbAdminController::class, 'adhb_l'])->name('ekonomi-adhb_L');  
    Route::get('/adhb_mn', [EkonomiAdhbAdminController::class, 'adhb_mn'])->name('ekonomi-adhb_MN');  
    Route::get('/adhb_o', [EkonomiAdhbAdminController::class, 'adhb_o'])->name('ekonomi-adhb_O');  
    Route::get('/adhb_p', [EkonomiAdhbAdminController::class, 'adhb_p'])->name('ekonomi-adhb_P');  
    Route::get('/adhb_q', [EkonomiAdhbAdminController::class, 'adhb_q'])->name('ekonomi-adhb_Q');  
    Route::get('/adhb_rstu', [EkonomiAdhbAdminController::class, 'adhb_rstu'])->name('ekonomi-adhb_RSTU'); 




    //EKONOMI  Distribusi PDRB Atas Dasar Harga Konstan (ADHK) - [m_19_pdrb_konstan]
    Route::get('/adhk', [EkonomiAdhkAdminController::class, 'adhkIndex'])->name('ekonomi-adhk.index');  
    Route::post('/adhk/store', [EkonomiAdhkAdminController::class, 'adhkStore'])->name('ekonomi-adhk.store');
    Route::get('/adhk/{id}/edit', [EkonomiAdhkAdminController::class, 'adhkEdit'])->name('ekonomi-adhk.edit');
    Route::put('/adhk/{id}', [EkonomiAdhkAdminController::class, 'adhkUpdate'])->name('ekonomi-adhk.update');         

    //EKONOMI  Distribusi PDRB Atas Dasar Harga Konstan (ADHK) - [m_19_pdrb_konstan]
    Route::get('/adhk_a', [EkonomiAdhkAdminController::class, 'adhk_a'])->name('ekonomi-adhk_A'); 
    Route::get('/adhk_b', [EkonomiAdhkAdminController::class, 'adhk_b'])->name('ekonomi-adhk_B'); 
    Route::get('/adhk_c', [EkonomiAdhkAdminController::class, 'adhk_c'])->name('ekonomi-adhk_C'); 
    Route::get('/adhk_d', [EkonomiAdhkAdminController::class, 'adhk_d'])->name('ekonomi-adhk_D'); 
    Route::get('/adhk_e', [EkonomiAdhkAdminController::class, 'adhk_e'])->name('ekonomi-adhk_E'); 
    Route::get('/adhk_f', [EkonomiAdhkAdminController::class, 'adhk_f'])->name('ekonomi-adhk_F'); 
    Route::get('/adhk_g', [EkonomiAdhkAdminController::class, 'adhk_g'])->name('ekonomi-adhk_G'); 
    Route::get('/adhk_h', [EkonomiAdhkAdminController::class, 'adhk_h'])->name('ekonomi-adhk_H'); 
    Route::get('/adhk_i', [EkonomiAdhkAdminController::class, 'adhk_i'])->name('ekonomi-adhk_I'); 
    Route::get('/adhk_j', [EkonomiAdhkAdminController::class, 'adhk_j'])->name('ekonomi-adhk_J'); 
    Route::get('/adhk_k', [EkonomiAdhkAdminController::class, 'adhk_k'])->name('ekonomi-adhk_K'); 
    Route::get('/adhk_l', [EkonomiAdhkAdminController::class, 'adhk_l'])->name('ekonomi-adhk_L'); 
    Route::get('/adhk_mn', [EkonomiAdhkAdminController::class, 'adhk_mn'])->name('ekonomi-adhk_MN'); 
    Route::get('/adhk_o', [EkonomiAdhkAdminController::class, 'adhk_o'])->name('ekonomi-adhk_O'); 
    Route::get('/adhk_p', [EkonomiAdhkAdminController::class, 'adhk_p'])->name('ekonomi-adhk_P'); 
    Route::get('/adhk_q', [EkonomiAdhkAdminController::class, 'adhk_q'])->name('ekonomi-adhk_Q'); 
    Route::get('/adhk_rstu', [EkonomiAdhkAdminController::class, 'adhk_rstu'])->name('ekonomi-adhk_RSTU'); 






    //EKONOMI Kunjungan Wisata (KW) - [m_20_kunjungan]
    Route::get('/kw', [EkonomiKwAdminController::class, 'kwIndex'])->name('ekonomi-kw.index');     
    Route::post('/kw/store', [EkonomiAdhkAdminController::class, 'kwStore'])->name('ekonomi-kw.store');
    Route::get('/kw/{id}/edit', [EkonomiAdhkAdminController::class, 'kwEdit'])->name('ekonomi-kw.edit');
    Route::put('/kw/{id}', [EkonomiAdhkAdminController::class, 'kwUpdate'])->name('ekonomi-kw.update');         

    //EKONOMI Realisasi Investasi (PMA/ PMDN) - [m_35_pma]
    Route::get('/pma', [EkonomiPmaAdminController::class, 'pmaIndex'])->name('ekonomi-pma.index'); 
    Route::post('/pma/store', [EkonomiPmaAdminController::class, 'pmaStore'])->name('ekonomi-pma.store');
    Route::get('/pma/{id}/edit', [EkonomiPmaAdminController::class, 'pmaEdit'])->name('ekonomi-pma.edit');
    Route::put('/pma/{id}', [EkonomiPmaAdminController::class, 'pmaUpdate'])->name('ekonomi-pma.update');         



    //==============================PERTANAIN==============================================
    //PERTANAIN Produksi Perikanan Budidaya (PPB) - [m_21_perikanan_budidaya]
    Route::get('/ppb', [PertanianPpbAdminController::class, 'ppbIndex'])->name('pertanian-ppb.index'); 
    Route::post('/ppb/store', [PertanianPpbAdminController::class, 'ppbStore'])->name('ekonomi-ppb.store');
    Route::get('/ppb/{id}/edit', [PertanianPpbAdminController::class, 'ppbEdit'])->name('ekonomi-ppb.edit');
    Route::put('/ppb/{id}', [PertanianPpbAdminController::class, 'ppbUpdate'])->name('ekonomi-ppb.update');         

    //PERTANAIN  Produksi Perikanan Tangkap(PPT) - [m_22_perikanan_tangkap]
    Route::get('/ppt', [PertanianPptAdminController::class, 'pptIndex'])->name('pertanian-ppt.index'); 
    Route::post('/ppt/store', [PertanianPptAdminController::class, 'pptStore'])->name('ekonomi-ppt.store');
    Route::get('/ppt/{id}/edit', [PertanianPptAdminController::class, 'pptEdit'])->name('ekonomi-ppt.edit');
    Route::put('/ppt/{id}', [PertanianPptAdminController::class, 'pptUpdate'])->name('ekonomi-ppt.update');         

    //PERTANAIN Capaian Produksi Komoditi Unggulan Perkebunan (CPKUP) - [m_23_perkebunan]
    Route::get('/cpkup', [PertanianCpkupAdminController::class, 'cpkupIndex'])->name('pertanian-cpkup.index'); 
    Route::post('/cpkup/store', [PertanianCpkupAdminController::class, 'cpkupStore'])->name('ekonomi-cpkup.store');
    Route::get('/cpkup/{id}/edit', [PertanianCpkupAdminController::class, 'cpkupEdit'])->name('ekonomi-cpkup.edit');
    Route::put('/cpkup/{id}', [PertanianCpkupAdminController::class, 'cpkupUpdate'])->name('ekonomi-cpkup.update');         

    //PERTANAIN Capaian Produksi Komoditi Hortikultura (CPKH) - [m_24_holtikultura]
    Route::get('/cpkh', [PertanianCpkhAdminController::class, 'cpkhIndex'])->name('pertanian-cpkh.index'); 
    Route::post('/cpkh/store', [PertanianCpkupAdminController::class, 'cpkhStore'])->name('ekonomi-cpkh.store');
    Route::get('/cpkh/{id}/edit', [PertanianCpkupAdminController::class, 'cpkhEdit'])->name('ekonomi-cpkh.edit');
    Route::put('/cpkh/{id}', [PertanianCpkupAdminController::class, 'cpkhUpdate'])->name('ekonomi-cpkh.update');         

    //PERTANAIN Jumlah Produksi Peternakan (JPP) - [m_25_peternakan]
    Route::get('/jpp', [PertanianJppAdminController::class, 'jppIndex'])->name('pertanian-jpp.index'); 
    Route::post('/jpp/store', [PertanianCpkupAdminController::class, 'jppStore'])->name('ekonomi-jpp.store');
    Route::get('/jpp/{id}/edit', [PertanianCpkupAdminController::class, 'jppEdit'])->name('ekonomi-jpp.edit');
    Route::put('/jpp/{id}', [PertanianCpkupAdminController::class, 'jppUpdate'])->name('ekonomi-jpp.update');         



    //===============================KEPENDUDUKAN=============================================
    //KEPENDUDUKAN Jumlah Penduduk (JP) - [mm_26_jml_penduduk]
    Route::get('/jp', [KependudukanJpAdminController::class, 'jpIndex'])->name('kependudukan-jp.index'); 
    Route::post('/jp/store', [KependudukanJpAdminController::class, 'jpStore'])->name('kependudukan-jp.store');
    Route::get('/jp/{id}/edit', [KependudukanJpAdminController::class, 'jpEdit'])->name('kependudukan-jp.edit');
    Route::put('/jp/{id}', [KependudukanJpAdminController::class, 'jpUpdate'])->name('kependudukan-jp.update');         
  
    //KEPENDUDUKAN Jumlah Penduduk Berdasarkan Kecamatan Tahun 2021 (JPBK) - [m_26_penduduk_kecamatan]
    Route::get('/jpbk', [KependudukanJpbkAdminController::class, 'jpbkIndex'])->name('kependudukan-jpbk.index'); 
    Route::post('/jpbk/store', [KependudukanJpbkAdminController::class, 'jpbkStore'])->name('kependudukan-jpbk.store');
    Route::get('/jpbk/{id}/edit', [KependudukanJpbkAdminController::class, 'jpbkEdit'])->name('kependudukan-jpbk.edit');
    Route::put('/jpbk/{id}', [KependudukanJpbkAdminController::class, 'jpbkUpdate'])->name('kependudukan-jpbk.update');         
  
    //KEPENDUDUKAN  Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU) - [m_26_penduduk_umur]
    Route::get('/jpbku', [KependudukanJpbkuAdminController::class, 'jpbkuIndex'])->name('kependudukan-jpbku.index'); 
    Route::post('/jpbku/store', [KependudukanJpbkuAdminController::class, 'jpbkuStore'])->name('kependudukan-jpbku.store');
    Route::get('/jpbku/{id}/edit', [KependudukanJpbkuAdminController::class, 'jpbkuEdit'])->name('kependudukan-jpbku.edit');
    Route::put('/jpbku/{id}', [KependudukanJpbkuAdminController::class, 'jpbkuUpdate'])->name('kependudukan-jpbku.update');         

    //KEPENDUDUKAN  Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU) - [m_26_penduduk_umur]
    Route::get('/jpbku_04Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_04Tahun'])->name('A-jpbku_04Tahun');   
    Route::get('/jpbku_59Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_59Tahun'])->name('B-jpbku_59Tahun');
    Route::get('/jpbku_1014Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_1014Tahun'])->name('C-jpbku_1014Tahun'); 
    Route::get('/jpbku_1519Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_1519Tahun'])->name('D-jpbku_1519Tahun'); 
    Route::get('/jpbku_2024Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_2024Tahun'])->name('E-jpbku_2024Tahun'); 
    Route::get('/jpbku_2529Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_2529Tahun'])->name('F-jpbku_2529Tahun'); 
    Route::get('/jpbku_3034Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_3034Tahun'])->name('G-jpbku_3034Tahun'); 
    Route::get('/jpbku_3539Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_3539Tahun'])->name('H-jpbku_3539Tahun'); 
    Route::get('/jpbku_4044Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_4044Tahun'])->name('I-jpbku_4044Tahun'); 
    Route::get('/jpbku_4549Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_4549Tahun'])->name('J-jpbku_4549Tahun'); 
    Route::get('/jpbku_5054Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_5054Tahun'])->name('K-jpbku_5054Tahun'); 
    Route::get('/jpbku_5459Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_5459Tahun'])->name('L-jpbku_5459Tahun'); 
    Route::get('/jpbku_6064Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_6064Tahun'])->name('M-jpbku_6064Tahun'); 
    Route::get('/jpbku_6569Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_6569Tahun'])->name('N-jpbku_6569Tahun');  
    Route::get('/jpbku_7074Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_7074Tahun'])->name('O-jpbku_7074Tahun');  
    Route::get('/jpbku_75Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_75Tahun'])->name('P-jpbku_75Tahun');  
  
    //KEPENDUDUKAN  Pertumbuhan Penduduk (PP) - [m_27_laju_pertumbuhan]
    Route::get('/pp', [KependudukanPpAdminController::class, 'ppIndex'])->name('kependudukan-pp.index'); 
    Route::post('/pp/store', [KependudukanJpAdminController::class, 'ppStore'])->name('kependudukan-pp.store');
    Route::get('/pp/{id}/edit', [KependudukanJpAdminController::class, 'ppEdit'])->name('kependudukan-pp.edit');
    Route::put('/pp/{id}', [KependudukanJpAdminController::class, 'ppUpdate'])->name('kependudukan-pp.update');         




      //===============================INFRASTRUKTUR=============================================
    //INFRASTRUKTUR Panjang Jalan Yang Dibangun dan Ditingkatkan (PJDD) - [m_28_jalan]
    Route::get('/pjdd', [InfrastrukturPjddAdminController::class, 'pjddIndex'])->name('infrastruktur-pjdd.index'); 
    Route::post('/pjdd/store', [KependudukanJpAdminController::class, 'pjddStore'])->name('infrastruktur-pjdd.store');
    Route::get('/pjdd/{id}/edit', [KependudukanJpAdminController::class, 'pjddEdit'])->name('infrastruktur-pjdd.edit');
    Route::put('/pjdd/{id}', [KependudukanJpAdminController::class, 'pjddUpdate'])->name('infrastruktur-pjdd.update');         

    //INFRASTRUKTUR Persentase Rumah Tangga yang menggunakan air bersih (PRT) - [m_29_air]
    Route::get('/prt', [InfrastrukturPrtAdminController::class, 'prtIndex'])->name('infrastruktur-prt.index'); 
    Route::post('/prt/store', [KependudukanJpAdminController::class, 'prtStore'])->name('infrastruktur-prt.store');
    Route::get('/prt/{id}/edit', [KependudukanJpAdminController::class, 'prtEdit'])->name('infrastruktur-prt.edit');
    Route::put('/prt/{id}', [KependudukanJpAdminController::class, 'prtUpdate'])->name('infrastruktur-prt.update');         
      
    //INFRASTRUKTUR  Persentase Tingkat Kemantapan Jalan (PTKJ) - [m_37_kemantapan_jalan]
    Route::get('/ptkj', [InfrastrukturPtkjAdminController::class, 'ptkjIndex'])->name('infrastruktur-ptkj.index'); 
    Route::post('/ptkj/store', [InfrastrukturPtkjAdminController::class, 'ptkjStore'])->name('infrastruktur-ptkj.store');
    Route::get('/ptkj/{id}/edit', [InfrastrukturPtkjAdminController::class, 'ptkjEdit'])->name('infrastruktur-ptkj.edit');
    Route::put('/ptkj/{id}', [InfrastrukturPtkjAdminController::class, 'ptkjUpdate'])->name('infrastruktur-ptkj.update');         




    //===============================VIDEO=============================================
    //VIDEO Data Video (DV) - [m_video]
    Route::get('/dv', [VideoDvAdminController::class, 'dvIndex'])->name('video-dv.index'); 



  //===============================MANAJEMENT=============================================
    //USER USER
    Route::get('/iu', [ManajemenUserController::class, 'iuIndex'])->middleware(['role:superadmin'])->name('user-iu.index'); 
    Route::post('/iu/store', [ManajemenUserController::class, 'iuStore'])->middleware(['role:superadmin'])->name('user-iu.store'); 
  }
);
