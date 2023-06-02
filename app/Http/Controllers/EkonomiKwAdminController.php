<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class EkonomiKwAdminController extends Controller
{
    public function kwIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.5kw_tampil', [
        'title' => 'Kunjungan Wisata (KW)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
