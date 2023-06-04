<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialAkimAdminController extends Controller
{ 
    public function akimIndex()
    {
      $data = \DB::table('m_7_kematian_ibu')
      ->select(\DB::raw('
        tahun,
        kematian_ibu,
        status_data
      '))     
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.sosial.7akim_tampil', [
        'title' => 'Angka Kematian Ibu Melahirkan Per 100.000 Kelahiran Hidup',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }

    public function akimStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'kematian_ibu' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_7_kematian_ibu')->insert([
      'tahun' => $request->input('tahun'),
      'kematian_ibu' => $request->input('kematian_ibu'),      
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-akim.index'))->with('success', 'data berhasil disimpan');
  }
  public function akimUpdate(Request $request, $id)
  {
    $data = \DB::table('m_7_kematian_ibu')
    ->where('tahun', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('sosial-akim.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'kematian_ibu' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_7_kematian_ibu')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'kematian_ibu' => $request->input('kematian_ibu'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-akim.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function akimDel($id)
    {
      $data = \DB::table('m_7_kematian_ibu')->where('tahun', $id);

        $data->delete();
        return redirect(route('sosial-akim.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
