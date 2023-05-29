<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class PertanianPptAdminController extends Controller
{
    public function pptIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.pertanian.ppt_tampil', [
        'title' => 'Produksi Perikanan Tangkap(PPT)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
