<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialPkkAdminController extends Controller
{
    public function pkkIndex()
    {
      $data = \DB::table('m_8_tenaga_kerja')
      ->select(\DB::raw('
        tahun,
        penduduk_usia_kerja, 
        angkatan_kerja,
        bekerja,
        mencari_pekerjaan,
        tingkat_partisipasi,
        tingkat_pengangguran,
        status_data
      '))     
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.sosial.8pkk_tampil', [
        'title' => 'Perkembangan Kondisi Ketenagakerjaan di Kabupaten Bintan (PKK)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-sosial',
        'sub_menu_active' => 'none',
        'page_active' => 'sosial-pkk',
        'data' => $data
      ]);
    }

    public function pkkStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'penduduk_usia_kerja' => 'required|numeric|min:0|max:100',
      'angkatan_kerja' => 'required|numeric|min:0|max:100',
      'bekerja' => 'required|numeric|min:0|max:100',
      'mencari_pekerjaan' => 'required|numeric|min:0|max:100',
      'tingkat_partisipasi' => 'required|numeric|min:0|max:100',
      'tingkat_pengangguran' => 'required|numeric|min:0|max:100', 
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_8_tenaga_kerja')->insert([
      'tahun' => $request->input('tahun'),
      'penduduk_usia_kerja' => $request->input('penduduk_usia_kerja'), 
      'angkatan_kerja' => $request->input('angkatan_kerja'), 
      'bekerja' => $request->input('bekerja'), 
      'mencari_pekerjaan' => $request->input('mencari_pekerjaan'), 
      'tingkat_partisipasi' => $request->input('tingkat_partisipasi'), 
      'tingkat_pengangguran' => $request->input('tingkat_pengangguran'),      
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-pkk.index'))->with('success', 'data berhasil disimpan');
  }
  public function pkkUpdate(Request $request, $id)
  {
    $data = \DB::table('m_8_tenaga_kerja')
    ->where('tahun', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('sosial-pkk.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'penduduk_usia_kerja' => 'required|numeric|min:0|max:100',
      'angkatan_kerja' => 'required|numeric|min:0|max:100',
      'bekerja' => 'required|numeric|min:0|max:100',
      'mencari_pekerjaan' => 'required|numeric|min:0|max:100',
      'tingkat_partisipasi' => 'required|numeric|min:0|max:100',
      'tingkat_pengangguran' => 'required|numeric|min:0|max:100', 
      'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_8_tenaga_kerja')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'tahun' => $request->input('tahun'),
      'penduduk_usia_kerja' => $request->input('penduduk_usia_kerja'), 
      'angkatan_kerja' => $request->input('angkatan_kerja'), 
      'bekerja' => $request->input('bekerja'), 
      'mencari_pekerjaan' => $request->input('mencari_pekerjaan'), 
      'tingkat_partisipasi' => $request->input('tingkat_partisipasi'), 
      'tingkat_pengangguran' => $request->input('tingkat_pengangguran'),      
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-pkk.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function pkkDel($id)
    {
      $data = \DB::table('m_8_tenaga_kerja')->where('tahun', $id);

        $data->delete();
        return redirect(route('sosial-pkk.index'))->with('sukses', 'Data Sudah di Hapus');
    }
    public function pkkCetak()
  {
    $data = \DB::table('m_8_tenaga_kerja')
    ->select(\DB::raw('
    tahun,
    penduduk_usia_kerja, 
    angkatan_kerja,
    bekerja,
    mencari_pekerjaan,
    tingkat_partisipasi,
    tingkat_pengangguran,
    status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return view('admin.sosial.8pkkcetak', [
      'title' => 'Perkembangan Kondisi Ketenagakerjaan di Kabupaten Bintan (PKK)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-sosial',
      'sub_menu_active' => 'none',
      'page_active' => 'sosial-pkk',
      'data' => $data
    ]);
  }
}
