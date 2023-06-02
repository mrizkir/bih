<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class KependudukanJpAdminController extends Controller
{
    public function jpIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.kependudukan.1jp_tampil', [
        'title' => 'Jumlah Penduduk (JP)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
