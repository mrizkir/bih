<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialIpmAdminController extends Controller
{
    public function ipmIndex()
    {
      $data = \DB::table('m_2_ipm')
      ->select(\DB::raw('
        tahun,
        ipm,
        status_data
      '))    
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.sosial.2ipm_tampil', [
        'title' => 'Persentase Penduduk Miskin (PPM)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
