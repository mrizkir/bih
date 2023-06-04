<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class EkonomiPeAdminController extends Controller
{ 
    public function peIndex()
    { 
      $data = \DB::table('m_17_ekonomi')
      ->select(\DB::raw('
        tahun, 
        pertumbuhan_ekonomi,
        status_data
      '))     
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.ekonomi.1pe_tampil', [
        'title' => 'Petumbuhan Ekonomi (PE)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'none',
        'page_active' => 'ekonomi-pe',
        'data' => $data
      ]);
    }

    public function peStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'pertumbuhan_ekonomi' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]); 
  
    \DB::table('m_17_ekonomi')->insert([
      'tahun' => $request->input('tahun'),
      'pertumbuhan_ekonomi' => $request->input('pertumbuhan_ekonomi'),      
      'status_data' => $request->input('status_data'),
    ]); 
      
    return redirect(route('ekonomi-pe.index'))->with('success', 'data berhasil disimpan');
  }
  public function peUpdate(Request $request, $id)
  {
    $data = \DB::table('m_17_ekonomi')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-pe.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'pertumbuhan_ekonomi' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_17_ekonomi')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'pertumbuhan_ekonomi' => $request->input('pertumbuhan_ekonomi'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-pe.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function peDel($id)
    {
      $data = \DB::table('m_17_ekonomi')->where('tahun', $id);

        $data->delete();
        return redirect(route('ekonomi-pe.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
