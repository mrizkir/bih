<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class PertanianJppAdminController extends Controller
{
    public function jppIndex()
    {
      $data = \DB::table('m_25_peternakan')
      ->select(\DB::raw('
        tahun, 
        jumlah,
        status_data
      '))     
      ->orderBy('tahun', 'desc')
      ->get();
   
      return view('admin.pertanian.5jpp_tampil', [
        'title' => 'Jumlah Produksi Peternakan (JPP)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-pertanian',
        'sub_menu_active' => 'none',
        'page_active' => 'pertanian-jpp',
        'data' => $data
      ]);
    }

    public function jppStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_25_peternakan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),      
      'status_data' => $request->input('status_data'),
    ]); 
      
    return redirect(route('pertanian-jpp.index'))->with('success', 'data berhasil disimpan');
  }
  public function jppUpdate(Request $request, $id)
  {
    $data = \DB::table('m_25_peternakan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('pertanian-jpp.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_25_peternakan')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'jumlah' => $request->input('jumlah'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('pertanian-jpp.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function jppDel($id)
    {
      $data = \DB::table('m_25_peternakan')->where('tahun', $id);

        $data->delete();
        return redirect(route('pertanian-jpp.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
