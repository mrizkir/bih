<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class EkonomiAdhbAdminController extends Controller
{
   
 
  public function adhb_a()
  { 
    $data = \DB::table('m_19_pdrb_berlaku')
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

    return view('admin.ekonomi.ekonomi_adhb_A_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-a',
      'data' => $data
    ]);
  }

  public function adhb_aStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_berlaku')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 1,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhb_A'))->with('success', 'data berhasil disimpan');
  }


  public function adhb_aUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_berlaku')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhb_A'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_berlaku')
      ->where('tahun', $id)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),      
        'uraian' => 1,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhb_A'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhb_aDel($id)
    {
      $data = \DB::table('m_19_pdrb_berlaku')->where('tahun', $id);

        $data->delete();
        return redirect(route('ekonomi-adhb_A'))->with('sukses', 'Data Sudah di Hapus');
    }




  public function adhb_b()
  {
    $data = \DB::table('m_19_pdrb_berlaku')
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

    return view('admin.ekonomi.ekonomi_adhb_B_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-b',
      'data' => $data
    ]);
  }

  public function adhb_bStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_berlaku')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 2,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhb_B'))->with('success', 'data berhasil disimpan');
  }


  public function adhb_bUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_berlaku')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhb_B'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_berlaku')
      ->where('tahun', $id)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),      
        'uraian' => 2,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhb_B'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhb_bDel($id)
    {
      $data = \DB::table('m_19_pdrb_berlaku')->where('tahun', $id);

        $data->delete();
        return redirect(route('ekonomi-adhb_B'))->with('sukses', 'Data Sudah di Hapus');
    }
 

  public function adhb_c()
  {
    $data = \DB::table('m_19_pdrb_berlaku')
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

    return view('admin.ekonomi.ekonomi_adhb_C_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-c',
      'data' => $data
    ]);
  }

  public function adhb_cStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_berlaku')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 3,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhb_C'))->with('success', 'data berhasil disimpan');
  }


  public function adhb_cUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_berlaku')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhb_C'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_berlaku')
      ->where('tahun', $id)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),      
        'uraian' => 3,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhb_C'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhb_cDel($id)
    {
      $data = \DB::table('m_19_pdrb_berlaku')->where('tahun', $id);

        $data->delete();
        return redirect(route('ekonomi-adhb_C'))->with('sukses', 'Data Sudah di Hapus');
    }




  public function adhb_d()
  {
    $data = \DB::table('m_19_pdrb_berlaku')
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

    return view('admin.ekonomi.ekonomi_adhb_D_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-d',
      'data' => $data
    ]);
  }

  public function adhb_dStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_berlaku')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 4,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhb_D'))->with('success', 'data berhasil disimpan');
  }


  public function adhb_dUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_berlaku')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhb_D'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_berlaku')
      ->where('tahun', $id)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),      
        'uraian' => 4,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhb_D'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhb_dDel($id)
    {
      $data = \DB::table('m_19_pdrb_berlaku')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhb_D'))->with('sukses', 'Data Sudah di Hapus');
    }





  public function adhb_e()
  {
    $data = \DB::table('m_19_pdrb_berlaku')
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

    return view('admin.ekonomi.ekonomi_adhb_E_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-e',
      'data' => $data
    ]);
  }

  public function adhb_eStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_berlaku')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 5,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhb_E'))->with('success', 'data berhasil disimpan');
  }


  public function adhb_eUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_berlaku')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhb_E'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_berlaku')
      ->where('tahun', $id)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 5,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhb_E'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhb_eDel($id)
    {
      $data = \DB::table('m_19_pdrb_berlaku')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhb_E'))->with('sukses', 'Data Sudah di Hapus');
    }


