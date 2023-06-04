<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class KependudukanJpbkAdminController extends Controller
{
    public function jpbkIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.kependudukan.2jpbk_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kecamatan Tahun 2021 (JPBK)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbk',
        'data' => $data
      ]);
    }
}
