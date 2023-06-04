<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialIgAdminController extends Controller
{
    public function igIndex()
    {
      $data = \DB::table('m_14_gini')
      ->select(\DB::raw('
        tahun,
        gini_ratio,
        status_data 
      '))    
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.sosial.14ig_tampil', [
        'title' => 'Indeks Gini (IG)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }

    public function igStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'gini_ratio' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_14_gini')->insert([
      'tahun' => $request->input('tahun'),
      'gini_ratio' => $request->input('gini_ratio'),      
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-ig.index'))->with('success', 'data berhasil disimpan');
  }
  public function igUpdate(Request $request, $id)
  {
    $data = \DB::table('m_14_gini')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('sosial-ig.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'gini_ratio' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_14_gini')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'gini_ratio' => $request->input('gini_ratio'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-ig.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function igDel($id)
    {
      $data = \DB::table('m_14_gini')->where('tahun', $id);

        $data->delete();
        return redirect(route('sosial-ig.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
