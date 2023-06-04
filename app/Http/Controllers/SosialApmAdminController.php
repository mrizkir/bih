<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialApmAdminController extends Controller
{
    public function apmIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.11apm_tampil', [
        'title' => 'Angka partisipasi Murni (APM)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }
    public function apm_SD()
    {
      $data = \DB::table('m_11_apm')
      ->select(\DB::raw('
        tahun,
        tingkat,
        APM,
        no,
        status_data
      '))    
      ->where('no','1')
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.sosial.sosial_apm_SD_tampil', [
        'title' => 'Angka partisipasi Murni (APM)',
        'sumber' => 'SD 7-12 Tahun',
        'menu_active' => 'menu-sosial',
        'sub_menu_active' => 'menu-sosial-apm',
        'page_active' => 'sosial-apm-sd',
        'data' => $data
      ]);
    }


    public function apmsdStore(Request $request)
  {
    $this->validate($request, [ 
      'tahun' => 'required',
      'APM' => 'required', 
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_11_apm')->insert([
      'tahun' => $request->input('tahun'),
      'tingkat' => 'SD 7-12 TAHUN',      
      'APM' => $request->input('APM'),   
      'no' => '1',    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-apm_SD'))->with('success', 'data berhasil disimpan');
  }
  public function apmsdUpdate(Request $request, $id)
  {
    $data = \DB::table('m_11_apm')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('sosial-apm_SD'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required',
        'APM' => 'required',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_11_apm')
      ->where('tahun', $request->input('tahun'))
      ->update([
      'tahun' => $request->input('tahun'), 
      'APM' => $request->input('APM'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-apm_SD'))->with('success', 'data berhasil diubah');
    }    
  }
  public function apmsdDel($id)
  {
    $data = \DB::table('m_11_apm')->where('tahun', $id);

      $data->delete();
      return redirect(route('sosial-apm_SD'))->with('sukses', 'Data Sudah di Hapus');
  }
  public function apm_SMP()
  {
    $data = \DB::table('m_11_apm')
    ->select(\DB::raw('
      tahun,
      tingkat,
      APM,
      no,
      status_data
    '))    
    ->where('no','2')
    ->orderBy('tahun', 'desc')
    ->get();

    return view('admin.sosial.sosial_apm_SMP_tampil', [
      'title' => 'Angka partisipasi Murni (APM)',
      'sumber' => 'SMP 13-15 Tahun',
      'menu_active' => 'menu-sosial',
      'sub_menu_active' => 'menu-sosial-apm',
      'page_active' => 'sosial-apm-smp',
      'data' => $data
    ]);
  }

  public function apmsmpStore(Request $request)
  {
    $this->validate($request, [ 
      'tahun' => 'required',
      'APM' => 'required', 
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_11_apm')->insert([
      'tahun' => $request->input('tahun'),
      'tingkat' => 'SMP 13-15 Tahun',      
      'APM' => $request->input('APM'),   
      'no' => '2',    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-apm_SMP'))->with('success', 'data berhasil disimpan');
  }
  public function apmsmpUpdate(Request $request, $id)
  {
    $data = \DB::table('m_11_apm')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('sosial-apm_SMP'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required',
        'APM' => 'required',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_11_apm')
      ->where('tahun', $request->input('tahun'))
      ->update([
      'tahun' => $request->input('tahun'), 
      'APM' => $request->input('APM'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-apm_SMP'))->with('success', 'data berhasil diubah');
    }    
  }
  public function apmsmpDel($id)
  {
    $data = \DB::table('m_11_apm')->where('tahun', $id);

      $data->delete();
      return redirect(route('sosial-apm_SMP'))->with('sukses', 'Data Sudah di Hapus');
  }
 

  public function apm_SMA()
  {
    $data = \DB::table('m_11_apm')
    ->select(\DB::raw('
      tahun,
      tingkat,
      APM,
      no,
      status_data
    '))    
    ->where('no','3')
    ->orderBy('tahun', 'desc')
    ->get();
    return view('admin.sosial.sosial_apm_SMA_tampil', [
      'title' => 'Angka partisipasi Murni (APM)',
      'sumber' => 'SMA 16-18 Tahun',
      'menu_active' => 'menu-sosial',
      'sub_menu_active' => 'menu-sosial-apm',
      'page_active' => 'sosial-apm-sma',
      'data' => $data
    ]);
  }

  public function apmsmaStore(Request $request)
  {
    $this->validate($request, [ 
      'tahun' => 'required',
      'APM' => 'required', 
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_11_apm')->insert([
      'tahun' => $request->input('tahun'),
      'tingkat' => 'SMA 16-18 Tahun',      
      'APM' => $request->input('APM'),   
      'no' => '3',    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-apm_SMA'))->with('success', 'data berhasil disimpan');
  }
  public function apmsmaUpdate(Request $request, $id)
  {
    $data = \DB::table('m_11_apm')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('sosial-apm_SMA'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required',
        'APM' => 'required',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_11_apm')
      ->where('tahun', $request->input('tahun'))
      ->update([
      'tahun' => $request->input('tahun'), 
      'APM' => $request->input('APM'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-apm_SMA'))->with('success', 'data berhasil diubah');
    }    
  }
    public function apmsmaDel($id)
    {
      $data = \DB::table('m_11_apm')->where('tahun', $id);

        $data->delete();
        return redirect(route('sosial-apm_SMA'))->with('sukses', 'Data Sudah di Hapus');
    }
}
