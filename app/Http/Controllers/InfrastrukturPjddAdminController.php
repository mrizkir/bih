<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class InfrastrukturPjddAdminController extends Controller
{
    public function pjddIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.infrastruktur.1pjdd_tampil', [
        'title' => 'Panjang Jalan Yang Dibangun dan Ditingkatkan (PJDD)',
        'menu_active' => 'menu-infrastruktur',
        'sub_menu_active' => 'none',
        'page_active' => 'infrastruktur-pjdd',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
