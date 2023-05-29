<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class EkonomiPeAdminController extends Controller
{
    public function peIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.pe_tampil', [
        'title' => 'Petumbuhan Ekonomi (PE)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
