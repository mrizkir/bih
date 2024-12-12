<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class EkonomiAdhkAdminController extends Controller
{
    
 
  public function adhk_a()
  { 
    $data = \DB::table('m_19_pdrb_konstan')
      ->select(\DB::raw('  
        tahun,
        jumlah,
        status_data,
        uraian
      '))    
      ->where('uraian',1)
      ->orderBy('tahun', 'desc')
      ->get();

      $kt = \DB::table('m_uraian_pdrb')
      ->where('id', $data[0]->uraian)
      ->first();

    return view('admin.ekonomi.ekonomi_adhk_A_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-a',
      'data' => $data
    ]);
  }

  public function adhk_aStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 1,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_A'))->with('success', 'data berhasil disimpan');
  }


  public function adhk_aUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_A'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 1)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),      
        'uraian' => 1,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_A'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_aDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);

        $data->delete();
        return redirect(route('ekonomi-adhk_A'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function adhk_aCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',1)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_Acetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-a',
      'data' => $data
    ]);
  }
    
//----------------------------------------------------------------



  public function adhk_b()
  {
    $data = \DB::table('m_19_pdrb_konstan')
      ->select(\DB::raw('
        tahun,
        jumlah,
        status_data,
        uraian
      '))    
      ->where('uraian',2)
      ->orderBy('tahun', 'desc')
      ->get();
 
      $kt = \DB::table('m_uraian_pdrb')
      ->where('id', $data[0]->uraian)
      ->first();

    return view('admin.ekonomi.ekonomi_adhk_B_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-b',
      'data' => $data
    ]);
  }

  public function adhk_bStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 2,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_B'))->with('success', 'data berhasil disimpan');
  }


  public function adhk_bUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_B'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 2)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),      
        'uraian' => 2,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_B'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_bDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);

        $data->delete();
        return redirect(route('ekonomi-adhk_B'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function adhk_bCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',2)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_Bcetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-b',
      'data' => $data
    ]);
  }
    
//----------------------------------------------------------------

  public function adhk_c()
  {
    $data = \DB::table('m_19_pdrb_konstan')
      ->select(\DB::raw('
        tahun,
        jumlah,
        status_data,
        uraian
      '))    
      ->where('uraian',3)
      ->orderBy('tahun', 'desc')
      ->get();
 
      $kt = \DB::table('m_uraian_pdrb')
      ->where('id', $data[0]->uraian)
      ->first();

    return view('admin.ekonomi.ekonomi_adhk_C_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-c',
      'data' => $data
    ]);
  }

  public function adhk_cStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 3,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_C'))->with('success', 'data berhasil disimpan');
  }


  public function adhk_cUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_C'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 3)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),      
        'uraian' => 3,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_C'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_cDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);

        $data->delete();
        return redirect(route('ekonomi-adhk_C'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function adhk_cCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',3)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_Ccetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-c',
      'data' => $data
    ]);
  }
    
//----------------------------------------------------------------



  public function adhk_d()
  {
    $data = \DB::table('m_19_pdrb_konstan')
      ->select(\DB::raw('  
        tahun,
        jumlah,
        status_data,
        uraian
      '))    
      ->where('uraian',4)
      ->orderBy('tahun', 'desc')
      ->get();

      $kt = \DB::table('m_uraian_pdrb')
      ->where('id', $data[0]->uraian)
      ->first();

    return view('admin.ekonomi.ekonomi_adhk_D_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-d',
      'data' => $data
    ]);
  }

  public function adhk_dStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 4,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_D'))->with('success', 'data berhasil disimpan');
  }


  public function adhk_dUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_D'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 4)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),      
        'uraian' => 4,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_D'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_dDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhk_D'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function adhk_dCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',4)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_Dcetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-d',
      'data' => $data
    ]);
  }
    
//----------------------------------------------------------------




  public function adhk_e()
  {
    $data = \DB::table('m_19_pdrb_konstan')
      ->select(\DB::raw('  
        tahun,
        jumlah,
        status_data,
        uraian
      '))    
      ->where('uraian',5)
      ->orderBy('tahun', 'desc')
      ->get();

      $kt = \DB::table('m_uraian_pdrb')
      ->where('id', $data[0]->uraian)
      ->first();

    return view('admin.ekonomi.ekonomi_adhk_E_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-e',
      'data' => $data
    ]);
  }

  public function adhk_eStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 5,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_E'))->with('success', 'data berhasil disimpan');
  }


  public function adhk_eUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_E'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 5)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 5,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_E'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_eDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhk_E'))->with('sukses', 'Data Sudah di Hapus');
    }


    public function adhk_eCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',5)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_Ecetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-e',
      'data' => $data
    ]);
  }
    
