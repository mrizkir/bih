<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialRlsAdminController extends Controller
{ 
    public function rlsIndex()
    {
      $data = \DB::table('m_3_rls')
      ->select(\DB::raw('
        tahun,
        rls,
        status_data
      '))    
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.sosial.3rls_tampil', [
        'title' => 'Angka Rata-Rata Lama Sekolah (RLS)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-sosial',
        'sub_menu_active' => 'none',
        'page_active' => 'sosial-rls',
        'data' => $data
      ]);
    }
    public function rlsStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'rls' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_3_rls')->insert([
      'tahun' => $request->input('tahun'),
      'rls' => $request->input('rls'),      
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-rls.index'))->with('success', 'data berhasil disimpan');
  }
  public function rlsUpdate(Request $request, $id)
  {
    $data = \DB::table('m_3_rls')
    ->where('tahun', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('sosial-rls.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'rls' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_3_rls')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'rls' => $request->input('rls'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-rls.index'))->with('success', 'data berhasil diubah');
    }    
  }
    public function rlsDel($id)
    {
      $data = \DB::table('m_3_rls')->where('tahun', $id);

        $data->delete();
        return redirect(route('sosial-rls.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
