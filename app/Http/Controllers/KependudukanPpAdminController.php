<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class KependudukanPpAdminController extends Controller
{
    public function ppIndex()
    {
      $data = \DB::table('m_27_laju_pertumbuhan')
      ->select(\DB::raw('
        tahun,
        laju,
        status_data
      '))    
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.kependudukan.4pp_tampil', [
        'title' => 'Pertumbuhan Penduduk (PP)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-pp',
        'data' => $data
      ]);
    }

    public function ppStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'laju' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_27_laju_pertumbuhan')->insert([
      'tahun' => $request->input('tahun'),
      'laju' => $request->input('laju'),      
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('kependudukan-pp.index'))->with('success', 'data berhasil disimpan');
  }
  public function ppUpdate(Request $request, $id)
  {
    $data = \DB::table('m_27_laju_pertumbuhan')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('kependudukan-pp.index'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'laju' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_27_laju_pertumbuhan')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'laju' => $request->input('laju'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('kependudukan-pp.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function ppDel($id)
    {
      $data = \DB::table('m_27_laju_pertumbuhan')->where('tahun', $id);

        $data->delete();
        return redirect(route('kependudukan-pp.index'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function ppCetak()
  {
    $data = \DB::table('m_27_laju_pertumbuhan')
    ->select(\DB::raw('
    tahun,
    laju,
    status_data
  '))    
  ->orderBy('tahun', 'desc')
  ->get();


    return view('admin.kependudukan.4ppcetak', [
      'title' => 'Pertumbuhan Penduduk (PP)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-kependudukan',
      'sub_menu_active' => 'none',
      'page_active' => 'kependudukan-pp',
      'data' => $data
    ]);
  }
}
