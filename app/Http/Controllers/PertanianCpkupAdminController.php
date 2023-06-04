<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class PertanianCpkupAdminController extends Controller
{
    public function cpkupIndex()
    {
      $data = \DB::table('m_23_perkebunan')
      ->select(\DB::raw('
        tahun, 
        jumlah,
        status_data
      '))     
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.pertanian.3cpkup_tampil', [
        'title' => 'Capaian Produksi Komoditi Unggulan Perkebunan (CPKUP)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-pertanian',
        'sub_menu_active' => 'none',
        'page_active' => 'pertanian-cpkup',
        'data' => $data
      ]);
    }

    public function cpkupStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_23_perkebunan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),      
      'status_data' => $request->input('status_data'),
    ]); 
      
    return redirect(route('pertanian-cpkup.index'))->with('success', 'data berhasil disimpan');
  }
  public function cpkupUpdate(Request $request, $id)
  {
    $data = \DB::table('m_23_perkebunan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('pertanian-cpkup.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_23_perkebunan')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'jumlah' => $request->input('jumlah'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('pertanian-cpkup.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function cpkupDel($id)
    {
      $data = \DB::table('m_23_perkebunan')->where('tahun', $id);

        $data->delete();
        return redirect(route('pertanian-cpkup.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
