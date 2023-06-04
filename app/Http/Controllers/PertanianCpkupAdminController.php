<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class PertanianCpkupAdminController extends Controller
{
    public function cpkupIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.pertanian.3cpkup_tampil', [
        'title' => 'Capaian Produksi Komoditi Unggulan Perkebunan (CPKUP)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-pertanian',
        'sub_menu_active' => 'none',
        'page_active' => 'pertanian-cpkup',
        'data' => $data
      ]);
    }
}
