<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class KependudukanPpAdminController extends Controller
{
    public function ppIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.kependudukan.4pp_tampil', [
        'title' => 'Pertumbuhan Penduduk (PP)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-pp',
        'data' => $data
      ]);
    }
}
