<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class VideoDvAdminController extends Controller
{
    public function dvIndex()
    {
      $data = \DB::table('m_video')
      ->select(\DB::raw('
        id,
        judul,
        link
      '))     
      ->orderBy('id', 'desc')
      ->get();
  
      return view('admin.videodv.dv_tampil', [
        'title' => 'Video Bintan (VB)',
        'sumber' => 'BPS',
        'menu_active' => 'video-bintan',
        'sub_menu_active' => 'none',
        'page_active' => 'video-dv',
        'data' => $data
      ]);
    }

    public function dvStore(Request $request)
  {
    $this->validate($request, [
      'judul' => 'required',
      'link' => 'required', 
    ]);

    \DB::table('m_video')->insert([
      'judul' => $request->input('judul'),
      'link' => $request->input('link'),       
    ]); 
     
    return redirect(route('video-dv.index'))->with('success', 'data berhasil disimpan');
  }
  public function dvUpdate(Request $request, $id)
  {
    $data = \DB::table('m_video')
    ->where('id', $id)
    ->first();
 
    if (is_null($data))
    {
      
      return redirect(route('video-dv.index'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'judul' => 'required',
        'link' => 'required', 
      ]);
      \DB::table('m_video') 
      ->where('id', $id)
      ->update([
        'judul' => $request->input('judul'),
        'link' => $request->input('link'), 
      ]);
      // dd($data);
      return redirect(route('video-dv.index'))->with('success', 'data berhasil diubah');
    }    
  }
  public function dvDel($id)
    {
      $data = \DB::table('m_video')->where('id', $id);

        $data->delete();
        return redirect(route('video-dv.index'))->with('sukses', 'Data Sudah di Hapus');
    }

}
