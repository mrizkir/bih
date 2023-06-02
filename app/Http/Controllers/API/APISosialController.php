<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APISosialController extends Controller {  

	public function ppmIndex(Request $request)
	{
    $data = $data = \DB::table('m_1_pres_pend_miskin')
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
}