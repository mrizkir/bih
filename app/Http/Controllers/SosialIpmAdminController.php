<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialIpmAdminController extends Controller
{
    public function ipmIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.2ipm_tampil', [
        'title' => 'Indeks Pembangunan Manusia (IPM)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
