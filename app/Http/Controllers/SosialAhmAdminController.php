<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialAhmAdminController extends Controller
{
    public function ahmIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.4ahm_tampil', [
        'title' => 'Angka Melek Huruf (AMH)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
