<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class PertanianCpkhAdminController extends Controller
{
    public function cpkhIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.pertanian.4cpkh_tampil', [
        'title' => 'Capaian Produksi Komoditi Hortikultura (CPKH)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-pertanian',
        'sub_menu_active' => 'none',
        'page_active' => 'pertanian-cpkh',
        'data' => $data
      ]);
    }
}
