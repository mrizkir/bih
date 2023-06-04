<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialIpgAdminController extends Controller
{
    public function ipgIndex()
    {
      $data = \DB::table('m_9_ipg')
      ->select(\DB::raw('
        tahun,
        laki,
        perempuan,
        total,
        status_data
      '))    
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.sosial.9ipg_tampil', [
        'title' => 'Indeks Pembangunan Gender (IPG)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-sosial',
        'sub_menu_active' => 'none',
        'page_active' => 'sosial-ipg',
        'data' => $data
      ]);
    }

    public function ipgStore(Request $request)
  {
    $this->validate($request, [ 
      'tahun' => 'required',
      'laki' => 'required',
      'perempuan' => 'required',
      'total' => 'required',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_9_ipg')->insert([
      'tahun' => $request->input('tahun'),
      'laki' => $request->input('laki'),      
      'perempuan' => $request->input('perempuan'),   
      'total' => $request->input('total'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-ipg.index'))->with('success', 'data berhasil disimpan');
  }
  public function ipgUpdate(Request $request, $id)
  {
    $data = \DB::table('m_9_ipg')
    ->where('tahun', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('sosial-ipg.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required',
        'laki' => 'required',
        'perempuan' => 'required',
        'total' => 'required',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_9_ipg')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'tahun' => $request->input('tahun'),
        'laki' => $request->input('laki'),      
        'perempuan' => $request->input('perempuan'),   
        'total' => $request->input('total'),    
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-ipg.index'))->with('success', 'data berhasil diubah');
    }    
  }
    public function ipgDel($id)
    {
      $data = \DB::table('m_9_ipg')->where('tahun', $id);

        $data->delete();
        return redirect(route('sosial-ipg.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
