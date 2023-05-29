<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class PertanianCpkupAdminController extends Controller
{
    public function cpkupIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.pertanian.cpkup_tampil', [
        'title' => 'Capaian Produksi Komoditi Unggulan Perkebunan (CPKUP)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
