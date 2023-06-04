<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialJrtlhAdminController extends Controller
{
    public function jrtlhIndex()
    {
      $data = \DB::table('m_13_rtlh')
      ->select(\DB::raw('
        tahun,
        jml,
        status_data
      '))    
      ->orderBy('tahun', 'desc')
      ->get();
   
      return view('admin.sosial.13jrtlh_tampil', [
        'title' => 'Jumlah Rumah Tidak Layak Huni Yang Direhab (JRTLH)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }

    public function jrtlhStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'jml' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_13_rtlh')->insert([
      'tahun' => $request->input('tahun'),
      'jml' => $request->input('jml'),      
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-jrtlh.index'))->with('success', 'data berhasil disimpan');
  }
  public function jrtlhUpdate(Request $request, $id)
  {
    $data = \DB::table('m_13_rtlh')
    ->where('tahun', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('sosial-jrtlh.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'jml' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_13_rtlh')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'jml' => $request->input('jml'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-jrtlh.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function jrtlhDel($id)
    {
      $data = \DB::table('m_13_rtlh')->where('tahun', $id);

        $data->delete();
        return redirect(route('sosial-jrtlh.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
