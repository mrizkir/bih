<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialAhmAdminController extends Controller
{ 
  public function ahmIndex()
  {
    $data = \DB::table('m_4_amh')
    ->select(\DB::raw('
      tahun,
      kel_umur,
      laki,
      perempuan,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->orderBy('kel_umur', 'asc')
    ->get();

    return view('admin.sosial.4ahm_tampil', [
      'title' => 'Angka Melek Huruf (AMH)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-sosial',
      'sub_menu_active' => 'none',
      'page_active' => 'sosial-ahm',
      'data' => $data
    ]);
  }

  public function ahmStore(Request $request)
  {
    $this->validate($request, [ 
      'tahun' => 'required',
      'kel_umur' => 'required',
      'laki' => 'required',
      'perempuan' => 'required',
      'status_data' => 'required|in:1,2,3',
    ]);

    // Validasi composite key: cek apakah kombinasi tahun dan kel_umur sudah ada
    $exists = \DB::table('m_4_amh')
      ->where('tahun', $request->input('tahun'))
      ->where('kel_umur', $request->input('kel_umur'))
      ->exists();

    if ($exists) {
      return redirect()->back()
        ->withInput()
        ->withErrors(['kel_umur' => 'Data dengan Tahun ' . $request->input('tahun') . ' dan Kelompok Umur ini sudah ada.']);
    }
 
    \DB::table('m_4_amh')->insert([
      'tahun' => $request->input('tahun'),
      'kel_umur' => $request->input('kel_umur'),
      'laki' => $request->input('laki'),      
      'perempuan' => $request->input('perempuan'),      
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-ahm.index'))->with('success', 'data berhasil disimpan');
  }
  public function ahmUpdate(Request $request, $id)
  {
    $data = \DB::table('m_4_amh')
    ->where('kel_umur', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('sosial-ahm.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [
        'tahun' => 'required',
        'kel_umur' => 'required',
        'laki' => 'required',
        'perempuan' => 'required',
        'status_data' => 'required|in:1,2,3',
      ]);

      // Validasi composite key: cek apakah kombinasi tahun dan kel_umur sudah ada
      // (exclude data yang sedang diedit)
      $exists = \DB::table('m_4_amh')
        ->where('tahun', $request->input('tahun'))
        ->where('kel_umur', $request->input('kel_umur'))
        ->whereNot(function($query) use ($data) {
          $query->where('tahun', $data->tahun)
                ->where('kel_umur', $data->kel_umur);
        })
        ->exists();

      if ($exists) {
        return redirect()->back()
          ->withInput()
          ->withErrors(['kel_umur' => 'Data dengan Tahun ' . $request->input('tahun') . ' dan Kelompok Umur ini sudah ada.']);
      }

      \DB::table('m_4_amh')
      ->where('tahun', $data->tahun)
      ->where('kel_umur', $data->kel_umur)
      ->update([
        'tahun' => $request->input('tahun'),
        'kel_umur' => $request->input('kel_umur'),
        'laki' => $request->input('laki'),      
        'perempuan' => $request->input('perempuan'),      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-ahm.index'))->with('success', 'data berhasil diubah');
    }    
  }
    public function ahmDel($id)
    {
      $data = \DB::table('m_4_amh')->where('kel_umur', $id);

        $data->delete();
        return redirect(route('sosial-ahm.index'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function ahmCetak()
  {
    $data = \DB::table('m_4_amh')
    ->select(\DB::raw('
    tahun,
    kel_umur,
    laki,
    perempuan,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->orderBy('kel_umur', 'asc')
    ->get();

    return view('admin.sosial.4ahmcetak', [
      'title' => 'Angka Melek Huruf (AMH)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-sosial',
      'sub_menu_active' => 'none',
      'page_active' => 'sosial-ahm',
      'data' => $data
    ]);
  }
}
 