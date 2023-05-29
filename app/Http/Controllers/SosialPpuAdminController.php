<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialPpuAdminController extends Controller
{
    public function ppuIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.ppu_tampil', [
        'title' => 'Persentase Penduduk Usia 15 Tahun ke atas menurut Pendidikan yang Ditamatkan (PPU)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
