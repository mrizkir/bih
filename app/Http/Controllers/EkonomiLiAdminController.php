<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class EkonomiLiAdminController extends Controller
{
    public function liIndex()
    {
      $data = \DB::table('m_18_inflasi')
      ->select(\DB::raw('
        tahun, 
        umum,
        bahan_makanan,
        makanan_jadi,
        perumahan,
        sandang,
        kesehatan,
        pendidikan,
        transportasi,
        status_data
      '))     
      ->orderBy('tahun', 'desc')
      ->get();
   
      return view('admin.ekonomi.2li_tampil', [
        'title' => 'Laju Inflasi (LI)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'none',
        'page_active' => 'ekonomi-li',
        'data' => $data
      ]);
    }

    public function liStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'umum' => 'required|numeric|min:0',
      'bahan_makanan' => 'required|numeric|min:0',
      'makanan_jadi' => 'required|numeric|min:0',
      'perumahan' => 'required|numeric|min:0',
      'sandang' => 'required|numeric|min:0',
      'kesehatan' => 'required|numeric|min:0',
      'pendidikan' => 'required|numeric|min:0',
      'transportasi' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]); 
  
    \DB::table('m_18_inflasi')->insert([
      'tahun' => $request->input('tahun'),
      'umum' => $request->input('umum'),     
      'bahan_makanan' => $request->input('bahan_makanan'),
      'makanan_jadi' => $request->input('makanan_jadi'),    
      'perumahan' => $request->input('perumahan'),
      'sandang' => $request->input('sandang'),    
      'kesehatan' => $request->input('kesehatan'),
      'pendidikan' => $request->input('pendidikan'),    
      'transportasi' => $request->input('transportasi'), 
      'status_data' => $request->input('status_data'),
    ]); 
      
    return redirect(route('ekonomi-li.index'))->with('success', 'data berhasil disimpan');
  }
  public function liUpdate(Request $request, $id)
  {
    $data = \DB::table('m_18_inflasi')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-li.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [         
      'umum' => 'required|numeric|min:0',
      'bahan_makanan' => 'required|numeric|min:0',
      'makanan_jadi' => 'required|numeric|min:0',
      'perumahan' => 'required|numeric|min:0',
      'sandang' => 'required|numeric|min:0',
      'kesehatan' => 'required|numeric|min:0',
      'pendidikan' => 'required|numeric|min:0',
      'transportasi' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_18_inflasi')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
        'umum' => $request->input('umum'),     
        'bahan_makanan' => $request->input('bahan_makanan'),
        'makanan_jadi' => $request->input('makanan_jadi'),    
        'perumahan' => $request->input('perumahan'),
        'sandang' => $request->input('sandang'),    
        'kesehatan' => $request->input('kesehatan'),
        'pendidikan' => $request->input('pendidikan'),    
        'transportasi' => $request->input('transportasi'), 
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-li.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function liDel($id)
    {
      $data = \DB::table('m_18_inflasi')->where('tahun', $id);

        $data->delete();
        return redirect(route('ekonomi-li.index'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function liCetak()
  {
    $data = \DB::table('m_18_inflasi')
    ->select(\DB::raw('
    tahun, 
    umum,
    bahan_makanan,
    makanan_jadi,
    perumahan,
    sandang,
    kesehatan,
    pendidikan,
    transportasi,
    status_data
  '))     
  ->orderBy('tahun', 'desc')
  ->get();

    return view('admin.ekonomi.2licetak', [
      'title' => 'Laju Inflasi (LI)',
      'sumber' => 'BPS',
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'none',
      'page_active' => 'ekonomi-li',
      'data' => $data
    ]);
  }
}
