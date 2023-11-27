<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialIpmAdminController extends Controller
{
    public function ipmIndex()
    {
      $data = \DB::table('m_2_ipm')
      ->select(\DB::raw('
        tahun,
        ipm,
        status_data
      '))    
      ->orderBy('tahun', 'desc')
      ->get();
   
      return view('admin.sosial.2ipm_tampil', [
        'title' => 'Indeks Pembangunan Manusia (IPM)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-sosial',
        'sub_menu_active' => 'none',
        'page_active' => 'sosial-ipm',
        'data' => $data
      ]);
    }
    public function ipmStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'ipm' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_2_ipm')->insert([
      'tahun' => $request->input('tahun'),
      'ipm' => $request->input('ipm'),      
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-ipm.index'))->with('success', 'data berhasil disimpan');
  }
  public function ipmUpdate(Request $request, $id)
  {
    $data = \DB::table('m_2_ipm')
    ->where('tahun', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('sosial-ipm.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'ipm' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_2_ipm')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'ipm' => $request->input('ipm'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-ipm.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function ipmDel($id)
    {
      $data = \DB::table('m_2_ipm')->where('tahun', $id);

        $data->delete();
        return redirect(route('sosial-ipm.index'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function ipmCetak()
  {
    $data = \DB::table('m_2_ipm')
    ->select(\DB::raw('
      tahun,
      ipm,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return view('admin.sosial.2ipm_cetak', [
      'title' => 'Indeks Pembangunan Manusia (IPM)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-sosial',
      'sub_menu_active' => 'none',
      'page_active' => 'sosial-ipm',
      'data' => $data
    ]);
  }
}
