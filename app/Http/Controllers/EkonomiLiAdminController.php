<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class EkonomiLiAdminController extends Controller
{
    public function liIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.2li_tampil', [
        'title' => 'Laju Inflasi (LI)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'none',
        'page_active' => 'ekonomi-li',
        'data' => $data
      ]);
    }
}
