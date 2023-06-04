<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class InfrastrukturPtkjAdminController extends Controller
{
    public function ptkjIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.infrastruktur.3ptkj_tampil', [
        'title' => 'Persentase Tingkat Kemantapan Jalan (PTKJ)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-infrastruktur',
        'sub_menu_active' => 'none',
        'page_active' => 'infrastruktur-ptk',
        'data' => $data
      ]);
    }
}