//----------------------------------------------------------------

  public function adhk_f()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('  
      tahun,
      jumlah,
      status_data,
      uraian
    '))    
    ->where('uraian',6)
    ->orderBy('tahun', 'desc')
    ->get();

    $kt = \DB::table('m_uraian_pdrb')
    ->where('id', $data[0]->uraian)
    ->first();
 
    return view('admin.ekonomi.ekonomi_adhk_F_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-f',
      'data' => $data
    ]);
  }

  public function adhk_fStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 6,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_F'))->with('success', 'data berhasil disimpan');
  }


  public function adhk_fUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_F'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 6)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 6,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_F'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_fDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhk_F'))->with('sukses', 'Data Sudah di Hapus');
    }


    public function adhk_fCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',6)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_Fcetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-f',
      'data' => $data
    ]);
  }
    
//----------------------------------------------------------------



  public function adhk_g()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('  
      tahun,
      jumlah,
      status_data,
      uraian
    '))    
    ->where('uraian',7)
    ->orderBy('tahun', 'desc')
    ->get();

    $kt = \DB::table('m_uraian_pdrb')
    ->where('id', $data[0]->uraian)
    ->first();
  
    return view('admin.ekonomi.ekonomi_adhk_G_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-g',
      'data' => $data
    ]);
  }

  public function adhk_gStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 7,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_G'))->with('success', 'data berhasil disimpan');
  }
  public function adhk_gUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_G'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 7)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 7,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_G'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_gDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhk_G'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function adhk_gCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',7)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_Gcetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-g',
      'data' => $data
    ]);
  }

