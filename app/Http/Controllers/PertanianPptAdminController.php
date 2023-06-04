<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class PertanianPptAdminController extends Controller
{
    public function pptIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.pertanian.2ppt_tampil', [
        'title' => 'Produksi Perikanan Tangkap(PPT)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-pertanian',
        'sub_menu_active' => 'none',
        'page_active' => 'pertanian-ppt',
        'data' => $data
      ]);
    }
}
