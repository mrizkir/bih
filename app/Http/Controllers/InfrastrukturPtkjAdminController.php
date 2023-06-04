<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class InfrastrukturPtkjAdminController extends Controller
{
    public function ptkjIndex()
    {
      $data = \DB::table('m_37_kemantapan_jalan')
      ->select(\DB::raw('
        tahun, 
        kemantapan_jalan,
        status_data
      '))     
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.infrastruktur.3ptkj_tampil', [
        'title' => 'Persentase Tingkat Kemantapan Jalan (PTKJ)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-infrastruktur',
        'sub_menu_active' => 'none',
        'page_active' => 'infrastruktur-ptk',
        'data' => $data
      ]);
    }

    public function ptkjStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'kemantapan_jalan' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]); 
  
    \DB::table('m_37_kemantapan_jalan')->insert([
      'tahun' => $request->input('tahun'),
      'kemantapan_jalan' => $request->input('kemantapan_jalan'),      
      'status_data' => $request->input('status_data'),
    ]); 
      
    return redirect(route('infrastruktur-ptkj.index'))->with('success', 'data berhasil disimpan');
  }
  public function ptkjUpdate(Request $request, $id)
  {
    $data = \DB::table('m_37_kemantapan_jalan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('infrastruktur-ptkj.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'kemantapan_jalan' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_37_kemantapan_jalan')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'kemantapan_jalan' => $request->input('kemantapan_jalan'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('infrastruktur-ptkj.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function ptkjDel($id)
    {
      $data = \DB::table('m_37_kemantapan_jalan')->where('tahun', $id);

        $data->delete();
        return redirect(route('infrastruktur-ptkj.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
