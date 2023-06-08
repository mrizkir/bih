<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class KependudukanJpbkAdminController extends Controller
{
    public function jpbkIndex()
    {
      $data = \DB::table('m_26_penduduk_kecamatan')
      ->select(\DB::raw('
      id,
      kecamatan,
        laki,
        perempuan,
        sex_ratio,
        status_data
      '))    
      ->orderBy('id', 'desc')
      ->get();
  
      return view('admin.kependudukan.2jpbk_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kecamatan Tahun 2021 (JPBK)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbk',
        'data' => $data
      ]);
    }

    public function jpbkStore(Request $request) 
  {
    $this->validate($request, [ 
      'kecamatan' => 'required',
      'laki' => 'required',
      'perempuan' => 'required',
      'sex_ratio' => 'required',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_26_penduduk_kecamatan')->insert([
      'kecamatan' => $request->input('kecamatan'),
      'laki' => $request->input('laki'),      
      'perempuan' => $request->input('perempuan'),   
      'sex_ratio' => $request->input('sex_ratio'),         
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('kependudukan-jpbk.index'))->with('success', 'data berhasil disimpan');
  }
  public function jpbkUpdate(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_kecamatan')
    ->where('id', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('kependudukan-jpbk.index'))->with('error', 'data gagal disimpan');
    }
    else 
    {
      $this->validate($request, [  
        'kecamatan' => 'required',  
        'laki' => 'required',
        'perempuan' => 'required',
        'sex_ratio' => 'required',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_kecamatan')
      ->where('id', $request->input('id'))
      ->update([
        'kecamatan' => $request->input('kecamatan'),
        'laki' => $request->input('laki'),      
        'perempuan' => $request->input('perempuan'), 
        'sex_ratio' => $request->input('sex_ratio'),         
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('kependudukan-jpbk.index'))->with('success', 'data berhasil diubah');
    }    
  }
    public function jpbkDel($id)
    {
      $data = \DB::table('m_26_penduduk_kecamatan')->where('id', $id);

        $data->delete();
        return redirect(route('kependudukan-jpbk.index'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function jpbkCetak()
  {
    $data = \DB::table('m_26_penduduk_kecamatan')
    ->select(\DB::raw('
    id,
    kecamatan,
      laki,
      perempuan,
      sex_ratio,
      status_data
    '))    
    ->orderBy('id', 'desc')
    ->get(); 

    return view('admin.kependudukan.2jpbkcetak', [
      'title' => 'Jumlah Penduduk Berdasarkan Kecamatan Tahun 2021 (JPBK)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-kependudukan',
      'sub_menu_active' => 'none',
      'page_active' => 'kependudukan-jpbk',
      'data' => $data
    ]);
  }
}
