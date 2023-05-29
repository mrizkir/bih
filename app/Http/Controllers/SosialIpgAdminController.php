<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialIpgAdminController extends Controller
{
    public function ipgIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.ipg_tampil', [
        'title' => 'Indeks Pembangunan Gender (IPG)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
