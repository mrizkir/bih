<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIPertanianController extends Controller {  
  //PERTANAIN Produksi Perikanan Budidaya (PPB) - [m_21_perikanan_budidaya]
	public function ppbIndex(Request $request)
	{
    $data = \DB::table('m_21_perikanan_budidaya')
    ->select(\DB::raw('
      tahun,
      pertumbuhan_ekonomi,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'PERTANAIN Produksi Perikanan Budidaya (PPB) - [m_21_perikanan_budidaya]',
      'result'=>$data
    ], 200);
  }
}