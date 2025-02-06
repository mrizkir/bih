<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APISosialController extends Controller {  
  //SOSIAL presentasi penduduk miskin (ppm) - [m_1_pres_pend_miskin]
	public function ppmIndex(Request $request)
	{
    $data = \DB::table('m_1_pres_pend_miskin AS A')
    ->select(\DB::raw('
      tahun,
      presentase,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_1_pres_pend_miskin AS A')
    ->select(\DB::raw('      
      tahun,
      presentase,
      B.jenis_data AS status_data
    '))       
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL presentasi penduduk miskin (ppm) - [m_1_pres_pend_miskin] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //SOSIAL Indeks Pembangunan Manusia (IPM)  - [m_2_ipm]
  public function ipmIndex(Request $request)
	{
    $data = \DB::table('m_2_ipm AS A')
    ->select(\DB::raw('
      tahun,
      ipm,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_2_ipm AS A')
    ->select(\DB::raw('      
      tahun,
      ipm,
      B.jenis_data AS status_data
    '))       
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Indeks Pembangunan Manusia (IPM)  - [m_2_ipm] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //SOSIAL Angka Rata-Rata Lama Sekolah (RLS) - [m_3_rls]
  public function rlsIndex(Request $request)
	{
    $data = \DB::table('m_3_rls AS A')
    ->select(\DB::raw('
      tahun,
      rls,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_3_rls AS A')
    ->select(\DB::raw('      
      tahun,
      rls,
      B.jenis_data AS status_data
    '))       
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka Rata-Rata Lama Sekolah (RLS) - [m_3_rls] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //SOSIAL Angka Melek Huruf (AMH) - [m_4_amh]
  public function amhIndex(Request $request)
	{
    $data = \DB::table('m_4_amh AS A')
    ->select(\DB::raw('      
      kel_umur,
      laki,
      perempuan,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('kel_umur', 'asc')
    ->get();

    $last_data = \DB::table('m_4_amh AS A')
    ->select(\DB::raw('      
      kel_umur,
      laki,
      perempuan,
      B.jenis_data AS status_data
    '))       
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('kel_umur', 'asc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka Melek Huruf (AMH) - [m_4_amh] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //SOSIAL Angka Harapan Hidup (AHH) - [m_5_ahh]
  public function ahhIndex(Request $request)
	{
    $data = \DB::table('m_5_ahh AS A')
    ->select(\DB::raw('      
      tahun,
      ahh,      
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_5_ahh AS A')
    ->select(\DB::raw('      
      tahun,
      ahh,      
      B.jenis_data AS status_data
    '))       
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka Harapan Hidup (AHH) - [m_5_ahh] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //SOSIAL Angka Kelangsungan Hidup Bayi (AKHB) - [m_6_akhb]
  public function akhbIndex(Request $request)
	{
    $data = \DB::table('m_6_akhb AS A')
    ->select(\DB::raw('      
      tahun,
      pres_akhb,      
      B.jenis_data AS status_data
    '))   
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id') 
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_6_akhb AS A')
    ->select(\DB::raw('      
      tahun,
      pres_akhb,      
      B.jenis_data AS status_data
    '))       
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka Kelangsungan Hidup Bayi (AKHB) - [m_6_akhb] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //SOSIAL Angka kematian ibu melahirkan (AKIM) - [m_7_kematian_ibu]
  public function akimIndex(Request $request)
	{
    $data = \DB::table('m_7_kematian_ibu AS A')
    ->select(\DB::raw('      
      tahun,
      kematian_ibu,      
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_7_kematian_ibu AS A')
    ->select(\DB::raw('      
      tahun,
      kematian_ibu,      
      B.jenis_data AS status_data
    '))       
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka kematian ibu melahirkan (AKIM) - [m_7_kematian_ibu] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //SOSIAL Perkembangan Kondisi Ketenagakerjaan di Kabupaten Bintan (PKK) - [m_8_tenaga_kerja]
  public function pkkIndex(Request $request)
	{
    $data = \DB::table('m_8_tenaga_kerja AS A')
    ->select(\DB::raw('      
      tahun,
      penduduk_usia_kerja,      
      angkatan_kerja,      
      bekerja,      
      mencari_pekerjaan,      
      tingkat_partisipasi,      
      tingkat_pengangguran,      
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_8_tenaga_kerja AS A')
    ->select(\DB::raw('      
      tahun,
      penduduk_usia_kerja,      
      angkatan_kerja,      
      bekerja,      
      mencari_pekerjaan,      
      tingkat_partisipasi,      
      tingkat_pengangguran,      
      B.jenis_data AS status_data
    '))       
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Perkembangan Kondisi Ketenagakerjaan di Kabupaten Bintan (PKK) - [m_8_tenaga_kerja] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //SOSIAL Indeks Pembangunan Gender (IPG) - [m_9_ipg]
  public function ipgIndex(Request $request)
	{
    $data = \DB::table('m_9_ipg AS A')
    ->select(\DB::raw('      
      tahun,
      laki,      
      perempuan,      
      total,      
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();
    
    $last_data = \DB::table('m_9_ipg AS A')
    ->select(\DB::raw('      
      tahun,
      laki,      
      perempuan,      
      total,      
      B.jenis_data AS status_data
    '))       
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Indeks Pembangunan Gender (IPG) - [m_9_ipg] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //SOSIAL Angka Partisipasi Kasar (APK) - [m_10_apk]
  public function apkIndex(Request $request)
	{
    $data = \DB::table('m_10_apk AS A')
    ->select(\DB::raw('      
      tingkat,
      tahun,
      apk,      
      no,      
      B.jenis_data AS status_data
    '))   
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id') 
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_10_apk AS A')
    ->select(\DB::raw('      
      tingkat,
      tahun,
      apk,      
      no,      
      B.jenis_data AS status_data
    '))       
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka Partisipasi Kasar (APK) - [m_10_apk] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //SOSIAL Angka partisipasi Murni (APM) - [m_11_apm]
  public function apmIndex(Request $request)
	{
    $data = \DB::table('m_11_apm AS A')
    ->select(\DB::raw('      
      tingkat,
      tahun,
      apm,  
      no,    
      B.jenis_data AS status_data
    '))  
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')  
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_11_apm AS A')
    ->select(\DB::raw('      
      tingkat,
      tahun,
      apm,  
      no,    
      B.jenis_data AS status_data
    '))  
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka partisipasi Murni (APM) - [m_11_apm] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //SOSIAL Angka Harapan Lama Sekolah (HLS) - [m_12_hls]
  public function hlsIndex(Request $request)
	{
    $data = \DB::table('m_12_hls AS A')
    ->select(\DB::raw('      
      tahun,
      hls,      
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_12_hls AS A')
    ->select(\DB::raw('      
      tahun,
      hls,      
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka Kelangsungan Hidup Bayi (AKHB) - [m_6_akhb] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //SOSIAL Jumlah Rumah Tidak Layak Huni Yang Direhab (JRTLH) - [m_13_rtlh]
  public function jrtlhIndex(Request $request)
	{
    $data = \DB::table('m_13_rtlh AS A')
    ->select(\DB::raw('      
      tahun,
      jumlah_unit,      
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_13_rtlh AS A')
    ->select(\DB::raw('      
      tahun,
      jumlah_unit,      
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Jumlah Rumah Tidak Layak Huni Yang Direhab (JRTLH) - [m_13_rtlh] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //SOSIAL Indeks Gini (IG) - [m_14_gini]
  public function igIndex(Request $request)
	{
    $data = \DB::table('m_14_gini AS A')
    ->select(\DB::raw('      
      tahun,
      gini_ratio,      
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_14_gini AS A')
    ->select(\DB::raw('      
      tahun,
      gini_ratio,      
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'//SOSIAL Indeks Gini (IG) - [m_14_gini] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //SOSIAL Indeks Daya Beli - Purchasing Power Parity (IDB) - [m_15_idb]
  public function idbIndex(Request $request)
	{
    $data = \DB::table('m_15_idb AS A')
    ->select(\DB::raw('      
      tahun,
      daya_beli,      
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_15_idb AS A')
    ->select(\DB::raw('      
      tahun,
      daya_beli,      
      B.jenis_data AS status_data
    '))
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Indeks Daya Beli - Purchasing Power Parity (IDB) - [m_15_idb] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //SOSIAL Persentase Penduduk Usia 15 Tahun ke atas menurut Pendidikan yang Ditamatkan (PPU) - [m_16_lulusan_pendidikan]
  public function ppuIndex(Request $request)
	{
    $data = \DB::table('m_16_lulusan_pendidikan AS A')
    ->select(\DB::raw('      
      no,
      pendidikan,      
      laki,      
      perempuan,      
      total,      
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('no', 'asc')
    ->get();

    $last_data = \DB::table('m_16_lulusan_pendidikan AS A')
    ->select(\DB::raw('      
      no,
      pendidikan,      
      laki,      
      perempuan,      
      total,      
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('no', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'SOSIAL Angka Kelangsungan Hidup Bayi (AKHB) - [m_6_akhb] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  // SOSIAL  Indeks Pemberdayaan Gender (IPG) - [m_38_idg]
  public function ipggIndex(Request $request)
	{
    $data = \DB::table('m_38_idg AS A')
    ->select(\DB::raw('      
      tahun,
      idg,      
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_38_idg AS A')
    ->select(\DB::raw('      
      tahun,
      idg,      
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();
    
    return response()->json([
      'status'=>'100',
      'message'=>'// SOSIAL  Indeks Pemberdayaan Gender (IPG) - [m_38_idg] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
}