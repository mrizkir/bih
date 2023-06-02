<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APISosialController extends Controller {  
  //SOSIAL presentasi penduduk miskin (ppm) - [m_1_pres_pend_miskin]
	public function ppmIndex(Request $request)
	{
    $data = \DB::table('m_1_pres_pend_miskin')
    ->select(\DB::raw('
      tahun,
      presentase,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL presentasi penduduk miskin (ppm) - [m_1_pres_pend_miskin] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //SOSIAL Indeks Pembangunan Manusia (IPM)  - [m_2_ipm]
  public function ipmIndex(Request $request)
	{
    $data = \DB::table('m_2_ipm')
    ->select(\DB::raw('
      tahun,
      ipm,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Indeks Pembangunan Manusia (IPM)  - [m_2_ipm] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //SOSIAL Angka Rata-Rata Lama Sekolah (RLS) - [m_3_rls]
  public function rlsIndex(Request $request)
	{
    $data = \DB::table('m_3_rls')
    ->select(\DB::raw('
      tahun,
      rls,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka Rata-Rata Lama Sekolah (RLS) - [m_3_rls] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //SOSIAL Angka Melek Huruf (AMH) - [m_4_amh]
  public function amhIndex(Request $request)
	{
    $data = \DB::table('m_4_amh')
    ->select(\DB::raw('      
      kel_umur,
      laki,
      perempuan,
      status_data
    '))    
    ->orderBy('kel_umur', 'asc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka Melek Huruf (AMH) - [m_4_amh] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //SOSIAL Angka Harapan Hidup (AHH) - [m_5_ahh]
  public function ahhIndex(Request $request)
	{
    $data = \DB::table('m_5_ahh')
    ->select(\DB::raw('      
      tahun,
      ahh,      
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka Harapan Hidup (AHH) - [m_5_ahh] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //SOSIAL Angka Kelangsungan Hidup Bayi (AKHB) - [m_6_akhb]
  public function akhbIndex(Request $request)
	{
    $data = \DB::table('m_6_akhb')
    ->select(\DB::raw('      
      tahun,
      pres_akhb,      
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka Kelangsungan Hidup Bayi (AKHB) - [m_6_akhb] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //SOSIAL Angka kematian ibu melahirkan (AKIM) - [m_7_kematian_ibu]
  public function akimIndex(Request $request)
	{
    $data = \DB::table('m_7_kematian_ibu')
    ->select(\DB::raw('      
      tahun,
      kematian_ibu,      
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka kematian ibu melahirkan (AKIM) - [m_7_kematian_ibu] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //SOSIAL Perkembangan Kondisi Ketenagakerjaan di Kabupaten Bintan (PKK) - [m_8_tenaga_kerja]
  public function pkkIndex(Request $request)
	{
    $data = \DB::table('m_8_tenaga_kerja')
    ->select(\DB::raw('      
      tahun,
      penduduk_usia_kerja,      
      angkatan_kerja,      
      bekerja,      
      mencari_pekerjaan,      
      tingkat_partisipasi,      
      tingkat_pengangguran,      
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Perkembangan Kondisi Ketenagakerjaan di Kabupaten Bintan (PKK) - [m_8_tenaga_kerja] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //SOSIAL Indeks Pembangunan Gender (IPG) - [m_9_ipg]
  public function ipgIndex(Request $request)
	{
    $data = \DB::table('m_9_ipg')
    ->select(\DB::raw('      
      tahun,
      laki,      
      perempuan,      
      total,      
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Indeks Pembangunan Gender (IPG) - [m_9_ipg] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //SOSIAL Angka Partisipasi Kasar (APK) - [m_10_apk]
  public function apkIndex(Request $request)
	{
    $data = \DB::table('m_10_apk')
    ->select(\DB::raw('      
      tingkat,
      tahun,
      apk,      
      no,      
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka Partisipasi Kasar (APK) - [m_10_apk] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //SOSIAL Angka partisipasi Murni (APM) - [m_11_apm]
  public function apmIndex(Request $request)
	{
    $data = \DB::table('m_11_apm')
    ->select(\DB::raw('      
      tahun,
      apm,      
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka partisipasi Murni (APM) - [m_11_apm] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //SOSIAL Angka Harapan Lama Sekolah (HLS) - [m_12_hls]
  public function hlsIndex(Request $request)
	{
    $data = \DB::table('m_12_hls')
    ->select(\DB::raw('      
      tahun,
      hls,      
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka Kelangsungan Hidup Bayi (AKHB) - [m_6_akhb] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //SOSIAL Jumlah Rumah Tidak Layak Huni Yang Direhab (JRTLH) - [m_13_rtlh]
  public function jrtlhIndex(Request $request)
	{
    $data = \DB::table('m_13_rtlh')
    ->select(\DB::raw('      
      tahun,
      jumlah_unit,      
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Jumlah Rumah Tidak Layak Huni Yang Direhab (JRTLH) - [m_13_rtlh] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //SOSIAL Indeks Gini (IG) - [m_14_gini]
  public function igIndex(Request $request)
	{
    $data = \DB::table('m_14_gini')
    ->select(\DB::raw('      
      tahun,
      gini_ratio,      
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'//SOSIAL Indeks Gini (IG) - [m_14_gini] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //SOSIAL Indeks Daya Beli - Purchasing Power Parity (IDB) - [m_15_idb]
  public function idbIndex(Request $request)
	{
    $data = \DB::table('m_15_idb')
    ->select(\DB::raw('      
      tahun,
      daya_beli,      
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Indeks Daya Beli - Purchasing Power Parity (IDB) - [m_15_idb] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //SOSIAL Persentase Penduduk Usia 15 Tahun ke atas menurut Pendidikan yang Ditamatkan (PPU) - [m_16_lulusan_pendidikan]
  public function ppuIndex(Request $request)
	{
    $data = \DB::table('m_16_lulusan_pendidikan')
    ->select(\DB::raw('      
      no,
      pendidikan,      
      laki,      
      perempuan,      
      total,      
      status_data
    '))    
    ->orderBy('no', 'asc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka Kelangsungan Hidup Bayi (AKHB) - [m_6_akhb] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  // SOSIAL  Indeks Pemberdayaan Gender (IPG) - [m_38_idg]
  public function ipggIndex(Request $request)
	{
    $data = \DB::table('m_38_idg')
    ->select(\DB::raw('      
      tahun,
      idg,      
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'// SOSIAL  Indeks Pemberdayaan Gender (IPG) - [m_38_idg] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
}