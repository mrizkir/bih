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

    return view('admin.sosial.1ppm_tampil', [
      'title' => 'Persentase Penduduk Miskin (PPM)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-sosial',
      'sub_menu_active' => 'none',
      'page_active' => 'sosial-ppm',
      'data' => $data
    ]);
  }
  public function ppmStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'presentase' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);

    \DB::table('m_1_pres_pend_miskin')->insert([
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
        'presentase' => 'required|numeric|min:0',
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
  public function ppmDel($id)
    {
      $data = \DB::table('m_1_pres_pend_miskin')->where('tahun', $id);
        $data->delete();
        return redirect(route('sosial-ppm.index'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function ppmCetak()
  {
    $data = \DB::table('m_1_pres_pend_miskin')
    ->select(\DB::raw('
      tahun,
      presentase,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return view('admin.sosial.2ppm_cetak', [
      'title' => 'Persentase Penduduk Miskin (PPM)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-sosial',
      'sub_menu_active' => 'none',
      'page_active' => 'sosial-ppm',
      'data' => $data
    ]);
  }
}
