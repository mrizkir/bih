<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class InfrastrukturRasioKonektifitasAdminController extends Controller
{ 
  public function rasioIndex()
  {
    $data = \DB::table('m_28_jalan')
    ->select(\DB::raw('
      tahun, 
      panjang,
      status_data
    '))     
    ->orderBy('tahun', 'desc')
    ->get();
  
    return view('admin.infrastruktur.rasio_tampil', [
      'title' => 'Rasio Konektifitas',
      'menu_active' => 'menu-infrastruktur',
      'sub_menu_active' => 'none',
      'page_active' => 'infrastruktur-rasio',
      'sumber' => 'BPS',
      'data' => $data
    ]);
  }

  public function rasioStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'panjang' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_28_jalan')->insert([
      'tahun' => $request->input('tahun'),
      'panjang' => $request->input('panjang'),      
      'status_data' => $request->input('status_data'),
    ]); 
      
    return redirect(route('infrastruktur-rasio.index'))->with('success', 'data berhasil disimpan');
  }
  public function rasioUpdate(Request $request, $id)
  {
    $data = \DB::table('m_28_jalan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('infrastruktur-rasio.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'panjang' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_28_jalan')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'panjang' => $request->input('panjang'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('infrastruktur-rasio.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function rasioDel($id)
  {
    $data = \DB::table('m_28_jalan')->where('tahun', $id);

      $data->delete();
      return redirect(route('infrastruktur-rasio.index'))->with('sukses', 'Data Sudah di Hapus');
  }

  public function rasioCetak()
  {
    $data = \DB::table('m_28_jalan')
    ->select(\DB::raw('
    tahun, 
    panjang, 
    status_data
  '))     
  ->orderBy('tahun', 'desc')
  ->get(); 

    return view('admin.infrastruktur.1rasiocetak', [
      'title' => 'Rasio Konektifitas',
      'menu_active' => 'menu-infrastruktur',
      'sub_menu_active' => 'none',
      'page_active' => 'infrastruktur-rasio',
      'sumber' => 'BPS',
      'data' => $data
    ]);
  }
}
