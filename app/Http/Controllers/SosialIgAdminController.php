<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialIgAdminController extends Controller
{
    public function igIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.14ig_tampil', [
        'title' => 'Indeks Gini (IG)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
