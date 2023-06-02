<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DataSosialModel;

class SosialAdminController extends Controller
{
  public function ppmIndex()
  {
    $data = \DB::table('m_1_pres_pend_miskin')
    ->select(\DB::raw('
      tahun,
      presentase,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return view('admin.sosial.ppm_tampil', [
      'title' => 'Persentase Penduduk Miskin (PPM)',
      'sumber' => 'BPS',
      'data' => $data
    ]);
  }
  public function ppmStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'presentase' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);

    \DB::table('m_1_pres_pend_miskin')
    ->insert([
      'tahun' => $request->input('tahun'),
      'presentase' => $request->input('presentase'),      
      'status_data' => $request->input('status_data'),
    ]);

    return redirect(route('sosial-ppm.index'))->with('success', 'data berhasil disimpan');
  }
  public function ppmUpdate(Request $request, $id)
  {
    $data = \DB::table('m_1_pres_pend_miskin')
    ->where('tahun', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('sosial-ppm.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'presentase' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_1_pres_pend_miskin')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'presentase' => $request->input('presentase'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-ppm.index'))->with('success', 'data berhasil diubah');
    }    
  }
}
