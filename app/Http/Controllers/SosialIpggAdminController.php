<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialIpggAdminController extends Controller
{
    public function ipggIndex()
    {
      $data = \DB::table('m_38_idg')
      ->select(\DB::raw('
        tahun,
        idg,
        status_data
      '))    
      ->orderBy('tahun', 'desc')
      ->get();
   
      return view('admin.sosial.38_pgg_tampil', [
        'title' => 'Indeks Pemeberdayaan Gender (IPGG)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-sosial',
        'sub_menu_active' => 'none',
        'page_active' => 'sosial-ipgg',
        'data' => $data
      ]);
    }

    public function ipggStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'idg' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_38_idg')->insert([
      'tahun' => $request->input('tahun'),
      'idg' => $request->input('idg'),      
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-ipgg.index'))->with('success', 'data berhasil disimpan');
  }
  public function ipggUpdate(Request $request, $id)
  {
    $data = \DB::table('m_38_idg')
    ->where('tahun', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('sosial-ipgg.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'idg' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_38_idg')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'idg' => $request->input('idg'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-ipgg.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function ipggDel($id)
    {
      $data = \DB::table('m_38_idg')->where('tahun', $id);

        $data->delete();
        return redirect(route('sosial-ipgg.index'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function ipggCetak()
  {
    $data = \DB::table('m_38_idg')
    ->select(\DB::raw('
    tahun,
    idg,
    status_data
  '))    
  ->orderBy('tahun', 'desc')
  ->get();

    return view('admin.sosial.38_pggcetak', [
      'title' => 'Indeks Pemeberdayaan Gender (IPGG)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-sosial',
      'sub_menu_active' => 'none',
      'page_active' => 'sosial-ipgg',
      'data' => $data
    ]);
  }
}
