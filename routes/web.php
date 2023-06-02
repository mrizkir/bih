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

    //SOSIAL Indeks Pembangunan Manusia (IPM)  - [m_2_lpm]
    Route::get('/ipm', [SosialIpmAdminController::class, 'ipmIndex'])->name('sosial-ipm.index');
    Route::post('/ipm/store', [SosialIpmAdminController::class, 'ipmStore'])->name('sosial-ipm.store');
    Route::get('/ipm/{id}/edit', [SosialIpmAdminController::class, 'ipmEdit'])->name('sosial-ipm.edit');
    Route::put('/ipm/{id}', [SosialIpmAdminController::class, 'ipmUpdate'])->name('sosial-ipm.update'); 

    //SOSIAL Angka Rata-Rata Lama Sekolah (RLS) - [m_3_rls]
    Route::get('/rls', [SosialRlsAdminController::class, 'rlsIndex'])->name('sosial-rls.index');
    Route::post('/rls/store', [SosialRlsAdminController::class, 'rlsStore'])->name('sosial-rls.store');
    Route::get('/rls/{id}/edit', [SosialRlsAdminController::class, 'rlsEdit'])->name('sosial-rls.edit');
    Route::put('/rls/{id}', [SosialRlsAdminController::class, 'rlsUpdate'])->name('sosial-rls.update');

    //SOSIAL Angka Melek Huruf (AMH) - [m_4_amh]
    Route::get('/ahm', [SosialAhmAdminController::class, 'ahmIndex'])->name('sosial-ahm.index');
    Route::post('/ahm/store', [SosialAhmAdminController::class, 'ahmStore'])->name('sosial-ahm.store');
    Route::get('/ahm/{id}/edit', [SosialAhmAdminController::class, 'ahmEdit'])->name('sosial-ahm.edit');
    Route::put('/ahm/{id}', [SosialAhmAdminController::class, 'ahmUpdate'])->name('sosial-ahm.update');

    //SOSIAL Angka Harapan Hidup (AHH) - [m_5_ahh]
    Route::get('/ahh', [SosialAhhAdminController::class, 'ahhIndex'])->name('sosial-ahh.index');
    Route::post('/ahh/store', [SosialAhhAdminController::class, 'ahhStore'])->name('sosial-ahh.store');
    Route::get('/ahh/{id}/edit', [SosialAhhAdminController::class, 'ahhEdit'])->name('sosial-ahh.edit');
    Route::put('/ahh/{id}', [SosialAhhAdminController::class, 'ahhUpdate'])->name('sosial-ahh.update');

    //SOSIAL Angka Kelangsungan Hidup Bayi (AKHB) - [m_6_akhb]
    Route::get('/akhb', [SosialAkhbAdminController::class, 'akhbIndex'])->name('sosial-akhb.index');
    Route::post('/akhb/store', [SosialAkhbAdminController::class, 'akhbStore'])->name('sosial-akhb.store');
    Route::get('/akhb/{id}/edit', [SosialAkhbAdminController::class, 'akhbEdit'])->name('sosial-akhb.edit');
    Route::put('/akhb/{id}', [SosialAkhbAdminController::class, 'akhbUpdate'])->name('sosial-akhb.update');

    //SOSIAL Angka kematian ibu melahirkan (AKIM) - [m_7_kematian_ibu]
    Route::get('/akim', [SosialAkimAdminController::class, 'akimIndex'])->name('sosial-akim.index');
    Route::post('/akim/store', [SosialAkimAdminController::class, 'akimStore'])->name('sosial-akim.store');
    Route::get('/akim/{id}/edit', [SosialAkimAdminController::class, 'akimEdit'])->name('sosial-akim.edit');
    Route::put('/akim/{id}', [SosialAkimAdminController::class, 'akimUpdate'])->name('sosial-akim.update');

    //SOSIAL Perkembangan Kondisi Ketenagakerjaan di Kabupaten Bintan (PKK) - [m_8_tenaga_kerja]
    Route::get('/pkk', [SosialPkkAdminController::class, 'pkkIndex'])->name('sosial-pkk.index');    
    Route::post('/pkk/store', [SosialPkkAdminController::class, 'pkkStore'])->name('sosial-pkk.store');
    Route::get('/pkk/{id}/edit', [SosialPkkAdminController::class, 'pkkEdit'])->name('sosial-pkk.edit');
    Route::put('/pkk/{id}', [SosialPkkAdminController::class, 'pkkUpdate'])->name('sosial-pkk.update');

    //SOSIAL Indeks Pembangunan Gender (IPG) - [m_9_ipg]
    Route::get('/ipg', [SosialIpgAdminController::class, 'ipgIndex'])->name('sosial-ipg.index'); 
    Route::post('/ipg/store', [SosialIpgAdminController::class, 'ipgStore'])->name('sosial-ipg.store');
    Route::get('/ipg/{id}/edit', [SosialIpgAdminController::class, 'ipgEdit'])->name('sosial-ipg.edit');
    Route::put('/ipg/{id}', [SosialIpgAdminController::class, 'ipgUpdate'])->name('sosial-ipg.update');
    
    //SOSIAL Angka Partisipasi Kasar (APK) - [m_10_apk]
    Route::get('/apk', [SosialApkAdminController::class, 'apkIndex'])->name('sosial-apk.index'); 
    Route::post('/apk/store', [SosialApkAdminController::class, 'apkStore'])->name('sosial-apk.store');
    Route::get('/apk/{id}/edit', [SosialApkAdminController::class, 'apkEdit'])->name('sosial-apk.edit');
    Route::put('/apk/{id}', [SosialApkAdminController::class, 'apkUpdate'])->name('sosial-apk.update');     

    //SOSIAL Angka partisipasi Murni (APM) - [m_11_apm]
    Route::get('/apm', [SosialApmAdminController::class, 'apmIndex'])->name('sosial-apm.index');
    Route::post('/apm/store', [SosialApmAdminController::class, 'apmStore'])->name('sosial-apm.store');
    Route::get('/apm/{id}/edit', [SosialApmAdminController::class, 'apmEdit'])->name('sosial-apm.edit');
    Route::put('/apm/{id}', [SosialApmAdminController::class, 'apmUpdate'])->name('sosial-apm.update');     

    //SOSIAL Angka Harapan Lama Sekolah (HLS) - [m_12_hls]
    Route::get('/hls', [SosialHlsAdminController::class, 'hlsIndex'])->name('sosial-hls.index'); 
    Route::post('/apm/store', [SosialApmAdminController::class, 'apmStore'])->name('sosial-apm.store');
    Route::get('/apm/{id}/edit', [SosialApmAdminController::class, 'apmEdit'])->name('sosial-apm.edit');
    Route::put('/apm/{id}', [SosialApmAdminController::class, 'apmUpdate'])->name('sosial-apm.update');     

    //SOSIAL Jumlah Rumah Tidak Layak Huni Yang Direhab (JRTLH) - [m_13_rtlh]
    Route::get('/jrtlh', [SosialJrtlhAdminController::class, 'jrtlhIndex'])->name('sosial-jrtlh.index');    
    Route::post('/jrtlh/store', [SosialJrtlhAdminController::class, 'jrtlhStore'])->name('sosial-jrtlh.store');
    Route::get('/jrtlh/{id}/edit', [SosialJrtlhAdminController::class, 'jrtlhEdit'])->name('sosial-jrtlh.edit');
    Route::put('/jrtlh/{id}', [SosialJrtlhAdminController::class, 'jrtlhUpdate'])->name('sosial-jrtlh.update');      
  
    //SOSIAL Indeks Gini (IG) - [m_14_gini]
    Route::get('/ig', [SosialIgAdminController::class, 'igIndex'])->name('sosial-ig.index');
    Route::post('/ig/store', [SosialIgAdminController::class, 'igStore'])->name('sosial-ig.store');
    Route::get('/ig/{id}/edit', [SosialIgAdminController::class, 'igEdit'])->name('sosial-ig.edit');
    Route::put('/ig/{id}', [SosialIgAdminController::class, 'igUpdate'])->name('sosial-ig.update');      
    
    //SOSIAL Indeks Daya Beli - Purchasing Power Parity (IDB) - [m_15_idb]
    Route::get('/idb', [SosialIdbAdminController::class, 'idbIndex'])->name('sosial-idb.index');  
    Route::post('/ig/store', [SosialIdbAdminController::class, 'igStore'])->name('sosial-ig.store');
    Route::get('/ig/{id}/edit', [SosialIdbAdminController::class, 'igEdit'])->name('sosial-ig.edit');
    Route::put('/ig/{id}', [SosialIdbAdminController::class, 'igUpdate'])->name('sosial-ig.update');        
 
    //SOSIAL Persentase Penduduk Usia 15 Tahun ke atas menurut Pendidikan yang Ditamatkan (PPU) - [m_16_lulusan_pendidikan]
    Route::get('/ppu', [SosialPpuAdminController::class, 'ppuIndex'])->name('sosial-ppu.index'); 
    Route::post('/ppu/store', [SosialPpuAdminController::class, 'ppuStore'])->name('sosial-ppu.store');
    Route::get('/ppu/{id}/edit', [SosialPpuAdminController::class, 'ppuEdit'])->name('sosial-ppu.edit');
    Route::put('/ppu/{id}', [SosialPpuAdminController::class, 'ppuUpdate'])->name('sosial-ppu.update');        

    //SOSIAL  Indeks Pemberdayaan Gender (IPG) - [m_38_idg]
    Route::get('/ipgg', [SosialIpggAdminController::class, 'ipggIndex'])->name('sosial-ipgg.index'); 
    Route::post('/ppu/store', [SosialPpuAdminController::class, 'ppuStore'])->name('sosial-ppu.store');
    Route::get('/ppu/{id}/edit', [SosialPpuAdminController::class, 'ppuEdit'])->name('sosial-ppu.edit');
    Route::put('/ppu/{id}', [SosialPpuAdminController::class, 'ppuUpdate'])->name('sosial-ppu.update');        




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

    //EKONOMI  Distribusi PDRB Atas Dasar Harga Konstan (ADHK) - [m_19_pdrb_konstan]
    Route::get('/adhk', [EkonomiAdhkAdminController::class, 'adhkIndex'])->name('ekonomi-adhk.index');  
    Route::post('/adhk/store', [EkonomiAdhkAdminController::class, 'adhkStore'])->name('ekonomi-adhk.store');
    Route::get('/adhk/{id}/edit', [EkonomiAdhkAdminController::class, 'adhkEdit'])->name('ekonomi-adhk.edit');
    Route::put('/adhk/{id}', [EkonomiAdhkAdminController::class, 'adhkUpdate'])->name('ekonomi-adhk.update');         

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
    Route::get('/iu', [ManajemenUserController::class, 'iuIndex'])
    ->middleware(['role:superadmin'])
    ->name('user-iu.index'); 

  }
);
