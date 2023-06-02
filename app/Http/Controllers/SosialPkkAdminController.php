<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialPkkAdminController extends Controller
{
    public function pkkIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.8pkk_tampil', [
        'title' => 'Perkembangan Kondisi Ketenagakerjaan di Kabupaten Bintan (PKK)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
