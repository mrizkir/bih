<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialIdbAdminController extends Controller
{
    public function idbIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.15idb_tampil', [
        'title' => 'Indeks Daya Beli - Purchasing Power Parity (IDB)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
