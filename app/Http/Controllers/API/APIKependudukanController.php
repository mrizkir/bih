<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIKependudukanController extends Controller {  
  //KEPENDUDUKAN Jumlah Penduduk (JP) - [m_36_jumlah_penduduk]
	public function jpIndex(Request $request)
	{
    $data = \DB::table('m_36_jumlah_penduduk')
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
      'message'=>'KEPENDUDUKAN Jumlah Penduduk (JP) - [m_36_jumlah_penduduk]',
      'result'=>$data
    ], 200);
  }
  //KEPENDUDUKAN Jumlah Penduduk Berdasarkan Kecamatan Tahun 2021 (JPBK) - [m_26_penduduk_kecamatan]
	public function jpbkIndex(Request $request)
	{
    $data = \DB::table('m_26_penduduk_kecamatan')
    ->select(\DB::raw('
      id,
      kecamatan,
      laki,
      perempuan,
      sex_ratio,
      status_data
    '))    
    ->orderBy('kecamatan', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'KEPENDUDUKAN Jumlah Penduduk Berdasarkan Kecamatan Tahun 2021 (JPBK) - [m_26_penduduk_kecamatan]',
      'result'=>$data
    ], 200);
  }
  //KEPENDUDUKAN  Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU) - [m_26_penduduk_umur]
	public function jpbkuIndex(Request $request)
	{
    $data = \DB::table('m_26_penduduk_umur')
    ->select(\DB::raw('
      tahun,
      kelompok_umur,
      jumlah,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'KEPENDUDUKAN  Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU) - [m_26_penduduk_umur]',
      'result'=>$data
    ], 200);
  }
  //KEPENDUDUKAN  Pertumbuhan Penduduk (PP) - [m_27_laju_pertumbuhan]
	public function ppIndex(Request $request)
	{
    $data = \DB::table('m_27_laju_pertumbuhan')
    ->select(\DB::raw('
      tahun,
      laju,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'KEPENDUDUKAN  Pertumbuhan Penduduk (PP) - [m_27_laju_pertumbuhan]',
      'result'=>$data
    ], 200);
  }  
}