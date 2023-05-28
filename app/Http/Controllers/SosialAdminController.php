<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DataSosialModel;

class SosialAdminController extends Controller
{
  public function ppmIndex()
  {
    $data = DataSosialModel::orderBy('tahun', 'desc')->get();

    return view('admin.sosial.ppm_tampil', [
      'title' => 'Persentase Penduduk Miskin (PPM)',
      'data' => $data
    ]);
  }
  public function ppmStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'data_series' => 'required',
      'data_persentase' => 'required',
    ]);

    DataSosialModel::create([
      'tahun' => $request->input('tahun'),
      'data_series' => $request->input('data_series'),
      'jenis_data' => 'ppm',
      'persentase' => $request->input('data_persentase'),
    ]);

    return redirect(route('sosial-ppm.index'))->with('sukses', 'data berhasil disimpan');
  }
  public function ppmUpdate(Request $request, $id)
  {
    $data = DataSosialModel::find($id);
    if (is_null($data))
    {
      return redirect(route('sosial-ppm.index'))->with('gagal', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [
        'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
        'data_series' => 'required',
        'data_persentase' => 'required',
      ]);
      
      $data->tahun = $request->input('tahun');
      $data->data_series = $request->input('data_series');
      $data->persentase = $request->input('data_persentase');
      $data->save();

      return redirect(route('sosial-ppm.index'))->with('sukses', 'data berhasil diubah');
    }    
  }
}
