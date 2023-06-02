<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class EkonomiAdhbAdminController extends Controller
{
    public function adhbIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.3adhb_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
