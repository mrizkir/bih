<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialIdbAdminController extends Controller
{
    public function idbIndex()
    {
      $data = \DB::table('m_15_idb')
      ->select(\DB::raw('
        tahun,
        daya_beli,
        status_data 
      '))    
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.sosial.15idb_tampil', [
        'title' => 'Indeks Daya Beli - Purchasing Power Parity (IDB)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-sosial',
        'sub_menu_active' => 'none',
        'page_active' => 'sosial-idb',
        'data' => $data
      ]);
    }
 
    public function idbStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'daya_beli' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_15_idb')->insert([
      'tahun' => $request->input('tahun'),
      'daya_beli' => $request->input('daya_beli'),      
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-idb.index'))->with('success', 'data berhasil disimpan');
  }
  public function idbUpdate(Request $request, $id)
  {
    $data = \DB::table('m_15_idb')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('sosial-idb.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'daya_beli' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_15_idb')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'daya_beli' => $request->input('daya_beli'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-idb.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function idbDel($id)
    {
      $data = \DB::table('m_15_idb')->where('tahun', $id);

        $data->delete();
        return redirect(route('sosial-idb.index'))->with('sukses', 'Data Sudah di Hapus');
    }
    public function idbCetak()
  {
    $data = \DB::table('m_15_idb')
    ->select(\DB::raw('
    tahun,
    daya_beli,
    status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return view('admin.sosial.15idbcetak', [
      'title' => 'Indeks Daya Beli - Purchasing Power Parity (IDB)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-sosial',
      'sub_menu_active' => 'none',
      'page_active' => 'sosial-idb',
      'data' => $data
    ]);
  }
}
