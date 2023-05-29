<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class EkonomiPmaAdminController extends Controller
{
    public function pmaIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.pma_tampil', [
        'title' => 'Realisasi Investasi (PMA/ PMDN)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
