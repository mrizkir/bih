<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialRlsAdminController extends Controller
{
    public function rlsIndex()
    {
      $data = \DB::table('m_3_rls')
      ->select(\DB::raw('
        tahun,
        rls,
        status_data
      '))    
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.sosial.3rls_tampil', [
        'title' => 'Angka Rata-Rata Lama Sekolah (RLS)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
