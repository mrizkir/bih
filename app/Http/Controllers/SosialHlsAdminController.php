<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialHlsAdminController extends Controller
{
    public function hlsIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.12hls_tampil', [
        'title' => 'Angka Harapan Lama Sekolah (HLS)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
