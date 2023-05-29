<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class InfrastrukturPtkjAdminController extends Controller
{
    public function ptkjIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.infrastruktur.ptkj_tampil', [
        'title' => 'Persentase Tingkat Kemantapan Jalan (PTKJ)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
