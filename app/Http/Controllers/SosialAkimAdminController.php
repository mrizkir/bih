<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialAkimAdminController extends Controller
{
    public function akimIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.akim_tampil', [
        'title' => 'Angka Kematian Ibu Melahirkan Per 100.000 Kelahiran Hidup',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
