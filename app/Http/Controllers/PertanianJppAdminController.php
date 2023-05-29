<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class PertanianJppAdminController extends Controller
{
    public function jppIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.pertanian.jpp_tampil', [
        'title' => 'Jumlah Produksi Peternakan (JPP)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
