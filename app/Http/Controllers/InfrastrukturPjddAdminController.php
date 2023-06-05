<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class InfrastrukturPjddAdminController extends Controller
{
    public function pjddIndex()
    {
      $data = \DB::table('m_28_jalan')
      ->select(\DB::raw('
        tahun, 
        panjang,
        status_data
      '))     
      ->orderBy('tahun', 'desc')
      ->get();
   
      return view('admin.infrastruktur.1pjdd_tampil', [
        'title' => 'Panjang Jalan Yang Dibangun dan Ditingkatkan (PJDD)',
        'menu_active' => 'menu-infrastruktur',
        'sub_menu_active' => 'none',
        'page_active' => 'infrastruktur-pjdd',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }

    public function pjddStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'panjang' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_28_jalan')->insert([
      'tahun' => $request->input('tahun'),
      'panjang' => $request->input('panjang'),      
      'status_data' => $request->input('status_data'),
    ]); 
      
    return redirect(route('infrastruktur-pjdd.index'))->with('success', 'data berhasil disimpan');
  }
  public function pjddUpdate(Request $request, $id)
  {
    $data = \DB::table('m_28_jalan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('infrastruktur-pjdd.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'panjang' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_28_jalan')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'panjang' => $request->input('panjang'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('infrastruktur-pjdd.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function pjddDel($id)
    {
      $data = \DB::table('m_28_jalan')->where('tahun', $id);

        $data->delete();
        return redirect(route('infrastruktur-pjdd.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
