<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;
 
class KependudukanJpAdminController extends Controller
{
    public function jpIndex()
    {
      $data = \DB::table('m_36_jumlah_penduduk')
      ->select(\DB::raw('
        tahun,
        laki,
        perempuan,
        total,
        status_data
      '))    
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.kependudukan.1jp_tampil', [
        'title' => 'Jumlah Penduduk (JP)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jp',
        'data' => $data
      ]);
    }

    public function jpStore(Request $request)
  {
    $this->validate($request, [ 
      'tahun' => 'required',
      'laki' => 'required',
      'perempuan' => 'required',
      'total' => 'required',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_36_jumlah_penduduk')->insert([
      'tahun' => $request->input('tahun'),
      'laki' => $request->input('laki'),      
      'perempuan' => $request->input('perempuan'),   
      'total' => $request->input('total'),         
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('kependudukan-jp.index'))->with('success', 'data berhasil disimpan');
  }
  public function jpUpdate(Request $request, $id)
  {
    $data = \DB::table('m_36_jumlah_penduduk')
    ->where('tahun', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('kependudukan-jp.index'))->with('error', 'data gagal disimpan');
    }
    else 
    {
      $this->validate($request, [    
        'laki' => 'required',
        'perempuan' => 'required',
        'total' => 'required',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_36_jumlah_penduduk')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'laki' => $request->input('laki'),      
        'perempuan' => $request->input('perempuan'), 
        'total' => $request->input('total'),         
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('kependudukan-jp.index'))->with('success', 'data berhasil diubah');
    }    
  }
    public function jpDel($id)
    {
      $data = \DB::table('m_36_jumlah_penduduk')->where('tahun', $id);

        $data->delete();
        return redirect(route('kependudukan-jp.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
