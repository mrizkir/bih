<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialIpggAdminController extends Controller
{
    public function ipggIndex()
    {
      $data = \DB::table('m_38_idg')
      ->select(\DB::raw('
        tahun,
        idg,
        status_data
      '))    
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.sosial.38ipgg_tampil', [
        'title' => 'Indeks Pemeberdayaan Gender (IPGG)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-sosial',
        'sub_menu_active' => 'none',
        'page_active' => 'sosial-ipgg',
        'data' => $data
      ]);
    }
}
