<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class EkonomiPmaAdminController extends Controller
{
    public function pmaIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.6pma_tampil', [
        'title' => 'Realisasi Investasi (PMA/ PMDN)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'none',
        'page_active' => 'ekonomi-adhk-pma',
        'data' => $data
      ]);
    }
}
