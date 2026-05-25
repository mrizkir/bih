<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SosialStuntingAdminController extends Controller
{
  public function stuntingIndex()
  {
    $data = \DB::table('m_39_prevalensi_stunting')
      ->select(\DB::raw('
        tahun,
        prevalensi,
        status_data
      '))
      ->orderBy('tahun', 'desc')
      ->get();

    return view('admin.sosial.39stunting_tampil', [
      'title' => 'Prevalensi Stunting',
      'sumber' => 'BPS',
      'menu_active' => 'menu-sosial',
      'sub_menu_active' => 'none',
      'page_active' => 'sosial-stunting',
      'data' => $data,
    ]);
  }

  public function stuntingStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:' . date('Y'),
      'prevalensi' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);

    \DB::table('m_39_prevalensi_stunting')->insert([
      'tahun' => $request->input('tahun'),
      'prevalensi' => $request->input('prevalensi'),
      'status_data' => $request->input('status_data'),
    ]);

    return redirect(route('sosial-stunting.index'))->with('success', 'data berhasil disimpan');
  }

  public function stuntingUpdate(Request $request, $id)
  {
    $data = \DB::table('m_39_prevalensi_stunting')
      ->where('tahun', $id)
      ->first();

    if (is_null($data)) {
      return redirect(route('sosial-stunting.index'))->with('error', 'data gagal disimpan');
    }

    $this->validate($request, [
      'prevalensi' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);

    \DB::table('m_39_prevalensi_stunting')
      ->where('tahun', $request->input('tahun'))
      ->update([
        'prevalensi' => $request->input('prevalensi'),
        'status_data' => $request->input('status_data'),
      ]);

    return redirect(route('sosial-stunting.index'))->with('success', 'data berhasil diubah');
  }

  public function stuntingDel($id)
  {
    $data = \DB::table('m_39_prevalensi_stunting')->where('tahun', $id);

    $data->delete();
    return redirect(route('sosial-stunting.index'))->with('sukses', 'Data Sudah di Hapus');
  }

  public function stuntingCetak()
  {
    $data = \DB::table('m_39_prevalensi_stunting')
      ->select(\DB::raw('
      tahun,
      prevalensi,
      status_data
    '))
      ->orderBy('tahun', 'desc')
      ->get();

    return view('admin.sosial.39stuntingcetak', [
      'title' => 'Prevalensi Stunting',
      'sumber' => 'BPS',
      'menu_active' => 'menu-sosial',
      'sub_menu_active' => 'none',
      'page_active' => 'sosial-stunting',
      'data' => $data,
    ]);
  }
}
