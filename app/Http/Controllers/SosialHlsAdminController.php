<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialHlsAdminController extends Controller
{
    public function hlsIndex()
    {
      $data = \DB::table('m_12_hls')
      ->select(\DB::raw('
        tahun,
        hls,
        status_data
      '))    
      ->orderBy('tahun', 'desc')
      ->get();
   
      return view('admin.sosial.12hls_tampil', [
        'title' => 'Angka Harapan Lama Sekolah (HLS)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-sosial',
        'sub_menu_active' => 'none',
        'page_active' => 'sosial-hls',
        'data' => $data
      ]);
    } 

    public function hlsStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'hls' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_12_hls')->insert([
      'tahun' => $request->input('tahun'),
      'hls' => $request->input('hls'),      
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-hls.index'))->with('success', 'data berhasil disimpan');
  }
  public function hlsUpdate(Request $request, $id)
  {
    $data = \DB::table('m_12_hls')
    ->where('tahun', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('sosial-hls.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'hls' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_12_hls')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'hls' => $request->input('hls'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-hls.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function hlsDel($id)
    {
      $data = \DB::table('m_12_hls')->where('tahun', $id);

        $data->delete();
        return redirect(route('sosial-hls.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
