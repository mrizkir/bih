<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\KontenAdminController;

//SOSIAL
use App\Http\Controllers\SosialAdminController;
use App\Http\Controllers\SosialIpmAdminController;
use App\Http\Controllers\SosialRlsAdminController;
use App\Http\Controllers\SosialAMHAdminController;
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
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/term', [HomeController::class, 'term'])->name('term');
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
    Route::get('/ppmcetak', [SosialAdminController::class, 'ppmCetak'])->name('sosial-ppm.cetak'); 

    //SOSIAL Indeks Pembangunan Manusia (IPM)  - [m_2_lpm]
    Route::get('/ipm', [SosialIpmAdminController::class, 'ipmIndex'])->name('sosial-ipm.index');
    Route::post('/ipm/store', [SosialIpmAdminController::class, 'ipmStore'])->name('sosial-ipm.store');
    Route::get('/ipm/{id}/edit', [SosialIpmAdminController::class, 'ipmEdit'])->name('sosial-ipm.edit');
    Route::put('/ipm/{id}', [SosialIpmAdminController::class, 'ipmUpdate'])->name('sosial-ipm.update'); 
    Route::get('/ipmdel/{id}', [SosialIpmAdminController::class, 'ipmDel'])->name('sosial-ipm.del'); 
    Route::get('/ipmcetak', [SosialIpmAdminController::class, 'ipmCetak'])->name('ipmcetak');

    //SOSIAL Angka Rata-Rata Lama Sekolah (RLS) - [m_3_rls]
    Route::get('/rls', [SosialRlsAdminController::class, 'rlsIndex'])->name('sosial-rls.index');
    Route::post('/rls/store', [SosialRlsAdminController::class, 'rlsStore'])->name('sosial-rls.store');
    Route::get('/rls/{id}/edit', [SosialRlsAdminController::class, 'rlsEdit'])->name('sosial-rls.edit');
    Route::put('/rls/{id}', [SosialRlsAdminController::class, 'rlsUpdate'])->name('sosial-rls.update');
    Route::get('/rlsdel/{id}', [SosialRlsAdminController::class, 'rlsDel'])->name('sosial-rls.del');
    Route::get('/rlscetak', [SosialRlsAdminController::class, 'rlsCetak'])->name('rlscetak');

    //SOSIAL Angka Melek Huruf (AMH) - [m_4_amh]
    Route::get('/ahm', [SosialAMHAdminController::class, 'ahmIndex'])->name('sosial-ahm.index');
    Route::post('/ahm/store', [SosialAMHAdminController::class, 'ahmStore'])->name('sosial-ahm.store');
    Route::get('/ahm/{id}/edit', [SosialAMHAdminController::class, 'ahmEdit'])->name('sosial-ahm.edit');
    Route::put('/ahm/{id}', [SosialAMHAdminController::class, 'ahmUpdate'])->name('sosial-ahm.update');
    Route::get('/ahmdel/{id}', [SosialAMHAdminController::class, 'ahmDel'])->name('sosial-ahm.del');
    Route::get('/ahmcetak', [SosialAMHAdminController::class, 'ahmCetak'])->name('ahmcetak');

    //SOSIAL Angka Harapan Hidup (AHH) - [m_5_ahh]
    Route::get('/ahh', [SosialAhhAdminController::class, 'ahhIndex'])->name('sosial-ahh.index');
    Route::post('/ahh/store', [SosialAhhAdminController::class, 'ahhStore'])->name('sosial-ahh.store');
    Route::get('/ahh/{id}/edit', [SosialAhhAdminController::class, 'ahhEdit'])->name('sosial-ahh.edit');
    Route::put('/ahh/{id}', [SosialAhhAdminController::class, 'ahhUpdate'])->name('sosial-ahh.update');
    Route::get('/ahhdel/{id}', [SosialAhhAdminController::class, 'ahhDel'])->name('sosial-ahh.del');
    Route::get('/ahhcetak', [SosialAhhAdminController::class, 'ahhCetak'])->name('ahhcetak');

    //SOSIAL Angka Kelangsungan Hidup Bayi (AKHB) - [m_6_akhb]
    Route::get('/akhb', [SosialAkhbAdminController::class, 'akhbIndex'])->name('sosial-akhb.index');
    Route::post('/akhb/store', [SosialAkhbAdminController::class, 'akhbStore'])->name('sosial-akhb.store');
    Route::get('/akhb/{id}/edit', [SosialAkhbAdminController::class, 'akhbEdit'])->name('sosial-akhb.edit');
    Route::put('/akhb/{id}', [SosialAkhbAdminController::class, 'akhbUpdate'])->name('sosial-akhb.update');
    Route::get('/akhbdel/{id}', [SosialAkhbAdminController::class, 'akhbDel'])->name('sosial-akhb.del');
    Route::get('/akhbcetak', [SosialAkhbAdminController::class, 'akhbCetak'])->name('akhbcetak');

    //SOSIAL Angka kematian ibu melahirkan (AKIM) - [m_7_kematian_ibu]
    Route::get('/akim', [SosialAkimAdminController::class, 'akimIndex'])->name('sosial-akim.index');
    Route::post('/akim/store', [SosialAkimAdminController::class, 'akimStore'])->name('sosial-akim.store');
    Route::get('/akim/{id}/edit', [SosialAkimAdminController::class, 'akimEdit'])->name('sosial-akim.edit');
    Route::put('/akim/{id}', [SosialAkimAdminController::class, 'akimUpdate'])->name('sosial-akim.update');
    Route::get('/akimdel/{id}', [SosialAkimAdminController::class, 'akimDel'])->name('sosial-akim.del');
    Route::get('/akimcetak', [SosialAkimAdminController::class, 'akimCetak'])->name('akimcetak');

    //SOSIAL Perkembangan Kondisi Ketenagakerjaan di Kabupaten Bintan (PKK) - [m_8_tenaga_kerja]
    Route::get('/pkk', [SosialPkkAdminController::class, 'pkkIndex'])->name('sosial-pkk.index');    
    Route::post('/pkk/store', [SosialPkkAdminController::class, 'pkkStore'])->name('sosial-pkk.store');
    Route::get('/pkk/{id}/edit', [SosialPkkAdminController::class, 'pkkEdit'])->name('sosial-pkk.edit');
    Route::put('/pkk/{id}', [SosialPkkAdminController::class, 'pkkUpdate'])->name('sosial-pkk.update');
    Route::get('/pkkdel/{id}', [SosialPkkAdminController::class, 'pkkDel'])->name('sosial-pkk.del');
    Route::get('/pkkcetak', [SosialPkkAdminController::class, 'pkkCetak'])->name('pkkcetak');  

    //SOSIAL Indeks Pembangunan Gender (IPG) - [m_9_ipg]
    Route::get('/ipg', [SosialIpgAdminController::class, 'ipgIndex'])->name('sosial-ipg.index'); 
    Route::post('/ipg/store', [SosialIpgAdminController::class, 'ipgStore'])->name('sosial-ipg.store');
    Route::get('/ipg/{id}/edit', [SosialIpgAdminController::class, 'ipgEdit'])->name('sosial-ipg.edit');
    Route::put('/ipg/{id}', [SosialIpgAdminController::class, 'ipgUpdate'])->name('sosial-ipg.update');
    Route::get('/ipgdel/{id}', [SosialIpgAdminController::class, 'ipgDel'])->name('sosial-ipg.del');
    Route::get('/ipgcetak', [SosialIpgAdminController::class, 'ipgCetak'])->name('ipgcetak'); 
    
    //SOSIAL Angka Partisipasi Kasar (APK) - [m_10_apk]
    Route::get('/apk', [SosialApkAdminController::class, 'apkIndex'])->name('sosial-apk.index'); 
    Route::post('/apk/store', [SosialApkAdminController::class, 'apkStore'])->name('sosial-apk.store');
    Route::get('/apk/{id}/edit', [SosialApkAdminController::class, 'apkEdit'])->name('sosial-apk.edit');
    Route::put('/apk/{id}', [SosialApkAdminController::class, 'apkUpdate'])->name('sosial-apk.update');   
    Route::get('/apkcetak', [SosialApkAdminController::class, 'apkCetak'])->name('apkcetak');  

    //SOSIAL Angka Partisipasi Kasar (APK) - [m_10_apk]
    Route::get('/sosial_apk_SD_tampil', [SosialApkAdminController::class, 'apk_SD'])->name('sosial-apk_SD'); 
    Route::post('/apksd/store', [SosialApkAdminController::class, 'apksdStore'])->name('sosial-apksd.store');
    Route::put('/apksd/{id}', [SosialApkAdminController::class, 'apksdUpdate'])->name('sosial-apksd.update'); 
    Route::get('/apksddel/{id}', [SosialApkAdminController::class, 'apksdDel'])->name('sosial-apk_SD.del');   
    Route::get('/sosial_apk_SD_cetak', [SosialApkAdminController::class, 'apk_SDCetak'])->name('apk_SDCetak'); 
    //UPDATE

    Route::get('/sosial_apk_SMP_tampil', [SosialApkAdminController::class, 'apk_SMP'])->name('sosial-apk_SMP'); 
    Route::post('/apksmp/store', [SosialApkAdminController::class, 'apksmpStore'])->name('sosial-apksmp.store');
    Route::put('/apksmp/{id}', [SosialApkAdminController::class, 'apksmpUpdate'])->name('sosial-apksmp.update'); 
    Route::get('/apksmpdel/{id}', [SosialApkAdminController::class, 'apksmpDel'])->name('sosial-apksmp.del');  
    Route::get('/sosial_apk_SMP_cetak', [SosialApkAdminController::class, 'apk_SMPCetak'])->name('apk_SMPCetak');
        
    Route::get('/sosial_apk_SMA_tampil', [SosialApkAdminController::class, 'apk_SMA'])->name('sosial-apk_SMA'); 
    Route::post('/apksma/store', [SosialApkAdminController::class, 'apksmaStore'])->name('sosial-apksma.store');
    Route::put('/apksma/{id}', [SosialApkAdminController::class, 'apksmaUpdate'])->name('sosial-apksma.update'); 
    Route::get('/apksmadel/{id}', [SosialApkAdminController::class, 'apksmaDel'])->name('sosial-apksma.del'); 
    Route::get('/sosial_apk_SMA_cetak', [SosialApkAdminController::class, 'apk_SMACetak'])->name('apk_SMACetak');  
    

    //SOSIAL Angka partisipasi Murni (APM) - [m_11_apm]
    Route::get('/apm', [SosialApmAdminController::class, 'apmIndex'])->name('sosial-apm.index');
    Route::post('/apm/store', [SosialApmAdminController::class, 'apmStore'])->name('sosial-apm.store');
    Route::get('/apm/{id}/edit', [SosialApmAdminController::class, 'apmEdit'])->name('sosial-apm.edit');
    Route::put('/apm/{id}', [SosialApmAdminController::class, 'apmUpdate'])->name('sosial-apm.update'); 
    Route::get('/apmcetak', [SosialApmAdminController::class, 'apmCetak'])->name('apmcetak');    

    //SOSIAL Angka partisipasi Murni (APM) - [m_11_apm]
    Route::get('/sosial_apm_SD_tampil', [SosialApmAdminController::class, 'apm_SD'])->name('sosial-apm_SD');
    Route::post('/apmsd/store', [SosialApmAdminController::class, 'apmsdStore'])->name('sosial-apmsd.store');
    Route::get('/apmsd/{id}/edit', [SosialApmAdminController::class, 'apmsdEdit'])->name('sosial-apmsd.edit');
    Route::put('/apmsd/{id}', [SosialApmAdminController::class, 'apmsdUpdate'])->name('sosial-apmsd.update');   
    Route::get('/apmsddel/{id}', [SosialApmAdminController::class, 'apmsdDel'])->name('sosial-apmsd.del');   
    Route::get('/sosial_apm_SD_cetak', [SosialApmAdminController::class, 'apm_SDCetak'])->name('apm_SDCetak');  

    Route::get('/sosial_apmSMP', [SosialApmAdminController::class, 'apm_SMP'])->name('sosial-apm_SMP');
    Route::post('/apmsmp/store', [SosialApmAdminController::class, 'apmsmpStore'])->name('sosial-apmsmp.store');
    Route::get('/apmsmp/{id}/edit', [SosialApmAdminController::class, 'apmsmpEdit'])->name('sosial-apmsmp.edit');
    Route::put('/apmsmp/{id}', [SosialApmAdminController::class, 'apmsmpUpdate'])->name('sosial-apmsmp.update');   
    Route::get('/apmsmpdel/{id}', [SosialApmAdminController::class, 'apmsmpDel'])->name('sosial-apmsmp.del');   
    Route::get('/sosial_apmSMcetak', [SosialApmAdminController::class, 'apm_SMPCetak'])->name('apm_SMPCetak');  

    Route::get('/sosial_apmSMA', [SosialApmAdminController::class, 'apm_SMA'])->name('sosial-apm_SMA');
    Route::post('/apmsma/store', [SosialApmAdminController::class, 'apmsmaStore'])->name('sosial-apmsma.store');
    Route::get('/apmsma/{id}/edit', [SosialApmAdminController::class, 'apmsmaEdit'])->name('sosial-apmsma.edit');
    Route::put('/apmsma/{id}', [SosialApmAdminController::class, 'apmsmaUpdate'])->name('sosial-apmsma.update');   
    Route::get('/apmsmadel/{id}', [SosialApmAdminController::class, 'apmsmaDel'])->name('sosial-apmsma.del');  
    Route::get('/sosial_apmSMAcetak', [SosialApmAdminController::class, 'apm_SMACetak'])->name('apm_SMACetak');


    //SOSIAL Angka Harapan Lama Sekolah (HLS) - [m_12_hls]
    Route::get('/hls', [SosialHlsAdminController::class, 'hlsIndex'])->name('sosial-hls.index'); 
    Route::post('/hls/store', [SosialHlsAdminController::class, 'hlsStore'])->name('sosial-hls.store');
    Route::get('/hls/{id}/edit', [SosialHlsAdminController::class, 'hlsEdit'])->name('sosial-hls.edit');
    Route::put('/hls/{id}', [SosialHlsAdminController::class, 'hlsUpdate'])->name('sosial-hls.update');      
    Route::get('/hlsdel/{id}', [SosialHlsAdminController::class, 'hlsDel'])->name('sosial-hls.del');  
    Route::get('/hlscetak', [SosialHlsAdminController::class, 'hlsCetak'])->name('hlscetak'); 

    //SOSIAL Jumlah Rumah Tidak Layak Huni Yang Direhab (JRTLH) - [m_13_rtlh]
    Route::get('/jrtlh', [SosialJrtlhAdminController::class, 'jrtlhIndex'])->name('sosial-jrtlh.index');    
    Route::post('/jrtlh/store', [SosialJrtlhAdminController::class, 'jrtlhStore'])->name('sosial-jrtlh.store');
    Route::get('/jrtlh/{id}/edit', [SosialJrtlhAdminController::class, 'jrtlhEdit'])->name('sosial-jrtlh.edit');
    Route::put('/jrtlh/{id}', [SosialJrtlhAdminController::class, 'jrtlhUpdate'])->name('sosial-jrtlh.update');  
    Route::get('/jrtlhdel/{id}', [SosialJrtlhAdminController::class, 'jrtlhDel'])->name('sosial-jrtlh.del');  
    Route::get('/jrtlhcetak', [SosialJrtlhAdminController::class, 'jrtlhCetak'])->name('jrtlhcetak');   
  
    //SOSIAL Indeks Gini (IG) - [m_14_gini]
    Route::get('/ig', [SosialIgAdminController::class, 'igIndex'])->name('sosial-ig.index');
    Route::post('/ig/store', [SosialIgAdminController::class, 'igStore'])->name('sosial-ig.store');
    Route::get('/ig/{id}/edit', [SosialIgAdminController::class, 'igEdit'])->name('sosial-ig.edit');
    Route::put('/ig/{id}', [SosialIgAdminController::class, 'igUpdate'])->name('sosial-ig.update');    
    Route::get('/igdel/{id}', [SosialIgAdminController::class, 'igDel'])->name('sosial-ig.del');  
    Route::get('/igcetak', [SosialIgAdminController::class, 'igCetak'])->name('igcetak');
    
    //SOSIAL Indeks Daya Beli - Purchasing Power Parity (IDB) - [m_15_idb]
    Route::get('/idb', [SosialIdbAdminController::class, 'idbIndex'])->name('sosial-idb.index');  
    Route::post('/idb/store', [SosialIdbAdminController::class, 'idbStore'])->name('sosial-idb.store');
    Route::get('/idb/{id}/edit', [SosialIdbAdminController::class, 'idbEdit'])->name('sosial-idb.edit');
    Route::put('/idb/{id}', [SosialIdbAdminController::class, 'idbUpdate'])->name('sosial-idb.update');   
    Route::get('/idbdel/{id}', [SosialIdbAdminController::class, 'idbDel'])->name('sosial-idb.del');     
    Route::get('/idbcetak', [SosialIdbAdminController::class, 'idbCetak'])->name('idbcetak'); 
  
    //SOSIAL Persentase Penduduk Usia 15 Tahun ke atas menurut Pendidikan yang Ditamatkan (PPU) - [m_16_lulusan_pendidikan]
    Route::get('/ppu', [SosialPpuAdminController::class, 'ppuIndex'])->name('sosial-ppu.index'); 
    Route::post('/ppu/store', [SosialPpuAdminController::class, 'ppuStore'])->name('sosial-ppu.store');
    Route::get('/ppu/{id}/edit', [SosialPpuAdminController::class, 'ppuEdit'])->name('sosial-ppu.edit');
    Route::put('/ppu/{id}', [SosialPpuAdminController::class, 'ppuUpdate'])->name('sosial-ppu.update');   
    Route::get('/ppudel/{id}', [SosialPpuAdminController::class, 'ppuDel'])->name('sosial-ppu.del');     
    Route::get('/ppucetak', [SosialPpuAdminController::class, 'ppuCetak'])->name('ppucetak'); 

    //SOSIAL  Indeks Pemberdayaan Gender (IPGG) - [m_38_idg]
    Route::get('/ipgg', [SosialIpggAdminController::class, 'ipggIndex'])->name('sosial-ipgg.index'); 
    Route::post('/ipgg/store', [SosialIpggAdminController::class, 'ipggStore'])->name('sosial-ipgg.store');
    Route::get('/ipgg/{id}/edit', [SosialIpggAdminController::class, 'ipggEdit'])->name('sosial-ipgg.edit');
    Route::put('/ipgg/{id}', [SosialIpggAdminController::class, 'ipggUpdate'])->name('sosial-ipgg.update');   
    Route::get('/ipggdel/{id}', [SosialIpggAdminController::class, 'ipggDel'])->name('sosial-ipgg.del');    
    Route::get('/ipggcetak', [SosialIpggAdminController::class, 'ipggCetak'])->name('ipggcetak');   


 

  // =================================EKONOMI===========================================
    //EKONOMI  Petumbuhan Ekonomi (PE) - [m_17_ekonomi]
    Route::get('/pe', [EkonomiPeAdminController::class, 'peIndex'])->name('ekonomi-pe.index'); 
    Route::post('/pe/store', [EkonomiPeAdminController::class, 'peStore'])->name('ekonomi-pe.store');
    Route::get('/pe/{id}/edit', [EkonomiPeAdminController::class, 'peEdit'])->name('ekonomi-pe.edit');
    Route::put('/pe/{id}', [EkonomiPeAdminController::class, 'peUpdate'])->name('ekonomi-pe.update');   
    Route::get('/pedel/{id}', [EkonomiPeAdminController::class, 'peDel'])->name('ekonomi-pe.del');
    Route::get('/pecetak', [EkonomiPeAdminController::class, 'peCetak'])->name('pecetak'); 

    //EKONOMI  Laju Inflasi (LI) - [m_18_inflasi]
    Route::get('/li', [EkonomiLiAdminController::class, 'liIndex'])->name('ekonomi-li.index');  
    Route::post('/li/store', [EkonomiLiAdminController::class, 'liStore'])->name('ekonomi-li.store');
    Route::get('/li/{id}/edit', [EkonomiLiAdminController::class, 'liEdit'])->name('ekonomi-li.edit');
    Route::put('/li/{id}', [EkonomiLiAdminController::class, 'liUpdate'])->name('ekonomi-li.update');    
    Route::get('/lidel/{id}', [EkonomiLiAdminController::class, 'liDel'])->name('ekonomi-li.del');
    Route::get('/licetak', [EkonomiLiAdminController::class, 'liCetak'])->name('licetak');      
    
    //EKONOMI   Distribusi PDRB Atas Dasar Harga Berlaku (ADHB) - [m_19_pdrb_berlaku]
    Route::get('/adhb', [EkonomiAdhbAdminController::class, 'adhbIndex'])->name('ekonomi-adhb.index');  
    Route::post('/adhb/store', [EkonomiAdhbAdminController::class, 'adhbStore'])->name('ekonomi-adhb.store');
    Route::get('/adhb/{id}/edit', [EkonomiAdhbAdminController::class, 'adhbEdit'])->name('ekonomi-adhb.edit');
    Route::put('/adhb/{id}', [EkonomiAdhbAdminController::class, 'adhbUpdate'])->name('ekonomi-adhb.update');   
    Route::get('/adhbcetak', [EkonomiAdhbAdminController::class, 'adhbCetak'])->name('adhbcetak');      



 

    //EKONOMI   Distribusi PDRB Atas Dasar Harga Berlaku (ADHB) - [m_19_pdrb_berlaku] 
    Route::get('/adhb_a', [EkonomiAdhbAdminController::class, 'adhb_a'])->name('ekonomi-adhb_A'); 
    Route::post('/adhb_a/store', [EkonomiAdhbAdminController::class, 'adhb_aStore'])->name('ekonomi-adhb_A.store'); 
    Route::put('/adhb_a/{id}', [EkonomiAdhbAdminController::class, 'adhb_aUpdate'])->name('ekonomi-adhb_A.update'); 
    Route::get('/adhb_adel/{id}', [EkonomiAdhbAdminController::class, 'adhb_aDel'])->name('ekonomi-adhb_A.del'); 
    Route::get('/adhb_acetak', [EkonomiAdhbAdminController::class, 'adhb_aCetak'])->name('adhb_acetak');  
    
    Route::get('/adhb_b', [EkonomiAdhbAdminController::class, 'adhb_b'])->name('ekonomi-adhb_B'); 
    Route::post('/adhb_b/store', [EkonomiAdhbAdminController::class, 'adhb_bStore'])->name('ekonomi-adhb_B.store'); 
    Route::put('/adhb_b/{id}', [EkonomiAdhbAdminController::class, 'adhb_bUpdate'])->name('ekonomi-adhb_B.update'); 
    Route::get('/adhb_bdel/{id}', [EkonomiAdhbAdminController::class, 'adhb_bDel'])->name('ekonomi-adhb_B.del'); 
    Route::get('/adhb_bcetak', [EkonomiAdhbAdminController::class, 'adhb_bCetak'])->name('adhb_bcetak'); 

    Route::get('/adhb_c', [EkonomiAdhbAdminController::class, 'adhb_c'])->name('ekonomi-adhb_C');  
    Route::post('/adhb_c/store', [EkonomiAdhbAdminController::class, 'adhb_cStore'])->name('ekonomi-adhb_C.store');   
    Route::put('/adhb_c/{id}', [EkonomiAdhbAdminController::class, 'adhb_cUpdate'])->name('ekonomi-adhb_C.update');  
    Route::get('/adhb_cdel/{id}', [EkonomiAdhbAdminController::class, 'adhb_cDel'])->name('ekonomi-adhb_C.del'); 
    Route::get('/adhb_ccetak', [EkonomiAdhbAdminController::class, 'adhb_cCetak'])->name('adhb_ccetak');   

    Route::get('/adhb_d', [EkonomiAdhbAdminController::class, 'adhb_d'])->name('ekonomi-adhb_D');  
    Route::post('/adhb_d/store', [EkonomiAdhbAdminController::class, 'adhb_dStore'])->name('ekonomi-adhb_D.store'); 
    Route::put('/adhb_d/{id}', [EkonomiAdhbAdminController::class, 'adhb_dUpdate'])->name('ekonomi-adhb_D.update');
    Route::get('/adhb_ddel/{id}', [EkonomiAdhbAdminController::class, 'adhb_dDel'])->name('ekonomi-adhb_D.del');
    Route::get('/adhb_dcetak', [EkonomiAdhbAdminController::class, 'adhb_dCetak'])->name('adhb_dcetak');  

    Route::get('/adhb_e', [EkonomiAdhbAdminController::class, 'adhb_e'])->name('ekonomi-adhb_E'); 
    Route::post('/adhb_e/store', [EkonomiAdhbAdminController::class, 'adhb_eStore'])->name('ekonomi-adhb_E.store');
    Route::put('/adhb_e/{id}', [EkonomiAdhbAdminController::class, 'adhb_eUpdate'])->name('ekonomi-adhb_E.update');
    Route::get('/adhb_edel/{id}', [EkonomiAdhbAdminController::class, 'adhb_eDel'])->name('ekonomi-adhb_E.del');
    Route::get('/adhb_ecetak', [EkonomiAdhbAdminController::class, 'adhb_eCetak'])->name('adhb_ecetak'); 

    Route::get('/adhb_f', [EkonomiAdhbAdminController::class, 'adhb_f'])->name('ekonomi-adhb_F'); 
    Route::post('/adhb_f/store', [EkonomiAdhbAdminController::class, 'adhb_fStore'])->name('ekonomi-adhb_F.store');
    Route::put('/adhb_f/{id}', [EkonomiAdhbAdminController::class, 'adhb_fUpdate'])->name('ekonomi-adhb_F.update');
    Route::get('/adhb_fdel/{id}', [EkonomiAdhbAdminController::class, 'adhb_fDel'])->name('ekonomi-adhb_F.del');
    Route::get('/adhb_fcetak', [EkonomiAdhbAdminController::class, 'adhb_fCetak'])->name('adhb_fcetak'); 
    
    Route::get('/adhb_g', [EkonomiAdhbAdminController::class, 'adhb_g'])->name('ekonomi-adhb_G');
    Route::post('/adhb_g/store', [EkonomiAdhbAdminController::class, 'adhb_gStore'])->name('ekonomi-adhb_G.store');
    Route::put('/adhb_g/{id}', [EkonomiAdhbAdminController::class, 'adhb_gUpdate'])->name('ekonomi-adhb_G.update');
    Route::get('/adhb_gdel/{id}', [EkonomiAdhbAdminController::class, 'adhb_gDel'])->name('ekonomi-adhb_G.del'); 
    Route::get('/adhb_gcetak', [EkonomiAdhbAdminController::class, 'adhb_gCetak'])->name('adhb_gcetak');
    
    Route::get('/adhb_h', [EkonomiAdhbAdminController::class, 'adhb_h'])->name('ekonomi-adhb_H');     
    Route::post('/adhb_h/store', [EkonomiAdhbAdminController::class, 'adhb_hStore'])->name('ekonomi-adhb_H.store');     
    Route::put('/adhb_h/{id}', [EkonomiAdhbAdminController::class, 'adhb_hUpdate'])->name('ekonomi-adhb_H.update');     
    Route::get('/adhb_hdel/{id}', [EkonomiAdhbAdminController::class, 'adhb_hDel'])->name('ekonomi-adhb_H.del'); 
    Route::get('/adhb_hcetak', [EkonomiAdhbAdminController::class, 'adhb_hCetak'])->name('adhb_hcetak');   
        
    Route::get('/adhb_i', [EkonomiAdhbAdminController::class, 'adhb_i'])->name('ekonomi-adhb_I');          
    Route::post('/adhb_i/store', [EkonomiAdhbAdminController::class, 'adhb_iStore'])->name('ekonomi-adhb_I.store');          
    Route::put('/adhb_i/{id}', [EkonomiAdhbAdminController::class, 'adhb_iUpdate'])->name('ekonomi-adhb_I.update');          
    Route::get('/adhb_idel/{id}', [EkonomiAdhbAdminController::class, 'adhb_iDel'])->name('ekonomi-adhb_I.del'); 
    Route::get('/adhb_icetak', [EkonomiAdhbAdminController::class, 'adhb_iCetak'])->name('adhb_icetak');        

    Route::get('/adhb_j', [EkonomiAdhbAdminController::class, 'adhb_j'])->name('ekonomi-adhb_J');  
    Route::post('/adhb_j/store', [EkonomiAdhbAdminController::class, 'adhb_jStore'])->name('ekonomi-adhb_J.store');
    Route::put('/adhb_j/{id}', [EkonomiAdhbAdminController::class, 'adhb_jUpdate'])->name('ekonomi-adhb_J.update');
    Route::get('/adhb_jdel/{id}', [EkonomiAdhbAdminController::class, 'adhb_jDel'])->name('ekonomi-adhb_J.del');
    Route::get('/adhb_jcetak', [EkonomiAdhbAdminController::class, 'adhb_jCetak'])->name('adhb_jcetak');  

    Route::get('/adhb_k', [EkonomiAdhbAdminController::class, 'adhb_k'])->name('ekonomi-adhb_K');  
    Route::post('/adhb_k/store', [EkonomiAdhbAdminController::class, 'adhb_kStore'])->name('ekonomi-adhb_K.store');  
    Route::put('/adhb_k/{id}', [EkonomiAdhbAdminController::class, 'adhb_kUpdate'])->name('ekonomi-adhb_K.update');  
    Route::get('/adhb_kdel/{id}', [EkonomiAdhbAdminController::class, 'adhb_kDel'])->name('ekonomi-adhb_K.del');  
    Route::get('/adhb_kcetak', [EkonomiAdhbAdminController::class, 'adhb_kCetak'])->name('adhb_kcetak');  
 
    Route::get('/adhb_l', [EkonomiAdhbAdminController::class, 'adhb_l'])->name('ekonomi-adhb_L');  
    Route::post('/adhb_l/store', [EkonomiAdhbAdminController::class, 'adhb_lStore'])->name('ekonomi-adhb_L.store');  
    Route::put('/adhb_l/{id}', [EkonomiAdhbAdminController::class, 'adhb_lUpdate'])->name('ekonomi-adhb_L.update');  
    Route::get('/adhb_ldel/{id}', [EkonomiAdhbAdminController::class, 'adhb_lDel'])->name('ekonomi-adhb_L.del'); 
    Route::get('/adhb_lcetak', [EkonomiAdhbAdminController::class, 'adhb_lCetak'])->name('adhb_lcetak');   

    Route::get('/adhb_mn', [EkonomiAdhbAdminController::class, 'adhb_mn'])->name('ekonomi-adhb_MN');  
    Route::post('/adhb_mn/store', [EkonomiAdhbAdminController::class, 'adhb_mnStore'])->name('ekonomi-adhb_MN.store'); 
    Route::put('/adhb_mn/{id}', [EkonomiAdhbAdminController::class, 'adhb_mnUpdate'])->name('ekonomi-adhb_MN.update'); 
    Route::get('/adhb_mndel/{id}', [EkonomiAdhbAdminController::class, 'adhb_mnDel'])->name('ekonomi-adhb_MN.del'); 
    Route::get('/adhb_mncetak', [EkonomiAdhbAdminController::class, 'adhb_mnCetak'])->name('adhb_mncetak');  
 
    Route::get('/adhb_o', [EkonomiAdhbAdminController::class, 'adhb_o'])->name('ekonomi-adhb_O');  
    Route::post('/adhb_o/store', [EkonomiAdhbAdminController::class, 'adhb_oStore'])->name('ekonomi-adhb_O.store');  
    Route::put('/adhb_o/{id}', [EkonomiAdhbAdminController::class, 'adhb_oUpdate'])->name('ekonomi-adhb_O.update');  
    Route::get('/adhb_odel/{id}', [EkonomiAdhbAdminController::class, 'adhb_oDel'])->name('ekonomi-adhb_O.del');  
    Route::get('/adhb_ocetak', [EkonomiAdhbAdminController::class, 'adhb_oCetak'])->name('adhb_ocetak');  

    Route::get('/adhb_p', [EkonomiAdhbAdminController::class, 'adhb_p'])->name('ekonomi-adhb_P');  
    Route::post('/adhb_p/store', [EkonomiAdhbAdminController::class, 'adhb_pStore'])->name('ekonomi-adhb_P.store');   
    Route::put('/adhb_p/{id}', [EkonomiAdhbAdminController::class, 'adhb_pUpdate'])->name('ekonomi-adhb_P.update');  
    Route::get('/adhb_pdel/{id}', [EkonomiAdhbAdminController::class, 'adhb_pDel'])->name('ekonomi-adhb_P.del'); 
    Route::get('/adhb_pcetak', [EkonomiAdhbAdminController::class, 'adhb_pCetak'])->name('adhb_pcetak');   

    Route::get('/adhb_q', [EkonomiAdhbAdminController::class, 'adhb_q'])->name('ekonomi-adhb_Q');  
    Route::post('/adhb_q/store', [EkonomiAdhbAdminController::class, 'adhb_qStore'])->name('ekonomi-adhb_Q.store'); 
    Route::put('/adhb_q/{id}', [EkonomiAdhbAdminController::class, 'adhb_qUpdate'])->name('ekonomi-adhb_Q.update'); 
    Route::get('/adhb_qdel/{id}', [EkonomiAdhbAdminController::class, 'adhb_qDel'])->name('ekonomi-adhb_Q.del'); 
    Route::get('/adhb_qcetak', [EkonomiAdhbAdminController::class, 'adhb_qCetak'])->name('adhb_qcetak');  

    Route::get('/adhb_rstu', [EkonomiAdhbAdminController::class, 'adhb_rstu'])->name('ekonomi-adhb_RSTU'); 
    Route::post('/adhb_rstu/store', [EkonomiAdhbAdminController::class, 'adhb_rstuStore'])->name('ekonomi-adhb_RSTU.store'); 
    Route::put('/adhb_rstu/{id}', [EkonomiAdhbAdminController::class, 'adhb_rstuUpdate'])->name('ekonomi-adhb_RSTU.update'); 
    Route::get('/adhb_rstudel/{id}', [EkonomiAdhbAdminController::class, 'adhb_rstuDel'])->name('ekonomi-adhb_RSTU.del'); 
    Route::get('/adhb_rstucetak', [EkonomiAdhbAdminController::class, 'adhb_rstuCetak'])->name('adhb_rstucetak'); 




    //EKONOMI  Distribusi PDRB Atas Dasar Harga Konstan (ADHK) - [m_19_pdrb_konstan]
    Route::get('/adhk', [EkonomiAdhkAdminController::class, 'adhkIndex'])->name('ekonomi-adhk.index');  
    Route::post('/adhk/store', [EkonomiAdhkAdminController::class, 'adhkStore'])->name('ekonomi-adhk.store');
    Route::get('/adhk/{id}/edit', [EkonomiAdhkAdminController::class, 'adhkEdit'])->name('ekonomi-adhk.edit');
    Route::put('/adhk/{id}', [EkonomiAdhkAdminController::class, 'adhkUpdate'])->name('ekonomi-adhk.update'); 
    Route::get('/adhk', [EkonomiAdhkAdminController::class, 'adhkIndex'])->name('ekonomi-adhk.index');          

    //EKONOMI  Distribusi PDRB Atas Dasar Harga Konstan (ADHK) - [m_19_pdrb_konstan]
    Route::get('/adhk_a', [EkonomiAdhkAdminController::class, 'adhk_a'])->name('ekonomi-adhk_A'); 
    Route::post('/adhk_a/store', [EkonomiAdhkAdminController::class, 'adhk_aStore'])->name('ekonomi-adhk_A.store'); 
    Route::put('/adhk_a/{id}', [EkonomiAdhkAdminController::class, 'adhk_aUpdate'])->name('ekonomi-adhk_A.update'); 
    Route::get('/adhk_adel/{id}', [EkonomiAdhkAdminController::class, 'adhk_aDel'])->name('ekonomi-adhk_A.del'); 
    Route::get('/adhk_acetak', [EkonomiAdhkAdminController::class, 'adhk_aCetak'])->name('adhk_acetak'); 
    
    Route::get('/adhk_b', [EkonomiAdhkAdminController::class, 'adhk_b'])->name('ekonomi-adhk_B'); 
    Route::post('/adhk_b/store', [EkonomiAdhkAdminController::class, 'adhk_bStore'])->name('ekonomi-adhk_B.store'); 
    Route::put('/adhk_b/{id}', [EkonomiAdhkAdminController::class, 'adhk_bUpdate'])->name('ekonomi-adhk_B.update'); 
    Route::get('/adhk_bdel/{id}', [EkonomiAdhkAdminController::class, 'adhk_bDel'])->name('ekonomi-adhk_B.del'); 
    Route::get('/adhk_bcetak', [EkonomiAdhkAdminController::class, 'adhk_bCetak'])->name('adhk_bcetak'); 

    Route::get('/adhk_c', [EkonomiAdhkAdminController::class, 'adhk_c'])->name('ekonomi-adhk_C');  
    Route::post('/adhk_c/store', [EkonomiAdhkAdminController::class, 'adhk_cStore'])->name('ekonomi-adhk_C.store');   
    Route::put('/adhk_c/{id}', [EkonomiAdhkAdminController::class, 'adhk_cUpdate'])->name('ekonomi-adhk_C.update');  
    Route::get('/adhk_cdel/{id}', [EkonomiAdhkAdminController::class, 'adhk_cDel'])->name('ekonomi-adhk_C.del');  
    Route::get('/adhk_ccetak', [EkonomiAdhkAdminController::class, 'adhk_cCetak'])->name('ekonomi-adhk_ccetak');  

    Route::get('/adhk_d', [EkonomiAdhkAdminController::class, 'adhk_d'])->name('ekonomi-adhk_D');  
    Route::post('/adhk_d/store', [EkonomiAdhkAdminController::class, 'adhk_dStore'])->name('ekonomi-adhk_D.store'); 
    Route::put('/adhk_d/{id}', [EkonomiAdhkAdminController::class, 'adhk_dUpdate'])->name('ekonomi-adhk_D.update');
    Route::get('/adhk_ddel/{id}', [EkonomiAdhkAdminController::class, 'adhk_dDel'])->name('ekonomi-adhk_D.del');
    Route::get('/adhk_dcetak', [EkonomiAdhkAdminController::class, 'adhk_dCetak'])->name('ekonomi-adhk_dcetak');

    Route::get('/adhk_e', [EkonomiAdhkAdminController::class, 'adhk_e'])->name('ekonomi-adhk_E'); 
    Route::post('/adhk_e/store', [EkonomiAdhkAdminController::class, 'adhk_eStore'])->name('ekonomi-adhk_E.store');
    Route::put('/adhk_e/{id}', [EkonomiAdhkAdminController::class, 'adhk_eUpdate'])->name('ekonomi-adhk_E.update');
    Route::get('/adhk_edel/{id}', [EkonomiAdhkAdminController::class, 'adhk_eDel'])->name('ekonomi-adhk_E.del');
    Route::get('/adhk_ecetak', [EkonomiAdhkAdminController::class, 'adhk_eCetak'])->name('adhk_ecetak'); 

    Route::get('/adhk_f', [EkonomiAdhkAdminController::class, 'adhk_f'])->name('ekonomi-adhk_F'); 
    Route::post('/adhk_f/store', [EkonomiAdhkAdminController::class, 'adhk_fStore'])->name('ekonomi-adhk_F.store');
    Route::put('/adhk_f/{id}', [EkonomiAdhkAdminController::class, 'adhk_fUpdate'])->name('ekonomi-adhk_F.update');
    Route::get('/adhk_fdel/{id}', [EkonomiAdhkAdminController::class, 'adhk_fDel'])->name('ekonomi-adhk_F.del');
    Route::get('/adhk_fcetak', [EkonomiAdhkAdminController::class, 'adhk_fCetak'])->name('adhk_fcetak'); 
    
    Route::get('/adhk_g', [EkonomiAdhkAdminController::class, 'adhk_g'])->name('ekonomi-adhk_G');
    Route::post('/adhk_g/store', [EkonomiAdhkAdminController::class, 'adhk_gStore'])->name('ekonomi-adhk_G.store');
    Route::put('/adhk_g/{id}', [EkonomiAdhkAdminController::class, 'adhk_gUpdate'])->name('ekonomi-adhk_G.update');
    Route::get('/adhk_gdel/{id}', [EkonomiAdhkAdminController::class, 'adhk_gDel'])->name('ekonomi-adhk_G.del'); 
    Route::get('/adhk_gcetak', [EkonomiAdhkAdminController::class, 'adhk_gCetak'])->name('adhk_gcetak');
    
    Route::get('/adhk_h', [EkonomiAdhkAdminController::class, 'adhk_h'])->name('ekonomi-adhk_H');     
    Route::post('/adhk_h/store', [EkonomiAdhkAdminController::class, 'adhk_hStore'])->name('ekonomi-adhk_H.store');     
    Route::put('/adhk_h/{id}', [EkonomiAdhkAdminController::class, 'adhk_hUpdate'])->name('ekonomi-adhk_H.update');     
    Route::get('/adhk_hdel/{id}', [EkonomiAdhkAdminController::class, 'adhk_hDel'])->name('ekonomi-adhk_H.del'); 
    Route::get('/adhk_hcetak', [EkonomiAdhkAdminController::class, 'adhk_hCetak'])->name('adhk_hcetak');     
        
    Route::get('/adhk_i', [EkonomiAdhkAdminController::class, 'adhk_i'])->name('ekonomi-adhk_I');          
    Route::post('/adhk_i/store', [EkonomiAdhkAdminController::class, 'adhk_iStore'])->name('ekonomi-adhk_I.store');          
    Route::put('/adhk_i/{id}', [EkonomiAdhkAdminController::class, 'adhk_iUpdate'])->name('ekonomi-adhk_I.update');          
    Route::get('/adhk_idel/{id}', [EkonomiAdhkAdminController::class, 'adhk_iDel'])->name('ekonomi-adhk_I.del');  
    Route::get('/adhk_icetak', [EkonomiAdhkAdminController::class, 'adhk_iCetak'])->name('adhk_icetak');          

    Route::get('/adhk_j', [EkonomiAdhkAdminController::class, 'adhk_j'])->name('ekonomi-adhk_J');  
    Route::post('/adhk_j/store', [EkonomiAdhkAdminController::class, 'adhk_jStore'])->name('ekonomi-adhk_J.store');
    Route::put('/adhk_j/{id}', [EkonomiAdhkAdminController::class, 'adhk_jUpdate'])->name('ekonomi-adhk_J.update');
    Route::get('/adhk_jdel/{id}', [EkonomiAdhkAdminController::class, 'adhk_jDel'])->name('ekonomi-adhk_J.del');
    Route::get('/adhk_jcetak', [EkonomiAdhkAdminController::class, 'adhk_jCetak'])->name('adhk_jcetak');  

    Route::get('/adhk_k', [EkonomiAdhkAdminController::class, 'adhk_k'])->name('ekonomi-adhk_K');  
    Route::post('/adhk_k/store', [EkonomiAdhkAdminController::class, 'adhk_kStore'])->name('ekonomi-adhk_K.store');  
    Route::put('/adhk_k/{id}', [EkonomiAdhkAdminController::class, 'adhk_kUpdate'])->name('ekonomi-adhk_K.update');  
    Route::get('/adhk_kdel/{id}', [EkonomiAdhkAdminController::class, 'adhk_kDel'])->name('ekonomi-adhk_K.del');  
    Route::get('/adhk_kcetak', [EkonomiAdhkAdminController::class, 'adhk_kCetak'])->name('adhk_kcetak');  
 
    Route::get('/adhk_l', [EkonomiAdhkAdminController::class, 'adhk_l'])->name('ekonomi-adhk_L');  
    Route::post('/adhk_l/store', [EkonomiAdhkAdminController::class, 'adhk_lStore'])->name('ekonomi-adhk_L.store');  
    Route::put('/adhk_l/{id}', [EkonomiAdhkAdminController::class, 'adhk_lUpdate'])->name('ekonomi-adhk_L.update');  
    Route::get('/adhk_ldel/{id}', [EkonomiAdhkAdminController::class, 'adhk_lDel'])->name('ekonomi-adhk_L.del');  
    Route::get('/adhk_lcetak', [EkonomiAdhkAdminController::class, 'adhk_lCetak'])->name('adhk_lcetak');  

    Route::get('/adhk_mn', [EkonomiAdhkAdminController::class, 'adhk_mn'])->name('ekonomi-adhk_MN');  
    Route::post('/adhk_mn/store', [EkonomiAdhkAdminController::class, 'adhk_mnStore'])->name('ekonomi-adhk_MN.store'); 
    Route::put('/adhk_mn/{id}', [EkonomiAdhkAdminController::class, 'adhk_mnUpdate'])->name('ekonomi-adhk_MN.update'); 
    Route::get('/adhk_mndel/{id}', [EkonomiAdhkAdminController::class, 'adhk_mnDel'])->name('ekonomi-adhk_MN.del'); 
    Route::get('/adhk_mncetak', [EkonomiAdhkAdminController::class, 'adhk_mnCetak'])->name('adhk_mncetak');  
 
    Route::get('/adhk_o', [EkonomiAdhkAdminController::class, 'adhk_o'])->name('ekonomi-adhk_O');  
    Route::post('/adhk_o/store', [EkonomiAdhkAdminController::class, 'adhk_oStore'])->name('ekonomi-adhk_O.store');  
    Route::put('/adhk_o/{id}', [EkonomiAdhkAdminController::class, 'adhk_oUpdate'])->name('ekonomi-adhk_O.update');  
    Route::get('/adhk_odel/{id}', [EkonomiAdhkAdminController::class, 'adhk_oDel'])->name('ekonomi-adhk_O.del');  
    Route::get('/adhk_ocetak', [EkonomiAdhkAdminController::class, 'adhk_oCetak'])->name('adhk_ocetak');  

    Route::get('/adhk_p', [EkonomiAdhkAdminController::class, 'adhk_p'])->name('ekonomi-adhk_P');  
    Route::post('/adhk_p/store', [EkonomiAdhkAdminController::class, 'adhk_pStore'])->name('ekonomi-adhk_P.store');   
    Route::put('/adhk_p/{id}', [EkonomiAdhkAdminController::class, 'adhk_pUpdate'])->name('ekonomi-adhk_P.update');  
    Route::get('/adhk_pdel/{id}', [EkonomiAdhkAdminController::class, 'adhk_pDel'])->name('ekonomi-adhk_P.del');  
    Route::get('/adhk_pcetak', [EkonomiAdhkAdminController::class, 'adhk_pCetak'])->name('adhk_pcetak');  

    Route::get('/adhk_q', [EkonomiAdhkAdminController::class, 'adhk_q'])->name('ekonomi-adhk_Q');  
    Route::post('/adhk_q/store', [EkonomiAdhkAdminController::class, 'adhk_qStore'])->name('ekonomi-adhk_Q.store'); 
    Route::put('/adhk_q/{id}', [EkonomiAdhkAdminController::class, 'adhk_qUpdate'])->name('ekonomi-adhk_Q.update'); 
    Route::get('/adhk_qdel/{id}', [EkonomiAdhkAdminController::class, 'adhk_qDel'])->name('ekonomi-adhk_Q.del'); 
    Route::get('/adhk_qcetak', [EkonomiAdhkAdminController::class, 'adhk_qCetak'])->name('adhk_qcetak');  

    Route::get('/adhk_rstu', [EkonomiAdhkAdminController::class, 'adhk_rstu'])->name('ekonomi-adhk_RSTU'); 
    Route::post('/adhk_rstu/store', [EkonomiAdhkAdminController::class, 'adhk_rstuStore'])->name('ekonomi-adhk_RSTU.store'); 
    Route::put('/adhk_rstu/{id}', [EkonomiAdhkAdminController::class, 'adhk_rstuUpdate'])->name('ekonomi-adhk_RSTU.update'); 
    Route::get('/adhk_rstudel/{id}', [EkonomiAdhkAdminController::class, 'adhk_rstuDel'])->name('ekonomi-adhk_RSTU.del'); 
    Route::get('/adhk_rstucetak', [EkonomiAdhkAdminController::class, 'adhk_rstuCetak'])->name('adhk_rstucetak'); 






    //EKONOMI Kunjungan Wisata (KW) - [m_20_kunjungan]
    Route::get('/kw', [EkonomiKwAdminController::class, 'kwIndex'])->name('ekonomi-kw.index');     
    Route::post('/kw/store', [EkonomiKwAdminController::class, 'kwStore'])->name('ekonomi-kw.store');
    Route::get('/kw/{id}/edit', [EkonomiKwAdminController::class, 'kwEdit'])->name('ekonomi-kw.edit');
    Route::put('/kw/{id}', [EkonomiKwAdminController::class, 'kwUpdate'])->name('ekonomi-kw.update');       
    Route::get('/kwdel/{id}', [EkonomiKwAdminController::class, 'kwDel'])->name('ekonomi-kw.del');  
    Route::get('/kwcetak', [EkonomiKwAdminController::class, 'kwCetak'])->name('kwcetak');

    //EKONOMI Realisasi Investasi (PMA/ PMDN) - [m_35_pma]
    Route::get('/pma', [EkonomiPmaAdminController::class, 'pmaIndex'])->name('ekonomi-pma.index'); 
    Route::post('/pma/store', [EkonomiPmaAdminController::class, 'pmaStore'])->name('ekonomi-pma.store');
    Route::get('/pma/{id}/edit', [EkonomiPmaAdminController::class, 'pmaEdit'])->name('ekonomi-pma.edit');
    Route::put('/pma/{id}', [EkonomiPmaAdminController::class, 'pmaUpdate'])->name('ekonomi-pma.update');  
    Route::get('/pmadel/{id}', [EkonomiPmaAdminController::class, 'pmaDel'])->name('ekonomi-pma.del'); 
    Route::get('/pmacetak', [EkonomiPmaAdminController::class, 'pmaCetak'])->name('pmacetak');       
  


    //==============================PERTANAIN==============================================
    //PERTANAIN Produksi Perikanan Budidaya (PPB) - [m_21_perikanan_budidaya]
    Route::get('/ppb', [PertanianPpbAdminController::class, 'ppbIndex'])->name('pertanian-ppb.index'); 
    Route::post('/ppb/store', [PertanianPpbAdminController::class, 'ppbStore'])->name('pertanian-ppb.store');
    Route::get('/ppb/{id}/edit', [PertanianPpbAdminController::class, 'ppbEdit'])->name('pertanian-ppb.edit');
    Route::put('/ppb/{id}', [PertanianPpbAdminController::class, 'ppbUpdate'])->name('pertanian-ppb.update'); 
    Route::get('/ppbdel/{id}', [PertanianPpbAdminController::class, 'ppbDel'])->name('pertanian-ppb.del'); 
    Route::get('/ppbcetak', [PertanianPpbAdminController::class, 'ppbCetak'])->name('ppbcetak');        

    //PERTANAIN  Produksi Perikanan Tangkap(PPT) - [m_22_perikanan_tangkap]
    Route::get('/ppt', [PertanianPptAdminController::class, 'pptIndex'])->name('pertanian-ppt.index'); 
    Route::post('/ppt/store', [PertanianPptAdminController::class, 'pptStore'])->name('pertanian-ppt.store');
    Route::get('/ppt/{id}/edit', [PertanianPptAdminController::class, 'pptEdit'])->name('pertanian-ppt.edit');
    Route::put('/ppt/{id}', [PertanianPptAdminController::class, 'pptUpdate'])->name('pertanian-ppt.update'); 
    Route::get('/pptdel/{id}', [PertanianPptAdminController::class, 'pptDel'])->name('pertanian-ppt.del'); 
    Route::get('/pptcetak', [PertanianPptAdminController::class, 'pptCetak'])->name('pptcetak');             

    //PERTANAIN Capaian Produksi Komoditi Unggulan Perkebunan (CPKUP) - [m_23_perkebunan]
    Route::get('/cpkup', [PertanianCpkupAdminController::class, 'cpkupIndex'])->name('pertanian-cpkup.index'); 
    Route::post('/cpkup/store', [PertanianCpkupAdminController::class, 'cpkupStore'])->name('pertanian-cpkup.store');
    Route::get('/cpkup/{id}/edit', [PertanianCpkupAdminController::class, 'cpkupEdit'])->name('pertanian-cpkup.edit');
    Route::put('/cpkup/{id}', [PertanianCpkupAdminController::class, 'cpkupUpdate'])->name('pertanian-cpkup.update'); 
    Route::get('/cpkupdel/{id}', [PertanianCpkupAdminController::class, 'cpkupDel'])->name('pertanian-cpkup.Del'); 
    Route::get('/cpkupcetak', [PertanianCpkupAdminController::class, 'cpkupCetak'])->name('cpkupcetak');        

    //PERTANAIN Capaian Produksi Komoditi Hortikultura (CPKH) - [m_24_holtikultura]
    Route::get('/cpkh', [PertanianCpkhAdminController::class, 'cpkhIndex'])->name('pertanian-cpkh.index'); 
    Route::post('/cpkh/store', [PertanianCpkhAdminController::class, 'cpkhStore'])->name('pertanian-cpkh.store');
    Route::get('/cpkh/{id}/edit', [PertanianCpkhAdminController::class, 'cpkhEdit'])->name('pertanian-cpkh.edit');
    Route::put('/cpkh/{id}', [PertanianCpkhAdminController::class, 'cpkhUpdate'])->name('pertanian-cpkh.update'); 
    Route::get('/cpkhdel/{id}', [PertanianCpkhAdminController::class, 'cpkhDel'])->name('pertanian-cpkh.del');  
    Route::get('/cpkhcetak', [PertanianCpkhAdminController::class, 'cpkhCetak'])->name('cpkhcetak');       

    //PERTANAIN Jumlah Produksi Peternakan (JPP) - [m_25_peternakan]
    Route::get('/jpp', [PertanianJppAdminController::class, 'jppIndex'])->name('pertanian-jpp.index'); 
    Route::post('/jpp/store', [PertanianJppAdminController::class, 'jppStore'])->name('pertanian-jpp.store');
    Route::get('/jpp/{id}/edit', [PertanianJppAdminController::class, 'jppEdit'])->name('pertanian-jpp.edit');
    Route::put('/jpp/{id}', [PertanianJppAdminController::class, 'jppUpdate'])->name('pertanian-jpp.update');  
    Route::get('/jppdel/{id}', [PertanianJppAdminController::class, 'jppDel'])->name('pertanian-jpp.del');   
    Route::get('/jppcetak', [PertanianJppAdminController::class, 'jppCetak'])->name('jppcetak');     



    //===============================KEPENDUDUKAN=============================================
    //KEPENDUDUKAN Jumlah Penduduk (JP) - [m_36_jumlah_penduduk]
    Route::get('/jp', [KependudukanJpAdminController::class, 'jpIndex'])->name('kependudukan-jp.index'); 
    Route::post('/jp/store', [KependudukanJpAdminController::class, 'jpStore'])->name('kependudukan-jp.store');
    Route::get('/jp/{id}/edit', [KependudukanJpAdminController::class, 'jpEdit'])->name('kependudukan-jp.edit');
    Route::put('/jp/{id}', [KependudukanJpAdminController::class, 'jpUpdate'])->name('kependudukan-jp.update');     
    Route::get('/jpdel/{id}', [KependudukanJpAdminController::class, 'jpDel'])->name('kependudukan-jp.del');   
    Route::get('/jpcetak', [KependudukanJpAdminController::class, 'jpCetak'])->name('jpcetak');  
  
    //KEPENDUDUKAN Jumlah Penduduk Berdasarkan Kecamatan Tahun 2021 (JPBK) - [m_26_penduduk_kecamatan]
    Route::get('/jpbk', [KependudukanJpbkAdminController::class, 'jpbkIndex'])->name('kependudukan-jpbk.index'); 
    Route::post('/jpbk/store', [KependudukanJpbkAdminController::class, 'jpbkStore'])->name('kependudukan-jpbk.store');
    Route::get('/jpbk/{id}/edit', [KependudukanJpbkAdminController::class, 'jpbkEdit'])->name('kependudukan-jpbk.edit');
    Route::put('/jpbk/{id}', [KependudukanJpbkAdminController::class, 'jpbkUpdate'])->name('kependudukan-jpbk.update');  
    Route::get('/jpbkdel/{id}', [KependudukanJpbkAdminController::class, 'jpbkDel'])->name('kependudukan-jpbk.del');
    Route::get('/jpbkcetak', [KependudukanJpbkAdminController::class, 'jpbkCetak'])->name('jpbkcetak');        
   
    //KEPENDUDUKAN  Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU) - [m_26_penduduk_umur]
    Route::get('/jpbku_04Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_04Tahun'])->name('A-jpbku_04');  
    Route::post('/jpbku_04Tahun/store', [KependudukanJpbkuAdminController::class, 'jpbku_04TahunStore'])->name('jpbku_04Tahun.store');
    Route::put('/jpbku_04Tahun/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_04TahunUpdate'])->name('jpbku_04Tahun.update');  
    Route::get('/jpbku_04Tahundel/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_04TahunDel'])->name('jpbku_04Tahun.del'); 
    Route::get('/jpbku_04cetak', [KependudukanJpbkuAdminController::class, 'jpbku_04Cetak'])->name('jpbku_04cetak');
     
    Route::get('/jpbku_59Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_59Tahun'])->name('B-jpbku_59');
    Route::post('/jpbku_59Tahun/store', [KependudukanJpbkuAdminController::class, 'jpbku_59TahunStore'])->name('jpbku_59Tahun.store');
    Route::put('/jpbku_59Tahun/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_59TahunUpdate'])->name('jpbku_59Tahun.update');
    Route::get('/jpbku_59Tahundel/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_59TahunDel'])->name('jpbku_59Tahun.del');
    Route::get('/jpbku_59cetak', [KependudukanJpbkuAdminController::class, 'jpbku_59Cetak'])->name('jpbku_59cetak');


    Route::get('/jpbku_1014Tahun', [KependudukanJpbkuAdminController::class, 'jpbku_1014Tahun'])->name('C-jpbku_1014');
    Route::post('/jpbku_1014Tahun/store', [KependudukanJpbkuAdminController::class, 'jpbku_1014TahunStore'])->name('jpbku_1014Tahun.store');   
    Route::put('/jpbku_1014Tahun/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_1014TahunUpdate'])->name('jpbku_1014Tahun.update');
    Route::get('/jpbku_1014Tahundel/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_1014TahunDel'])->name('C-jpbku_1014Tahun.del');
    Route::get('/jpbku_1014cetak', [KependudukanJpbkuAdminController::class, 'jpbku_1014Cetak'])->name('jpbku_1014cetak');
    
    Route::get('/jpbku_1519', [KependudukanJpbkuAdminController::class, 'jpbku_1519'])->name('D-jpbku_1519');
    Route::post('/jpbku_1519/store', [KependudukanJpbkuAdminController::class, 'jpbku_1519Store'])->name('jpbku_1519.store');   
    Route::put('/jpbku_1519/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_1519Update'])->name('jpbku_1519.update');
    Route::get('/jpbku_1519del/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_1519Del'])->name('jpbku_1519.del');
    Route::get('/jpbku_1519cetak', [KependudukanJpbkuAdminController::class, 'jpbku_1519Cetak'])->name('jpbku_1519cetak');
 
    Route::get('/jpbku_2024', [KependudukanJpbkuAdminController::class, 'jpbku_2024'])->name('E-jpbku_2024'); 
    Route::post('/jpbku_2024/store', [KependudukanJpbkuAdminController::class, 'jpbku_2024Store'])->name('jpbku_2024.store'); 
    Route::put('/jpbku_2024/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_2024Update'])->name('jpbku_2024.update'); 
    Route::get('/jpbku_2024del/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_2024Del'])->name('jpbku_2024.del'); 
    Route::get('/jpbku_2024cetak', [KependudukanJpbkuAdminController::class, 'jpbku_2024Cetak'])->name('jpbku_2024cetak'); 

    Route::get('/jpbku_2529', [KependudukanJpbkuAdminController::class, 'jpbku_2529'])->name('F-jpbku_2529'); 
    Route::post('/jpbku_2529/store', [KependudukanJpbkuAdminController::class, 'jpbku_2529Store'])->name('jpbku_2529.store');
    Route::put('/jpbku_2529/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_2529Update'])->name('jpbku_2529.update');
    Route::get('/jpbku_2529del/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_2529Del'])->name('jpbku_2529.del');
    Route::get('/jpbku_2529cetak', [KependudukanJpbkuAdminController::class, 'jpbku_2529Cetak'])->name('jpbku_2529cetak'); 

    Route::get('/jpbku_3034', [KependudukanJpbkuAdminController::class, 'jpbku_3034'])->name('G-jpbku_3034'); 
    Route::post('/jpbku_3034/store', [KependudukanJpbkuAdminController::class, 'jpbku_3034Store'])->name('jpbku_3034.store'); 
    Route::put('/jpbku_3034/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_3034Update'])->name('jpbku_3034.update'); 
    Route::get('/jpbku_3034del/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_3034Del'])->name('jpbku_3034.del');
    Route::get('/jpbku_3034cetak', [KependudukanJpbkuAdminController::class, 'jpbku_3034Cetak'])->name('jpbku_3034cetak');  

    Route::get('/jpbku_3539', [KependudukanJpbkuAdminController::class, 'jpbku_3539'])->name('H-jpbku_3539');
    Route::post('/jpbku_3539/store', [KependudukanJpbkuAdminController::class, 'jpbku_3539Store'])->name('jpbku_3539.store');
    Route::put('/jpbku_3539/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_3539Update'])->name('jpbku_3539.update');
    Route::get('/jpbku_3539del/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_3539Del'])->name('jpbku_3539.del');
    Route::get('/jpbku_3539cetak', [KependudukanJpbkuAdminController::class, 'jpbku_3539Cetak'])->name('jpbku_3539cetak');

    Route::get('/jpbku_4044', [KependudukanJpbkuAdminController::class, 'jpbku_4044'])->name('I-jpbku_4044'); 
    Route::post('/jpbku_4044/store', [KependudukanJpbkuAdminController::class, 'jpbku_4044Store'])->name('jpbku_4044.store'); 
    Route::put('/jpbku_4044/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_4044Update'])->name('jpbku_4044.update'); 
    Route::get('/jpbku_4044del/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_4044Del'])->name('jpbku_4044.del'); 
    Route::get('/jpbku_4044cetak', [KependudukanJpbkuAdminController::class, 'jpbku_4044Cetak'])->name('jpbku_4044cetak');

    Route::get('/jpbku_4549', [KependudukanJpbkuAdminController::class, 'jpbku_4549'])->name('J-jpbku_4549');
    Route::post('/jpbku_4549/store', [KependudukanJpbkuAdminController::class, 'jpbku_4549Store'])->name('jpbku_4549.store'); 
    Route::put('/jpbku_4549/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_4549Update'])->name('jpbku_4549.update'); 
    Route::get('/jpbku_4549del/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_4549Del'])->name('jpbku_4549.del'); 
    Route::get('/jpbku_4549cetak', [KependudukanJpbkuAdminController::class, 'jpbku_4549Cetak'])->name('jpbku_4549cetak');
    
    Route::get('/jpbku_5054', [KependudukanJpbkuAdminController::class, 'jpbku_5054'])->name('K-jpbku_5054'); 
    Route::post('/jpbku_5054/store', [KependudukanJpbkuAdminController::class, 'jpbku_5054Store'])->name('jpbku_5054.store'); 
    Route::put('/jpbku_5054/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_5054Update'])->name('jpbku_5054.update'); 
    Route::get('/jpbku_5054del/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_5054Del'])->name('jpbku_5054.del'); 
    Route::get('/jpbku_5054cetak', [KependudukanJpbkuAdminController::class, 'jpbku_5054Cetak'])->name('jpbku_5054cetak'); 

    Route::get('/jpbku_5459', [KependudukanJpbkuAdminController::class, 'jpbku_5459'])->name('L-jpbku_5459'); 
    Route::post('/jpbku_5459/store', [KependudukanJpbkuAdminController::class, 'jpbku_5459Store'])->name('jpbku_5459.store'); 
    Route::put('/jpbku_5459/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_5459Update'])->name('jpbku_5459.update'); 
    Route::get('/jpbku_5459del/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_5459Del'])->name('jpbku_5459.del'); 
    Route::get('/jpbku_5459cetak', [KependudukanJpbkuAdminController::class, 'jpbku_5459Cetak'])->name('jpbku_5459cetak'); 

    Route::get('/jpbku_6064', [KependudukanJpbkuAdminController::class, 'jpbku_6064'])->name('M-jpbku_6064'); 
    Route::post('/jpbku_6064/store', [KependudukanJpbkuAdminController::class, 'jpbku_6064Store'])->name('jpbku_6064.store');
    Route::put('/jpbku_6064/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_6064Update'])->name('jpbku_6064.update');
    Route::get('/jpbku_6064del/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_6064Del'])->name('jpbku_6064.del');
    Route::get('/jpbku_6064cetak', [KependudukanJpbkuAdminController::class, 'jpbku_6064Cetak'])->name('jpbku_6064cetak'); 

    Route::get('/jpbku_6569', [KependudukanJpbkuAdminController::class, 'jpbku_6569'])->name('N-jpbku_6569'); 
    Route::post('/jpbku_6569/store', [KependudukanJpbkuAdminController::class, 'jpbku_6569Store'])->name('jpbku_6569.store'); 
    Route::put('/jpbku_6569/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_6569Update'])->name('jpbku_6569.update'); 
    Route::get('/jpbku_6569del/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_6569Del'])->name('jpbku_6569.del'); 
    Route::get('/jpbku_6569cetak', [KependudukanJpbkuAdminController::class, 'jpbku_6569Cetak'])->name('jpbku_6569cetak'); 
        
    Route::get('/jpbku_7074', [KependudukanJpbkuAdminController::class, 'jpbku_7074'])->name('O-jpbku_7074');  
    Route::post('/jpbku_7074/store', [KependudukanJpbkuAdminController::class, 'jpbku_7074Store'])->name('jpbku_7074.store');   
    Route::put('/jpbku_7074/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_7074Update'])->name('jpbku_7074.update');   
    Route::get('/jpbku_7074del/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_7074Del'])->name('jpbku_7074.del');      
    Route::get('/jpbku_7074cetak', [KependudukanJpbkuAdminController::class, 'jpbku_7074Cetak'])->name('jpbku_7074cetak');  

    Route::get('/jpbku_75', [KependudukanJpbkuAdminController::class, 'jpbku_75'])->name('P-jpbku_75');  
    Route::post('/jpbku_75/store', [KependudukanJpbkuAdminController::class, 'jpbku_75Store'])->name('jpbku_75.store');    
    Route::put('/jpbku_75/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_75Update'])->name('jpbku_75.update');   
    Route::get('/jpbku_75del/{id}', [KependudukanJpbkuAdminController::class, 'jpbku_75Del'])->name('jpbku_75,del'); 
    Route::get('/jpbku_75cetak', [KependudukanJpbkuAdminController::class, 'jpbku_75Cetak'])->name('jpbku_75cetak');  
  
    //KEPENDUDUKAN  Pertumbuhan Penduduk (PP) - [m_27_laju_pertumbuhan]
    Route::get('/pp', [KependudukanPpAdminController::class, 'ppIndex'])->name('kependudukan-pp.index'); 
    Route::post('/pp/store', [KependudukanPpAdminController::class, 'ppStore'])->name('kependudukan-pp.store');
    Route::get('/pp/{id}/edit', [KependudukanPpAdminController::class, 'ppEdit'])->name('kependudukan-pp.edit');
    Route::put('/pp/{id}', [KependudukanPpAdminController::class, 'ppUpdate'])->name('kependudukan-pp.update');   
    Route::get('/ppdel/{id}', [KependudukanPpAdminController::class, 'ppDel'])->name('kependudukan-pp.del');    
    Route::get('/ppcetak', [KependudukanPpAdminController::class, 'ppCetak'])->name('ppcetak');   




      //===============================INFRASTRUKTUR=============================================
    //INFRASTRUKTUR Panjang Jalan Yang Dibangun dan Ditingkatkan (PJDD) - [m_28_jalan]
    Route::get('/pjdd', [InfrastrukturPjddAdminController::class, 'pjddIndex'])->name('infrastruktur-pjdd.index'); 
    Route::post('/pjdd/store', [InfrastrukturPjddAdminController::class, 'pjddStore'])->name('infrastruktur-pjdd.store');
    Route::get('/pjdd/{id}/edit', [InfrastrukturPjddAdminController::class, 'pjddEdit'])->name('infrastruktur-pjdd.edit');
    Route::put('/pjdd/{id}', [InfrastrukturPjddAdminController::class, 'pjddUpdate'])->name('infrastruktur-pjdd.update');  
    Route::get('/pjdddel/{id}', [InfrastrukturPjddAdminController::class, 'pjddDel'])->name('infrastruktur-pjdd.del');
    Route::get('/pjddcetak', [InfrastrukturPjddAdminController::class, 'pjddCetak'])->name('pjddcetak');       

    //INFRASTRUKTUR Persentase Rumah Tangga yang menggunakan air bersih (PRT) - [m_29_air]
    Route::get('/prt', [InfrastrukturPrtAdminController::class, 'prtIndex'])->name('infrastruktur-prt.index'); 
    Route::post('/prt/store', [InfrastrukturPrtAdminController::class, 'prtStore'])->name('infrastruktur-prt.store');
    Route::get('/prt/{id}/edit', [InfrastrukturPrtAdminController::class, 'prtEdit'])->name('infrastruktur-prt.edit');
    Route::put('/prt/{id}', [InfrastrukturPrtAdminController::class, 'prtUpdate'])->name('infrastruktur-prt.update');  
    Route::get('/prtdel/{id}', [InfrastrukturPrtAdminController::class, 'prtDel'])->name('infrastruktur-prt.del');    
    Route::get('/prtcetak', [InfrastrukturPrtAdminController::class, 'prtCetak'])->name('prtcetak');    
      
    //INFRASTRUKTUR  Persentase Tingkat Kemantapan Jalan (PTKJ) - [m_37_kemantapan_jalan]
    Route::get('/ptkj', [InfrastrukturPtkjAdminController::class, 'ptkjIndex'])->name('infrastruktur-ptkj.index'); 
    Route::post('/ptkj/store', [InfrastrukturPtkjAdminController::class, 'ptkjStore'])->name('infrastruktur-ptkj.store');
    Route::get('/ptkj/{id}/edit', [InfrastrukturPtkjAdminController::class, 'ptkjEdit'])->name('infrastruktur-ptkj.edit');
    Route::put('/ptkj/{id}', [InfrastrukturPtkjAdminController::class, 'ptkjUpdate'])->name('infrastruktur-ptkj.update');   
    Route::get('/ptkjdel/{id}', [InfrastrukturPtkjAdminController::class, 'ptkjDel'])->name('infrastruktur-ptkj.del');  
    Route::get('/ptkjcetak', [InfrastrukturPtkjAdminController::class, 'ptkjCetak'])->name('ptkjcetak');     




    //===============================VIDEO=============================================
    //VIDEO Data Video (DV) - [m_video]
    Route::get('/dv', [VideoDvAdminController::class, 'dvIndex'])->name('video-dv.index'); 
    Route::post('/dv/store', [VideoDvAdminController::class, 'dvStore'])->name('video-dv.store'); 
    Route::put('/dv/{id}', [VideoDvAdminController::class, 'dvUpdate'])->name('video-dv.update');
    Route::get('/dvdel/{id}', [VideoDvAdminController::class, 'dvDel'])->name('video-dv.del'); 



  //===============================MANAJEMENT=============================================
    //USER USER
    Route::get('/iu', [ManajemenUserController::class, 'iuIndex'])->middleware(['role:superadmin'])->name('user-iu.index'); 
    Route::post('/iu/store', [ManajemenUserController::class, 'iuStore'])->middleware(['role:superadmin'])->name('user-iu.store');
    Route::post('/iu/{id}', [ManajemenUserController::class, 'iuUpdate'])->middleware(['role:superadmin'])->name('user-iu.update');
    Route::get('/iudel/{id}', [ManajemenUserController::class, 'iuDel'])->middleware(['role:superadmin'])->name('user-iu.del');
  }
);
