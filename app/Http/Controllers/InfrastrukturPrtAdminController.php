<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class InfrastrukturPrtAdminController extends Controller
{
    public function prtIndex()
    {
      $data = \DB::table('m_29_air')
      ->select(\DB::raw('
        tahun, 
        nilai,
        status_data
      '))     
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.infrastruktur.2prt_tampil', [
        'title' => 'Persentase Rumah Tangga yang menggunakan air bersih (PRT)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-infrastruktur',
        'sub_menu_active' => 'none',
        'page_active' => 'infrastruktur-prt',
        'data' => $data
      ]);
    }

    public function prtStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'nilai' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]); 
 
    \DB::table('m_29_air')->insert([
      'tahun' => $request->input('tahun'),
      'nilai' => $request->input('nilai'),      
      'status_data' => $request->input('status_data'),
    ]); 
      
    return redirect(route('infrastruktur-prt.index'))->with('success', 'data berhasil disimpan');
  }
  public function prtUpdate(Request $request, $id)
  {
    $data = \DB::table('m_29_air')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('infrastruktur-prt.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'nilai' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_29_air')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'nilai' => $request->input('nilai'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('infrastruktur-prt.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function prtDel($id)
    {
      $data = \DB::table('m_29_air')->where('tahun', $id);

        $data->delete();
        return redirect(route('infrastruktur-prt.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
