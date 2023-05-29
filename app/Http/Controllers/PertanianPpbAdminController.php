<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class PertanianPpbAdminController extends Controller
{
    public function ppbIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.pertanian.ppb_tampil', [
        'title' => 'Produksi Perikanan Budidaya (PPB)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
