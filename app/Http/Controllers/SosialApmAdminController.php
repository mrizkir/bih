<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialApmAdminController extends Controller
{
    public function apmIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.11apm_tampil', [
        'title' => 'Angka partisipasi Murni (APM)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
    public function apm_SD()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.sosial_apm_SD_tampil', [
        'title' => 'Angka partisipasi Murni (APM)',
        'sumber' => 'SD 7-12 Tahun',
        'data' => $data
      ]);
    }
    public function apm_SMP()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.sosial_apm_SMP_tampil', [
        'title' => 'Angka partisipasi Murni (APM)',
        'sumber' => 'SMP 13-15 Tahun',
        'data' => $data
      ]);
    }
    public function apm_SMA()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.sosial_apm_SMA_tampil', [
        'title' => 'Angka partisipasi Murni (APM)',
        'sumber' => 'SMA 16-18 Tahun',
        'data' => $data
      ]);
    }
}