//----------------------------------------------------------------

    public function adhk_h()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('  
      tahun,
      jumlah,
      status_data,
      uraian
    '))    
    ->where('uraian',8)
    ->orderBy('tahun', 'desc')
    ->get();

    $kt = \DB::table('m_uraian_pdrb')
    ->where('id', $data[0]->uraian)
    ->first();
   
    return view('admin.ekonomi.ekonomi_adhk_H_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-h',
      'data' => $data
    ]);
  }

  public function adhk_hStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 8,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_H'))->with('success', 'data berhasil disimpan');
  }
  public function adhk_hUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_H'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 8)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 8,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_H'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_hDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhk_H'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function adhk_hCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',8)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_Hcetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-h',
      'data' => $data
    ]);
  }

  //----------------------------------------------------------------


  public function adhk_i()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('  
      tahun,
      jumlah,
      status_data,
      uraian
    '))    
    ->where('uraian',9)
    ->orderBy('tahun', 'desc')
    ->get();

    $kt = \DB::table('m_uraian_pdrb')
    ->where('id', $data[0]->uraian)
    ->first();
    
    return view('admin.ekonomi.ekonomi_adhk_I_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-i',
      'data' => $data
    ]);
  }

  public function adhk_iStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 9,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_I'))->with('success', 'data berhasil disimpan');
  }
  public function adhk_iUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_I'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 9)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 9,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_I'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_iDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhk_I'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function adhk_iCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',9)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_Icetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-i',
      'data' => $data
    ]);
  }

  //----------------------------------------------------------------


  public function adhk_j()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('  
      tahun,
      jumlah,
      status_data,
      uraian
    '))    
    ->where('uraian',10)
    ->orderBy('tahun', 'desc')
    ->get();

    $kt = \DB::table('m_uraian_pdrb')
    ->where('id', $data[0]->uraian)
    ->first(); 

    return view('admin.ekonomi.ekonomi_adhk_J_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-j',
      'data' => $data
    ]);
  }

  public function adhk_jStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 10,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_J'))->with('success', 'data berhasil disimpan');
  }
  public function adhk_jUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_J'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 10)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 10,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_J'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_jDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhk_J'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function adhk_jCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',10)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_Jcetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-j',
      'data' => $data
    ]);
  }

  //----------------------------------------------------------------



  public function adhk_k()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('  
      tahun,
      jumlah,
      status_data,
      uraian
    '))    
    ->where('uraian',11)
    ->orderBy('tahun', 'desc')
    ->get();

    $kt = \DB::table('m_uraian_pdrb')
    ->where('id', $data[0]->uraian)
    ->first(); 

    return view('admin.ekonomi.ekonomi_adhk_K_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-k',
      'data' => $data
    ]);
  }

  public function adhk_kStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 11,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_K'))->with('success', 'data berhasil disimpan');
  }
  public function adhk_kUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_K'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 11)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 11,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_K'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_kDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhk_K'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function adhk_kCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',11)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_Kcetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-k',
      'data' => $data
    ]);
  }

  //----------------------------------------------------------------




  public function adhk_l()
  {
     $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('  
      tahun,
      jumlah,
      status_data,
      uraian
    '))    
    ->where('uraian',12)
    ->orderBy('tahun', 'desc')
    ->get();

    $kt = \DB::table('m_uraian_pdrb')
    ->where('id', $data[0]->uraian)
    ->first(); 

    return view('admin.ekonomi.ekonomi_adhk_L_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)', 
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-l',
      'data' => $data
    ]);
  }

  public function adhk_lStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 12,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_L'))->with('success', 'data berhasil disimpan');
  }
  public function adhk_lUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_L'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 12)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 12,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_L'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_lDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhk_L'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function adhk_lCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',12)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_Lcetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-l',
      'data' => $data
    ]);
  }

  //----------------------------------------------------------------




  public function adhk_mn()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('  
      tahun,
      jumlah,
      status_data,
      uraian
    '))    
    ->where('uraian',13)
    ->orderBy('tahun', 'desc')
    ->get();

    $kt = \DB::table('m_uraian_pdrb')
    ->where('id', $data[0]->uraian)
    ->first();  

    return view('admin.ekonomi.ekonomi_adhk_MN_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-mn',
      'data' => $data
    ]);
  }

  public function adhk_mnStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 13,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_MN'))->with('success', 'data berhasil disimpan');
  }
  public function adhk_mnUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_MN'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 13)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 13,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_MN'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_mnDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhk_MN'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function adhk_mnCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',13)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_MNcetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-mn',
      'data' => $data
    ]);
  }

  //----------------------------------------------------------------



  public function adhk_o()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('  
      tahun,
      jumlah,
      status_data,
      uraian
    '))    
    ->where('uraian',14)
    ->orderBy('tahun', 'desc')
    ->get();

    $kt = \DB::table('m_uraian_pdrb')
    ->where('id', $data[0]->uraian)
    ->first();  

  
    return view('admin.ekonomi.ekonomi_adhk_O_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-o',
      'data' => $data
    ]);
  }

  public function adhk_oStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 14,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_O'))->with('success', 'data berhasil disimpan');
  }
  public function adhk_oUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_O'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 14)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 14,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_O'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_oDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhk_O'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function adhk_oCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',14)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_Ocetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-o',
      'data' => $data
    ]);
  }

  //----------------------------------------------------------------



  public function adhk_p()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('  
      tahun,
      jumlah,
      status_data,
      uraian
    '))    
    ->where('uraian',15)
    ->orderBy('tahun', 'desc')
    ->get();

    $kt = \DB::table('m_uraian_pdrb')
    ->where('id', $data[0]->uraian)
    ->first();  
 

    return view('admin.ekonomi.ekonomi_adhk_P_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-p',
      'data' => $data
    ]);
  }

  public function adhk_pStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 15,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_P'))->with('success', 'data berhasil disimpan');
  }
  public function adhk_pUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_P'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 15)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 15,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_P'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_pDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhk_P'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function adhk_pCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',15)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_Pcetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-p',
      'data' => $data
    ]);
  }

  //----------------------------------------------------------------




  public function adhk_q()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('  
      tahun,
      jumlah,
      status_data,
      uraian
    '))    
    ->where('uraian',16)
    ->orderBy('tahun', 'desc')
    ->get();

    $kt = \DB::table('m_uraian_pdrb')
    ->where('id', $data[0]->uraian)
    ->first();   

    return view('admin.ekonomi.ekonomi_adhk_Q_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-q',
      'data' => $data
    ]);
  }

  public function adhk_qStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 16,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_Q'))->with('success', 'data berhasil disimpan');
  }
  public function adhk_qUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_Q'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 16)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 16,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_Q'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_qDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhk_Q'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function adhk_qCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',16)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_Qcetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-q',
      'data' => $data
    ]);
  }

  //----------------------------------------------------------------




  public function adhk_rstu()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('  
      tahun,
      jumlah,
      status_data,
      uraian
    '))    
    ->where('uraian',17)
    ->orderBy('tahun', 'desc')
    ->get();

    $kt = \DB::table('m_uraian_pdrb')
    ->where('id', $data[0]->uraian)
    ->first();    

    return view('admin.ekonomi.ekonomi_adhk_RSTU_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-rstu',
      'data' => $data
    ]);
  }

  public function adhk_rstuStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_konstan')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 17,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhk_RSTU'))->with('success', 'data berhasil disimpan');
  }
  public function adhk_rstuUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhk_RSTU'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2016|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_konstan')
      ->where('tahun', $id)
      ->where('uraian', 17)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 17,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhk_RSTU'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhk_rstuDel($id)
    {
      $data = \DB::table('m_19_pdrb_konstan')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhk_RSTU'))->with('sukses', 'Data Sudah di Hapus');
    }

    public function adhk_rstuCetak()
  {
    $data = \DB::table('m_19_pdrb_konstan')
    ->select(\DB::raw('
    tahun,
    jumlah,
    status_data,
    uraian
  '))    
  ->where('uraian',17)
  ->orderBy('tahun', 'desc')
  ->get();

  $kt = \DB::table('m_uraian_pdrb')
  ->where('id', $data[0]->uraian)
  ->first();

    return view('admin.ekonomi.ekonomi_adhb_RSTUcetak', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHK)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhk',
      'page_active' => 'ekonomi-adhk-rstu',
      'data' => $data
    ]);
  }

  //----------------------------------------------------------------

}