//----------------------------------------------------------------

  public function adhb_f()
  {
    $data = \DB::table('m_19_pdrb_berlaku')
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
 
    return view('admin.ekonomi.ekonomi_adhb_F_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-f',
      'data' => $data
    ]);
  }

  public function adhb_fStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_berlaku')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 6,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhb_F'))->with('success', 'data berhasil disimpan');
  }


  public function adhb_fUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_berlaku')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhb_F'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_berlaku')
      ->where('tahun', $id)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 6,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhb_F'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhb_fDel($id)
    {
      $data = \DB::table('m_19_pdrb_berlaku')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhb_F'))->with('sukses', 'Data Sudah di Hapus');
    }





  public function adhb_g()
  {
    $data = \DB::table('m_19_pdrb_berlaku')
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
  
    return view('admin.ekonomi.ekonomi_adhb_G_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-g',
      'data' => $data
    ]);
  }

  public function adhb_gStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_berlaku')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 7,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhb_G'))->with('success', 'data berhasil disimpan');
  }
  public function adhb_gUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_berlaku')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhb_G'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_berlaku')
      ->where('tahun', $id)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 7,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhb_G'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhb_gDel($id)
    {
      $data = \DB::table('m_19_pdrb_berlaku')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhb_G'))->with('sukses', 'Data Sudah di Hapus');
    }



    public function adhb_h()
  {
    $data = \DB::table('m_19_pdrb_berlaku')
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
   
    return view('admin.ekonomi.ekonomi_adhb_H_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-h',
      'data' => $data
    ]);
  }

  public function adhb_hStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_berlaku')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 8,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhb_H'))->with('success', 'data berhasil disimpan');
  }
  public function adhb_hUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_berlaku')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhb_H'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_berlaku')
      ->where('tahun', $id)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 8,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhb_H'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhb_hDel($id)
    {
      $data = \DB::table('m_19_pdrb_berlaku')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhb_H'))->with('sukses', 'Data Sudah di Hapus');
    }



  public function adhb_i()
  {
    $data = \DB::table('m_19_pdrb_berlaku')
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
    
    return view('admin.ekonomi.ekonomi_adhb_I_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-i',
      'data' => $data
    ]);
  }

  public function adhb_iStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_berlaku')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 9,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhb_I'))->with('success', 'data berhasil disimpan');
  }
  public function adhb_iUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_berlaku')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhb_I'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_berlaku')
      ->where('tahun', $id)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 9,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhb_I'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhb_iDel($id)
    {
      $data = \DB::table('m_19_pdrb_berlaku')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhb_I'))->with('sukses', 'Data Sudah di Hapus');
    }



  public function adhb_j()
  {
    $data = \DB::table('m_19_pdrb_berlaku')
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

    return view('admin.ekonomi.ekonomi_adhb_J_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => $kt->kategori.'. '.$kt->uraian,
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-j',
      'data' => $data
    ]);
  }

  public function adhb_jStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_19_pdrb_berlaku')->insert([
      'tahun' => $request->input('tahun'),
      'jumlah' => $request->input('jumlah'),  
      'uraian' => 10,     
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('ekonomi-adhb_J'))->with('success', 'data berhasil disimpan');
  }
  public function adhb_jUpdate(Request $request, $id)
  {
    $data = \DB::table('m_19_pdrb_berlaku')
    ->where('tahun', $id)
    ->first();

    if (is_null($data)) 
    {
      return redirect(route('ekonomi-adhb_J'))->with('error', 'data gagal disimpan');
    }
    else
    {
      $this->validate($request, [        
        'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'),
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_19_pdrb_berlaku')
      ->where('tahun', $id)
      ->update([
        'tahun' => $request->input('tahun'),
        'jumlah' => $request->input('jumlah'),
        'uraian' => 10,      
        'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('ekonomi-adhb_J'))->with('success', 'data berhasil diubah');
    }    
  }
  public function adhb_jDel($id)
    {
      $data = \DB::table('m_19_pdrb_berlaku')->where('tahun', $id);
      $data->delete();
        return redirect(route('ekonomi-adhb_J'))->with('sukses', 'Data Sudah di Hapus');
    }




  public function adhb_k()
  {
    $data = DataSosialModel::orderBy('tahun', 'desc')->get();

    return view('admin.ekonomi.ekonomi_adhb_K_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => 'K. Jasa Keuangan dan Asuransi',
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-k',
      'data' => $data
    ]);
  }
  public function adhb_l()
  {
    $data = DataSosialModel::orderBy('tahun', 'desc')->get();

    return view('admin.ekonomi.ekonomi_adhb_L_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => 'L. Real Estate',
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-l',
      'data' => $data
    ]);
  }
  public function adhb_mn()
  {
    $data = DataSosialModel::orderBy('tahun', 'desc')->get();

    return view('admin.ekonomi.ekonomi_adhb_MN_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => 'M,N. Jasa Perusahaan',
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-mn',
      'data' => $data
    ]);
  }
  public function adhb_o()
  {
    $data = DataSosialModel::orderBy('tahun', 'desc')->get();

    return view('admin.ekonomi.ekonomi_adhb_O_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => 'O. Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib',
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-o',
      'data' => $data
    ]);
  }
  public function adhb_p()
  {
    $data = DataSosialModel::orderBy('tahun', 'desc')->get();

    return view('admin.ekonomi.ekonomi_adhb_P_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => 'P. Jasa Pendidikan',
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-p',
      'data' => $data
    ]);
  }
  public function adhb_q()
  {
    $data = DataSosialModel::orderBy('tahun', 'desc')->get();

    return view('admin.ekonomi.ekonomi_adhb_Q_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => 'Q. Jasa Kesehatan dan Kegiatan Sosial',
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-q',
      'data' => $data
    ]);
  }
  public function adhb_rstu()
  {
    $data = DataSosialModel::orderBy('tahun', 'desc')->get();

    return view('admin.ekonomi.ekonomi_adhb_RSTU_tampil', [
      'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
      'sumber' => 'R,S,T,U. Jasa Lainnya',
      'menu_active' => 'menu-ekonomi',
      'sub_menu_active' => 'menu-ekonomi-adhb',
      'page_active' => 'ekonomi-adhb-rstu',
      'data' => $data
    ]);
  }
}
