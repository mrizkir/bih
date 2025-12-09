<?php
/**
 * controller untuk menghandle data Angka Melek Hurup (AMH) 
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sosial\AMHModel;

class SosialAMHAdminController extends Controller
{ 
  public function ahmIndex()
  {
    $data = AMHModel::select('tahun', 'jumlah', 'status_data')
      ->orderBy('tahun', 'desc')
      ->get();

    return view('admin.sosial.amh.amh-index', [
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
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);

    // Validasi: cek apakah tahun sudah ada
    $exists = AMHModel::where('tahun', $request->input('tahun'))->exists();

    if ($exists) {
      return redirect()->back()
        ->withInput()
        ->withErrors(['tahun' => 'Data dengan Tahun ' . $request->input('tahun') . ' sudah ada.']);
    }
 
    AMHModel::create([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-ahm.index'))->with('success', 'data berhasil disimpan');
  }

  public function ahmEdit($id)
  {
    $data = AMHModel::find($id);

    if (is_null($data)) {
      return redirect(route('sosial-ahm.index'))->with('error', 'Data tidak ditemukan');
    }

    return view('admin.sosial.4ahm_tampil', [
      'title' => 'Angka Melek Huruf (AMH)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-sosial',
      'sub_menu_active' => 'none',
      'page_active' => 'sosial-ahm',
      'data' => AMHModel::select('tahun', 'jumlah', 'status_data')->orderBy('tahun', 'desc')->get(),
      'edit_data' => $data
    ]);
  }

  public function ahmUpdate(Request $request, $id)
  {
    $data = AMHModel::find($id);

    if (is_null($data))
    {
      return redirect(route('sosial-ahm.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [
        'tahun' => 'required',
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);

      // Validasi: cek apakah tahun sudah ada (exclude data yang sedang diedit)
      if ($request->input('tahun') != $data->tahun) {
        $exists = AMHModel::where('tahun', $request->input('tahun'))->exists();

        if ($exists) {
          return redirect()->back()
            ->withInput()
            ->withErrors(['tahun' => 'Data dengan Tahun ' . $request->input('tahun') . ' sudah ada.']);
        }
      }

      $data->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-ahm.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function ahmDel($id)
  {
    $data = AMHModel::find($id);

    if ($data) {
      $data->delete();
      return redirect(route('sosial-ahm.index'))->with('sukses', 'Data Sudah di Hapus');
    }
    
    return redirect(route('sosial-ahm.index'))->with('error', 'Data tidak ditemukan');
  }

  public function ahmCetak()
  {
    $data = AMHModel::select('tahun', 'jumlah', 'status_data')
      ->orderBy('tahun', 'desc')
      ->get();

    return view('admin.sosial.amh.amh-cetak', [
      'title' => 'Angka Melek Huruf (AMH)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-sosial',
      'sub_menu_active' => 'none',
      'page_active' => 'sosial-ahm',
      'data' => $data
    ]);
  }
}
 