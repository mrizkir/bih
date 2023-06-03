<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIPertanianController extends Controller {  
  //PERTANIAN Produksi Perikanan Budidaya (PPB) - [m_21_perikanan_budidaya]
	public function ppbIndex(Request $request)
	{
    $data = \DB::table('m_21_perikanan_budidaya')
    ->select(\DB::raw('
      tahun,
      jumlah,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'PERTANIAN Produksi Perikanan Budidaya (PPB) - [m_21_perikanan_budidaya]',
      'result'=>$data
    ], 200);
  }
  //PERTANIAN  Produksi Perikanan Tangkap(PPT) - [m_22_perikanan_tangkap]
	public function pptIndex(Request $request)
	{
    $data = \DB::table('m_22_perikanan_tangkap')
    ->select(\DB::raw('
      tahun,
      jumlah,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'PERTANIAN  Produksi Perikanan Tangkap(PPT) - [m_22_perikanan_tangkap]',
      'result'=>$data
    ], 200);
  }
  //PERTANIAN Capaian Produksi Komoditi Unggulan Perkebunan (CPKUP) - [m_23_perkebunan]
	public function cpkupIndex(Request $request)
	{
    $data = \DB::table('m_23_perkebunan')
    ->select(\DB::raw('
      tahun,
      jumlah,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'PERTANIAN Capaian Produksi Komoditi Unggulan Perkebunan (CPKUP) - [m_23_perkebunan]',
      'result'=>$data
    ], 200);
  }
  //PERTANIAN Capaian Produksi Komoditi Hortikultura (CPKH) - [m_24_holtikultura]
	public function cpkhIndex(Request $request)
	{
    $data = \DB::table('m_24_holtikultura')
    ->select(\DB::raw('
      tahun,
      jumlah,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'PERTANIAN Capaian Produksi Komoditi Hortikultura (CPKH) - [m_24_holtikultura]',
      'result'=>$data
    ], 200);
  }
  //PERTANIAN Jumlah Produksi Peternakan (JPP) - [m_25_peternakan]
	public function jppIndex(Request $request)
	{
    $data = \DB::table('m_25_peternakan')
    ->select(\DB::raw('
      tahun,
      jumlah,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'/PERTANIAN Jumlah Produksi Peternakan (JPP) - [m_25_peternakan]',
      'result'=>$data
    ], 200);
  }
}