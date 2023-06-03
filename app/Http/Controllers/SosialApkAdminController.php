<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialApkAdminController extends Controller
{
    public function apkIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.10apk_tampil', [
        'title' => 'Angka Partisipasi Kasar (APK)',
        'sumber' => 'SD 7-12 Tahun',
        'data' => $data
      ]);
    }
    public function apk_SD()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.sosial_apk_SD_tampil', [
        'title' => 'Angka Partisipasi Kasar (APK)',
        'sumber' => 'SD 7-12 Tahun',
        'data' => $data
      ]);
    }
    public function apk_SMP()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.sosial_apk_SMP_tampil', [
        'title' => 'Angka Partisipasi Kasar (APK)',
        'sumber' => 'SMP 13-15 Tahun',
        'data' => $data
      ]);
    }
    public function apk_SMA()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.sosial_apk_SMA_tampil', [
        'title' => 'Angka Partisipasi Kasar (APK)',
        'sumber' => 'SMA 16-18 Tahun',
        'data' => $data
      ]);
    }
}
