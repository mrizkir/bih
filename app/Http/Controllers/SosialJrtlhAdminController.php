<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialJrtlhAdminController extends Controller
{
    public function jrtlhIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.13jrtlh_tampil', [
        'title' => 'Jumlah Rumah Tidak Layak Huni Yang Direhab (JRTLH)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
