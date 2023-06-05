<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class EkonomiPmaAdminController extends Controller
{
    public function pmaIndex()
    {
      $data = \DB::table('m_35_pma')
      ->select(\DB::raw('
        tahun,
        jumlah,
        status_data
      '))    
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.ekonomi.6pma_tampil', [
        'title' => 'Realisasi Investasi (PMA/ PMDN)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'none',
        'page_active' => 'ekonomi-adhk-pma',
        'data' => $data
      ]);
    }

    public function pmaStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]); 
 
    \DB::table('m_35_pma')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),      
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-pma.index'))->with('success', 'data berhasil disimpan');
  }
  public function pmaUpdate(Request $request, $id)
  {
    $data = \DB::table('m_35_pma')
    ->where('tahun', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('ekonomi-pma.index'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_35_pma')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'jumlah' => $request->input('jumlah'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-pma.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function pmaDel($id)
    {
      $data = \DB::table('m_35_pma')->where('tahun', $id);

        $data->delete();
        return redirect(route('ekonomi-pma.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
