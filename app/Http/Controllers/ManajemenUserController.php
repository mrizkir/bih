<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class ManajemenUserController extends Controller
{
    public function iuIndex()
    {
        $data = DataSosialModel::orderBy('tahun', 'desc')->get();

      return view('admin.manajemen.user_tampil', [
        'title' => 'Manajemen User', 
        'sumber' => 'Admin',   
        'data' => $data
      ]);
    }
}
