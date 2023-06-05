<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialAhhAdminController extends Controller
{ 
    public function ahhIndex()
    {
      $data = \DB::table('m_5_ahh')
      ->select(\DB::raw('
        tahun,
        ahh,
        status_data
      '))    
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.sosial.5ahh_tampil', [
        'title' => 'Angka Harapan Hidup (AHH)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-sosial',
        'sub_menu_active' => 'none',
        'page_active' => 'sosial-ahh',
        'data' => $data
      ]);
    }
 
    public function ahhStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'ahh' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_5_ahh')->insert([
      'tahun' => $request->input('tahun'),
      'ahh' => $request->input('ahh'),      
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-ahh.index'))->with('success', 'data berhasil disimpan');
  }
  public function ahhUpdate(Request $request, $id)
  {
    $data = \DB::table('m_5_ahh')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('sosial-ahh.index'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'ahh' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_5_ahh')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'ahh' => $request->input('ahh'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-ahh.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function ahhDel($id)
    {
      $data = \DB::table('m_5_ahh')->where('tahun', $id);

        $data->delete();
        return redirect(route('sosial-ahh.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
