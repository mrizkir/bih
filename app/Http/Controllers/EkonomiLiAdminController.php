<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class EkonomiLiAdminController extends Controller
{
    public function liIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.li_tampil', [
        'title' => 'Laju Inflasi (LI)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
