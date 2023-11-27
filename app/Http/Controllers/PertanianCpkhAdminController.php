<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class PertanianCpkhAdminController extends Controller
{
    public function cpkhIndex()
    {
      $data = \DB::table('m_24_holtikultura')
      ->select(\DB::raw('
        tahun, 
        jumlah,
        status_data
      '))     
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.pertanian.4cpkh_tampil', [
        'title' => 'Capaian Produksi Komoditi Hortikultura (CPKH)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-pertanian',
        'sub_menu_active' => 'none',
        'page_active' => 'pertanian-cpkh',
        'data' => $data
      ]);
    }
 

    public function cpkhStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_24_holtikultura')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),      
      'status_data' => $request->input('status_data'),
    ]); 
      
    return redirect(route('pertanian-cpkh.index'))->with('success', 'data berhasil disimpan');
  }
  public function cpkhUpdate(Request $request, $id)
  {
    $data = \DB::table('m_24_holtikultura')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('pertanian-cpkh.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_24_holtikultura')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'jumlah' => $request->input('jumlah'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('pertanian-cpkh.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function cpkhDel($id)
    {
      $data = \DB::table('m_24_holtikultura')->where('tahun', $id);

        $data->delete();
        return redirect(route('pertanian-cpkh.index'))->with('sukses', 'Data Sudah di Hapus');
    }
    public function cpkhCetak()
  {
    $data = \DB::table('m_24_holtikultura')
    ->select(\DB::raw('
      tahun,
      jumlah,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return view('admin.pertanian.3cpkupcetak', [
      'title' => 'Capaian Produksi Komoditi Hortikultura (CPKH)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-pertanian',
      'sub_menu_active' => 'none',
      'page_active' => 'pertanian-cpkh',
      'data' => $data
    ]);
  }
}
