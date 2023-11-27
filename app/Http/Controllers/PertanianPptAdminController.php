<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class PertanianPptAdminController extends Controller
{
    public function pptIndex()
    {
      $data = \DB::table('m_22_perikanan_tangkap')
      ->select(\DB::raw('
        tahun,
        jumlah,
        status_data
      '))     
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.pertanian.2ppt_tampil', [
        'title' => 'Produksi Perikanan Tangkap(PPT)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-pertanian',
        'sub_menu_active' => 'none',
        'page_active' => 'pertanian-ppt',
        'data' => $data
      ]);
    }

    public function pptStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_22_perikanan_tangkap')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),      
      'status_data' => $request->input('status_data'),
    ]); 
      
    return redirect(route('pertanian-ppt.index'))->with('success', 'data berhasil disimpan');
  }
  public function pptUpdate(Request $request, $id)
  {
    $data = \DB::table('m_22_perikanan_tangkap')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('pertanian-ppt.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_22_perikanan_tangkap')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'jumlah' => $request->input('jumlah'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('pertanian-ppt.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function pptDel($id)
    {
      $data = \DB::table('m_22_perikanan_tangkap')->where('tahun', $id);

        $data->delete();
        return redirect(route('pertanian-ppt.index'))->with('sukses', 'Data Sudah di Hapus');
    }
    public function pptCetak()
  {
    $data = \DB::table('m_22_perikanan_tangkap')
    ->select(\DB::raw('
      tahun,
      jumlah,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return view('admin.pertanian.1ppbcetak', [
      'title' => 'Produksi Perikanan Tangkap(PPT)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-pertanian',
      'sub_menu_active' => 'none',
      'page_active' => 'pertanian-ppt',
      'data' => $data
    ]);
  }
}
