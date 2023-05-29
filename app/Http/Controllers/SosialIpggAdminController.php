<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialIpggAdminController extends Controller
{
    public function ipggIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.ipgg_tampil', [
        'title' => 'Indeks Pemeberdayaan Gender (IPG)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
