<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialPpuAdminController extends Controller
{
    public function ppuIndex()
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
  
      return view('admin.sosial.16ppu_tampil', [
        'title' => 'Persentase Penduduk Usia 15 Tahun ke atas menurut Pendidikan yang Ditamatkan (PPU)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }

    public function ppuStore(Request $request)
  {
    $this->validate($request, [
      'pendidikan' => 'required',
      'laki' => 'required',
      'perempuan' => 'required',
      'total' => 'required',
      'status_data' => 'required|in:1,2,3',
    ]); 
    \DB::table('m_16_lulusan_pendidikan')->insert([
      'pendidikan' => $request->input('pendidikan'),
      'laki' => $request->input('laki'),      
      'perempuan' => $request->input('perempuan'),      
      'total' => $request->input('total'),      
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-ppu.index'))->with('success', 'data berhasil disimpan');
  }
  public function ppuUpdate(Request $request, $id)
  {
    $data = \DB::table('m_16_lulusan_pendidikan')
    ->where('pendidikan', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('sosial-ppu.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [   
      'laki' => 'required',
      'perempuan' => 'required',
      'total' => 'required',
      'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_16_lulusan_pendidikan')
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
      $data = \DB::table('m_16_lulusan_pendidikan')->where('no', $id);

        $data->delete();
        return redirect(route('sosial-ppu.index'))->with('sukses', 'Data Sudah di Hapus');
    }
}
