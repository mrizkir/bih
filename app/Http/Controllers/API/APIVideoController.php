<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIVideoController extends Controller {  
  //video - [m_video]
	public function videoIndex(Request $request)
	{
    $data = \DB::table('m_video')
    ->select(\DB::raw('
      id,
      judul,
      link
    '))     
    ->orderBy('id', 'desc')
    ->get();
    
    return response()->json([
      'status'=>'100',
      'message'=>'video profil bintan - [m_video]',   
      'result'=>$data
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }    
}