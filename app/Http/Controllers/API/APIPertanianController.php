<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIPertanianController extends Controller {  
  //PERTANIAN Produksi Perikanan Budidaya (PPB) - [m_21_perikanan_budidaya]
	public function ppbIndex(Request $request)
	{
    $data = \DB::table('m_21_perikanan_budidaya AS A')
    ->select(\DB::raw('
      tahun,
      jumlah,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->get();

    $last_data = \DB::table('m_21_perikanan_budidaya AS A')
    ->select(\DB::raw('
      tahun,
      jumlah,
      B.jenis_data AS status_data
    '))        
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'PERTANIAN Produksi Perikanan Budidaya (PPB) - [m_21_perikanan_budidaya]',
      'last_data'=>$last_data,
      'result'=>$data
    ], 200);
  }
  //PERTANIAN  Produksi Perikanan Tangkap(PPT) - [m_22_perikanan_tangkap]
	public function pptIndex(Request $request)
	{
    $data = \DB::table('m_22_perikanan_tangkap AS A')
    ->select(\DB::raw('
      tahun,
      jumlah,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->get();

    $last_data = \DB::table('m_22_perikanan_tangkap AS A')
    ->select(\DB::raw('
      tahun,
      jumlah,
      B.jenis_data AS status_data
    '))        
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'PERTANIAN  Produksi Perikanan Tangkap(PPT) - [m_22_perikanan_tangkap]',
      'last_data'=>$last_data,
      'result'=>$data
    ], 200);
  }
  //PERTANIAN Capaian Produksi Komoditi Unggulan Perkebunan (CPKUP) - [m_23_perkebunan]
	public function cpkupIndex(Request $request)
	{
    $data = \DB::table('m_23_perkebunan AS A')
    ->select(\DB::raw('
      tahun,
      jumlah,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->get();

    $last_data = \DB::table('m_23_perkebunan AS A')
    ->select(\DB::raw('
      tahun,
      jumlah,
      B.jenis_data AS status_data
    '))        
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'PERTANIAN Capaian Produksi Komoditi Unggulan Perkebunan (CPKUP) - [m_23_perkebunan]',
      'last_data'=>$last_data,
      'result'=>$data
    ], 200);
  }
  //PERTANIAN Capaian Produksi Komoditi Hortikultura (CPKH) - [m_24_holtikultura]
	public function cpkhIndex(Request $request)
	{
    $data = \DB::table('m_24_holtikultura AS A')
    ->select(\DB::raw('
      tahun,
      jumlah,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->get();

    $last_data = \DB::table('m_24_holtikultura AS A')
    ->select(\DB::raw('
      tahun,
      jumlah,
      B.jenis_data AS status_data
    '))        
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'PERTANIAN Capaian Produksi Komoditi Hortikultura (CPKH) - [m_24_holtikultura]',
      'last_data'=>$last_data,
      'result'=>$data
    ], 200);
  }
  //PERTANIAN Jumlah Produksi Peternakan (JPP) - [m_25_peternakan]
	public function jppIndex(Request $request)
	{
    $data = \DB::table('m_25_peternakan AS A')
    ->select(\DB::raw('
      tahun,
      jumlah,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->get();

    $last_data = \DB::table('m_25_peternakan AS A')
    ->select(\DB::raw('
      tahun,
      jumlah,
      B.jenis_data AS status_data
    '))        
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'PERTANIAN Jumlah Produksi Peternakan (JPP) - [m_25_peternakan]',
      'last_data'=>$last_data,
      'result'=>$data
    ], 200);
  }
}