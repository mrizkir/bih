<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DataSosialModel;

class SosialAdminController extends Controller
{
  public function ppmIndex()
  {
    $data = DataSosialModel::orderBy('tahun', 'desc')->get();
    return view('admin.sosial.ppm_tampil', [
      'title' => 'Persentase Penduduk Miskin (PPM)',
      'data' => $data
    ]);
  }
}
