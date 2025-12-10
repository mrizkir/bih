<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sosial\LulusanPendidikanModel;

class SosialPpuAdminController extends Controller
{
  public function ppuIndex()
  {
    $data = \DB::table('m_16_lulusan_pendidikan')
    ->select(\DB::raw('
      tahun,
      no,
      pendidikan,
      laki,
      perempuan,
      total,
      status_data 
    '))    
    ->orderBy('tahun', 'desc')
    ->orderBy('no', 'asc')
    ->get();

    return view('admin.sosial.16ppu_tampil', [
      'title' => 'Persentase Penduduk Usia 15 Tahun ke atas menurut Pendidikan yang Ditamatkan (PPU)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-sosial',
      'sub_menu_active' => 'none',
      'page_active' => 'sosial-ppu',
      'data' => $data
    ]);
  }

  public function ppuStore(Request $request)
  {
    
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'pendidikan' => 'required|in:1,2,3,4,5,6,7',      
      'laki' => 'required',
      'perempuan' => 'required',
      'total' => 'required',
      'status_data' => 'required|in:1,2,3',
    ]); 

    LulusanPendidikanModel::create([
      'tahun' => $request->input('tahun'),
      'no' => $request->input('pendidikan'),
      'pendidikan' => \Helper::getPendidikan($request->input('pendidikan')),
      'laki' => $request->input('laki'),      
      'perempuan' => $request->input('perempuan'),      
      'total' => $request->input('total'),      
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-ppu.index'))->with('success', 'data berhasil disimpan');
  }
  public function ppuUpdate(Request $request, $id)
  {
    // Split id menjadi tahun dan no (format: tahun-no)
    $parts = explode('-', $id);
    $tahun = $parts[0] ?? null;
    $no = $parts[1] ?? null;

    $data = LulusanPendidikanModel::where('tahun', $tahun)
    ->where('no', $no)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('sosial-ppu.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [           
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'no' => 'required',
        'laki' => 'required',
        'perempuan' => 'required',
        'total' => 'required',
        'status_data' => 'required|in:1,2,3',
      ]);

      LulusanPendidikanModel::where('tahun', $request->input('tahun'))
      ->where('no', $request->input('no'))
      ->update([         
        'laki' => $request->input('laki'),  
        'perempuan' => $request->input('perempuan'),      
        'total' => $request->input('total'),      
        'status_data' => $request->input('status_data'),
      ]);
      // dd($request);
      return redirect(route('sosial-ppu.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function ppuDel($id)
  {
    // Split id menjadi tahun dan no (format: tahun-no)
    $parts = explode('-', $id);
    $tahun = $parts[0] ?? null;
    $no = $parts[1] ?? null;

    $data = LulusanPendidikanModel::where('tahun', $tahun)
      ->where('no', $no)
      ->first();

    if (is_null($data)) {
      return redirect(route('sosial-ppu.index'))->with('error', 'Data tidak ditemukan');
    }

    $data->delete();
    return redirect(route('sosial-ppu.index'))->with('success', 'Data berhasil dihapus');
  }

  public function ppuCetak()
  {
    $data = \DB::table('m_16_lulusan_pendidikan')
    ->select(\DB::raw('
    no,
    pendidikan,
    laki,
    perempuan,
    total,
    status_data 
  '))    
  ->orderBy('no', 'desc')
  ->get();

    return view('admin.sosial.16ppucetak', [
      'title' => 'Indeks Daya Beli - Purchasing Power Parity (IDB)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-sosial',
      'sub_menu_active' => 'none',
      'page_active' => 'sosial-idb',
      'data' => $data
    ]);
  }
}
