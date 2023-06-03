<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialAhmAdminController extends Controller
{
    public function ahmIndex()
    {
      $data = \DB::table('m_4_amh')
      ->select(\DB::raw('
        kel_umur,
        laki,
        perempuan,
        status_data
      '))    
      ->orderBy('kel_umur', 'desc')
      ->get();
  
      return view('admin.sosial.4ahm_tampil', [
        'title' => 'Angka Melek Huruf (AMH)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
}
