<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class InfrastrukturPjddAdminController extends Controller
{
    public function pjddIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.infrastruktur.pjdd_tampil', [
        'title' => 'Panjang Jalan Yang Dibangun dan Ditingkatkan (PJDD)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
