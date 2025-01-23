<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIInfrastrukturController extends Controller {  
  //INFRASTRUKTUR Panjang Jalan Yang Dibangun dan Ditingkatkan (PJDD) - [m_28_jalan]
	public function pjddIndex(Request $request)
	{
    $data = \DB::table('m_28_jalan AS A')
    ->select(\DB::raw('
      tahun,
      panjang,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_28_jalan AS A')        
    ->select(\DB::raw('
      tahun,
      panjang,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'INFRASTRUKTUR Panjang Jalan Yang Dibangun dan Ditingkatkan (PJDD) - [m_28_jalan]',
      'last_data'=>$last_data,
      'result'=>$data
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //INFRASTRUKTUR Persentase Rumah Tangga yang menggunakan air bersih (PRT) - [m_29_air]
	public function prtIndex(Request $request)
	{
    $data = \DB::table('m_29_air AS A')
    ->select(\DB::raw('
      tahun,
      nilai,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_29_air AS A')    
    ->select(\DB::raw('
      tahun,
      nilai,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'INFRASTRUKTUR Persentase Rumah Tangga yang menggunakan air bersih (PRT) - [m_29_air]',
      'last_data'=>$last_data,
      'result'=>$data
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //INFRASTRUKTUR  Persentase Tingkat Kemantapan Jalan (PTKJ) - [m_37_kemantapan_jalan]
	public function ptkjIndex(Request $request)
	{
    $data = \DB::table('m_37_kemantapan_jalan AS A')
    ->select(\DB::raw('
      tahun,
      kemantapan_jalan,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_37_kemantapan_jalan AS A')
    ->select(\DB::raw('      
      tahun,
      kemantapan_jalan,
      B.jenis_data AS status_data
    '))       
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'INFRASTRUKTUR  Persentase Tingkat Kemantapan Jalan (PTKJ) - [m_37_kemantapan_jalan]',
      'last_data'=>$last_data,
      'result'=>$data
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
}