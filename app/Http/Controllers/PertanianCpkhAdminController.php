<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class PertanianCpkhAdminController extends Controller
{
    public function cpkhIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.pertanian.cpkh_tampil', [
        'title' => 'Capaian Produksi Komoditi Hortikultura (CPKH)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
