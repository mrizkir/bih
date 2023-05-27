<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
class SosialAdminController extends Controller
{
    public function ppm()
    {
        return view('admin.sosial.ppm_tampil', ['title' => 'Persentase Penduduk Miskin (PPM)']);
    }
}
