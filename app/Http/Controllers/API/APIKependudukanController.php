<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIKependudukanController extends Controller {  
  //KEPENDUDUKAN Jumlah Penduduk (JP) - [m_36_jumlah_penduduk]
	public function jpIndex(Request $request)
	{
    $data = \DB::table('m_36_jumlah_penduduk AS A')
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

    $last_data = \DB::table('m_36_jumlah_penduduk AS A')    
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
      'message'=>'KEPENDUDUKAN Jumlah Penduduk (JP) - [m_36_jumlah_penduduk]',
      'last_data'=>$last_data,
      'result'=>$data
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //KEPENDUDUKAN Jumlah Penduduk Berdasarkan Kecamatan Tahun 2021 (JPBK) - [m_26_penduduk_kecamatan]
	public function jpbkIndex(Request $request)
	{
    $data = \DB::table('m_26_penduduk_kecamatan AS A')
    ->select(\DB::raw('
      A.id,
      A.kecamatan,
      A.laki,
      A.perempuan,
      A.tahun,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    // $last_data = \DB::table('m_26_penduduk_kecamatan AS A')    
    // ->select(\DB::raw('
    //   A.id,
    //   A.kecamatan,
    //   A.laki,
    //   A.perempuan,
    //   A.sex_ratio,
    //   B.jenis_data AS status_data
    // '))
    // ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    // ->orderBy('id', 'desc')
    // ->limit(1)
    // ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'KEPENDUDUKAN Jumlah Penduduk Berdasarkan Kecamatan(JPBK) - [m_26_penduduk_kecamatan]',
      'last_data'=>[],
      'result'=>$data
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //KEPENDUDUKAN  Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU) - [m_26_penduduk_umur]
	public function jpbkuIndex(Request $request)
	{
    $data = \DB::table('m_26_penduduk_umur AS A')
    ->select(\DB::raw('
      A.tahun,
      A.kelompok_umur,
      A.jumlah,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->orderBy('kelompok_umur', 'asc')
    ->get();

    $last_data = \DB::table('m_26_penduduk_umur AS A')    
    ->select(\DB::raw('
      tahun,
      kelompok_umur,
      jumlah,
      B.jenis_data AS status_data
    ')) 
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->orderBy('kelompok_umur', 'asc')
    ->limit(1)
    ->get();
    
    return response()->json([
      'status'=>'100',
      'message'=>'KEPENDUDUKAN  Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU) - [m_26_penduduk_umur]',
      'last_data'=>[],
      'result'=>$data
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //KEPENDUDUKAN  Pertumbuhan Penduduk (PP) - [m_27_laju_pertumbuhan]
	public function ppIndex(Request $request)
	{
    $data = \DB::table('m_27_laju_pertumbuhan AS A')
    ->select(\DB::raw('
      tahun,
      laju,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_27_laju_pertumbuhan AS A')    
    ->select(\DB::raw('
      tahun,
      laju,
      B.jenis_data AS status_data
    '))  
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'KEPENDUDUKAN  Pertumbuhan Penduduk (PP) - [m_27_laju_pertumbuhan]',
      'last_data'=>$last_data,
      'result'=>$data
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }  
}