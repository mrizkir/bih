<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialApmAdminController extends Controller
{
    public function apmIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.11apm_tampil', [
        'title' => 'Angka partisipasi Murni (APM)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
