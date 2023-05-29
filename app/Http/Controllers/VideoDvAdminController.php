<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class VideoDvAdminController extends Controller
{
    public function dvIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.videodv.dv_tampil', [
        'title' => 'Data Video (DV)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
