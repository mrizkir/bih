<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class KependudukanJpbkuAdminController extends Controller
{
    public function jpbkuIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.kependudukan.3jpbku_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
