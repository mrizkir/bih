<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialAkhbAdminController extends Controller
{
    public function akhbIndex()
    {
      $data = \DB::table('m_6_akhb')
      ->select(\DB::raw('
        tahun,
        akhb,
        status_data
      '))     
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.sosial.6akhb_tampil', [
        'title' => 'Angka Kelangsungan Hidup Bayi (AKHB)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-sosial',
        'sub_menu_active' => 'none',
        'page_active' => 'sosial-akh',
        'data' => $data
      ]); 
    }

    public function akhbStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'akhb' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_6_akhb')->insert([
      'tahun' => $request->input('tahun'),
      'akhb' => $request->input('akhb'),      
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-akhb.index'))->with('success', 'data berhasil disimpan');
  }
  public function akhbUpdate(Request $request, $id)
  {
    $data = \DB::table('m_6_akhb')
    ->where('tahun', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('sosial-akhb.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'akhb' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_6_akhb')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'akhb' => $request->input('akhb'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-akhb.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function akhbDel($id)
    {
      $data = \DB::table('m_6_akhb')->where('tahun', $id);

        $data->delete();
        return redirect(route('sosial-akhb.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
