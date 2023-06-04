<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class SosialApkAdminController extends Controller
{
    public function apkIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.sosial.10apk_tampil', [
        'title' => 'Angka Partisipasi Kasar (APK)',
        'sumber' => 'SD 7-12 Tahun',
        'menu_active' => 'menu-sosial',
        'sub_menu_active' => 'menu-sosial-apk',
        'page_active' => 'sosial-apk-7-12',
        'data' => $data
      ]);
    }
    public function apk_SD()
    {
      $data = \DB::table('m_10_apk')
      ->select(\DB::raw('
        tahun,
        tingkat,
        APK,
        no,
        status_data
      '))    
      ->where('no','1')
      ->orderBy('tahun', 'desc')
      ->get();
  
      return view('admin.sosial.sosial_apk_SD_tampil', [
        'title' => 'Angka Partisipasi Kasar (APK)',
        'sumber' => 'SD 7-12 Tahun',
        'menu_active' => 'menu-sosial',
        'sub_menu_active' => 'menu-sosial-apk',
        'page_active' => 'sosial-apk-7-12',
        'data' => $data
      ]);
    }
    
    public function apksdStore(Request $request)
  {
    $this->validate($request, [ 
      'tahun' => 'required',
      'APK' => 'required', 
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_10_apk')->insert([
      'tahun' => $request->input('tahun'),
      'tingkat' => 'SD 7-12 TAHUN',      
      'APK' => $request->input('APK'),   
      'no' => '1',    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-apk_SD'))->with('success', 'data berhasil disimpan');
  }
  public function apksdUpdate(Request $request, $id)
  {
    $data = \DB::table('m_10_apk')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('sosial-apk_SD'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required',
        'APK' => 'required',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_10_apk')
      ->where('tahun', $request->input('tahun'))
      ->update([
      'tahun' => $request->input('tahun'), 
      'APK' => $request->input('APK'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-apk_SD'))->with('success', 'data berhasil diubah');
    }    
  }
    public function apksdDel($id)
    {
      $data = \DB::table('m_10_apk')->where('tahun', $id);

        $data->delete();
        return redirect(route('sosial-apk_SD'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function apk_SMP()
    {
      $data = \DB::table('m_10_apk')
      ->select(\DB::raw('
        tahun,
        tingkat,
        APK,
        no,
        status_data
      '))    
      ->where('no','2')
      ->orderBy('tahun', 'desc')
      ->get();
  
  
      return view('admin.sosial.sosial_apk_SMP_tampil', [
        'title' => 'Angka Partisipasi Kasar (APK)',
        'sumber' => 'SMP 13-15 Tahun',
        'menu_active' => 'menu-sosial',
        'sub_menu_active' => 'menu-sosial-apk',
        'page_active' => 'sosial-apk-13-15',
        'data' => $data
      ]);
    }


    public function apksmpStore(Request $request)
  {
    $this->validate($request, [ 
      'tahun' => 'required',
      'APK' => 'required', 
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_10_apk')->insert([
      'tahun' => $request->input('tahun'),
      'tingkat' => 'SMP 13-15 Tahun',      
      'APK' => $request->input('APK'),   
      'no' => '2',    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-apk_SMP'))->with('success', 'data berhasil disimpan');
  }
  public function apksmpUpdate(Request $request, $id)
  {
    $data = \DB::table('m_10_apk')
    ->where('tahun', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('sosial-apk_SMP'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required',
        'APK' => 'required',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_10_apk')
      ->where('tahun', $request->input('tahun'))
      ->update([
      'tahun' => $request->input('tahun'), 
      'APK' => $request->input('APK'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-apk_SMP'))->with('success', 'data berhasil diubah');
    }    
  }
    public function apksmpDel($id)
    {
      $data = \DB::table('m_10_apk')->where('tahun', $id);

        $data->delete();
        return redirect(route('sosial-apk_SMP'))->with('sukses', 'Data Sudah di Hapus');
    }
    public function apk_SMA()
    {
      $data = \DB::table('m_10_apk')
      ->select(\DB::raw('
        tahun,
        tingkat,
        APK,
        no,
        status_data
      '))    
      ->where('no','3')
      ->orderBy('tahun', 'desc')
      ->get();

      return view('admin.sosial.sosial_apk_SMA_tampil', [
        'title' => 'Angka Partisipasi Kasar (APK)',
        'sumber' => 'SMA 16-18 Tahun',
        'menu_active' => 'menu-sosial',
        'sub_menu_active' => 'menu-sosial-apk',
        'page_active' => 'sosial-apk-16-18',
        'data' => $data
      ]);
    }

    public function apksmaStore(Request $request)
  {
    $this->validate($request, [ 
      'tahun' => 'required',
      'APK' => 'required', 
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_10_apk')->insert([
      'tahun' => $request->input('tahun'),
      'tingkat' => 'SMA 16-18 Tahun',      
      'APK' => $request->input('APK'),   
      'no' => '3',    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('sosial-apk_SMA'))->with('success', 'data berhasil disimpan');
  }
  public function apksmaUpdate(Request $request, $id)
  {
    $data = \DB::table('m_10_apk')
    ->where('tahun', $id)
    ->first();

    if (is_null($data))
    {
      return redirect(route('sosial-apk_SMA'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required',
        'APK' => 'required',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_10_apk')
      ->where('tahun', $request->input('tahun'))
      ->update([
      'tahun' => $request->input('tahun'), 
      'APK' => $request->input('APK'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('sosial-apk_SMA'))->with('success', 'data berhasil diubah');
    }    
  }
    public function apksmaDel($id)
    {
      $data = \DB::table('m_10_apk')->where('tahun', $id);

        $data->delete();
        return redirect(route('sosial-apk_SMA'))->with('sukses', 'Data Sudah di Hapus');
    }
}
