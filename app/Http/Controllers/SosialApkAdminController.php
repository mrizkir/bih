<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialApkAdminController extends Controller
{
    public function apkIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.apk_tampil', [
        'title' => 'Angka Partisipasi Kasar (APK)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
