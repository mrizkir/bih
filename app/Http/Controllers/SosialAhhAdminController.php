<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialAhhAdminController extends Controller
{
    public function ahhIndex()
    {
      $data = \DB::table('m_5_ahh')
      ->select(\DB::raw('
        tahun,
        ahh,
        status_data
      '))    
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.sosial.5ahh_tampil', [
        'title' => 'Angka Harapan Hidup (AHH)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
