<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class EkonomiAdhkAdminController extends Controller
{
    public function adhkIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.adhk_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
