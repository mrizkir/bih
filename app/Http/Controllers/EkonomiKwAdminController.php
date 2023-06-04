<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class EkonomiKwAdminController extends Controller
{
    public function kwIndex()
    {
      $data = \DB::table('m_20_kunjungan')
      ->select(\DB::raw('
        tahun, 
        mancanegara,
        nusantara,
        jumlah,
        status_data
      '))     
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.ekonomi.5kw_tampil', [
        'title' => 'Kunjungan Wisata (KW)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'none',
        'page_active' => 'ekonomi-adhk-kw',
        'data' => $data
      ]);
    }

    public function kwStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'mancanegara' => 'required|numeric|min:0|max:100',
      'nusantara' => 'required|numeric|min:0|max:100',
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]); 
  
    \DB::table('m_20_kunjungan')->insert([
      'tahun' => $request->input('tahun'),
      'mancanegara' => $request->input('mancanegara'), 
      'nusantara' => $request->input('nusantara'), 
      'jumlah' => $request->input('jumlah'),      
      'status_data' => $request->input('status_data'),
    ]); 
      
    return redirect(route('ekonomi-kw.index'))->with('success', 'data berhasil disimpan');
  }
  public function kwUpdate(Request $request, $id)
  {
    $data = \DB::table('m_20_kunjungan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-kw.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'mancanegara' => 'required|numeric|min:0|max:100',
      'nusantara' => 'required|numeric|min:0|max:100',
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_20_kunjungan')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'mancanegara' => $request->input('mancanegara'), 
        'nusantara' => $request->input('nusantara'), 
        'jumlah' => $request->input('jumlah'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-kw.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function kwDel($id)
    {
      $data = \DB::table('m_20_kunjungan')->where('tahun', $id);

        $data->delete();
        return redirect(route('ekonomi-kw.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
