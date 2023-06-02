<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialAhhAdminController extends Controller
{
    public function ahhIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.5ahh_tampil', [
        'title' => 'Angka Harapan Hidup (AHH)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
