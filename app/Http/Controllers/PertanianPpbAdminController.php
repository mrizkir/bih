<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class PertanianPpbAdminController extends Controller
{
    public function ppbIndex()
    {
      $data = \DB::table('m_21_perikanan_budidaya')
      ->select(\DB::raw('
        tahun,
        jumlah,
        status_data
      '))     
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.pertanian.1ppb_tampil', [
        'title' => 'Produksi Perikanan Budidaya (PPB)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-pertanian',
        'sub_menu_active' => 'none',
        'page_active' => 'pertanian-ppb',        
        'data' => $data
      ]);
    }

    public function ppbStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_21_perikanan_budidaya')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),      
      'status_data' => $request->input('status_data'),
    ]); 
      
    return redirect(route('pertanian-ppb.index'))->with('success', 'data berhasil disimpan');
  }
  public function ppbUpdate(Request $request, $id)
  {
    $data = \DB::table('m_21_perikanan_budidaya')
    ->where('tahun', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('pertanian-ppb.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_21_perikanan_budidaya')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'jumlah' => $request->input('jumlah'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('pertanian-ppb.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function ppbDel($id)
    {
      $data = \DB::table('m_21_perikanan_budidaya')->where('tahun', $id);

        $data->delete();
        return redirect(route('pertanian-ppb.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
