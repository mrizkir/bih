<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class KependudukanJpbkuAdminController extends Controller
{
    public function jpbku_04Tahun()
    {
      $data = \DB::table('m_26_penduduk_umur')
      ->select(\DB::raw('
        tahun, 
        jumlah,  
        status_data
      '))    
      ->where('kelompok_umur','1')
      ->orderBy('tahun', 'desc')
      ->get(); 

      return view('admin.kependudukan.A_jpbku_04Tahun_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => '0-4 Tahun',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbku-0-4',
        'data' => $data
      ]);
    }

    public function jpbku_04TahunStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'), 
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_26_penduduk_umur')->insert([
      'tahun' => $request->input('tahun'),
      'kelompok_umur' => 1,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('A-jpbku_04'))->with('success', 'data berhasil disimpan');
  }
  public function jpbku_04TahunUpdate(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_umur')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('A-jpbku_04'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_umur')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
      'kelompok_umur' => 1,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('A-jpbku_04'))->with('success', 'data berhasil diubah');
    }    
  }
  public function jpbku_04TahunDel($id)
    {
      $data = \DB::table('m_26_penduduk_umur')->where('tahun', $id);

        $data->delete();
        return redirect(route('A-jpbku_04'))->with('sukses', 'Data Sudah di Hapus');
    }

//----------------KE 2
    public function jpbku_59Tahun()
    {
      $data = \DB::table('m_26_penduduk_umur')
      ->select(\DB::raw('
        tahun, 
        jumlah,  
        status_data
      '))    
      ->where('kelompok_umur','2')
      ->orderBy('tahun', 'desc')
      ->get(); 

      return view('admin.kependudukan.B_jpbku_59Tahun_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => '5-9 Tahun',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbku-5-9',
        'data' => $data
      ]);
    }

    public function jpbku_59TahunStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'), 
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_26_penduduk_umur')->insert([
      'tahun' => $request->input('tahun'),
      'kelompok_umur' => 2,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('B-jpbku_59'))->with('success', 'data berhasil disimpan');
  }
  public function jpbku_59TahunUpdate(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_umur')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('B-jpbku_59'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_umur')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
      'kelompok_umur' => 2,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('B-jpbku_59'))->with('success', 'data berhasil diubah');
    }    
  }
  public function jpbku_59TahunDel($id)
    {
      $data = \DB::table('m_26_penduduk_umur')->where('tahun', $id);

        $data->delete();
        return redirect(route('B-jpbku_59'))->with('sukses', 'Data Sudah di Hapus');
    }

//----------------KE 3 10-14 Tahun --------------------------------
    public function jpbku_1014Tahun()
    {
      $data = \DB::table('m_26_penduduk_umur')
      ->select(\DB::raw('
        tahun, 
        jumlah,  
        status_data
      '))    
      ->where('kelompok_umur','3')
      ->orderBy('tahun', 'desc')
      ->get(); 

      return view('admin.kependudukan.C_1014Tahun_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => '10-14 Tahun',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbku-10-14',
        'data' => $data
      ]);
    }

    public function jpbku_1014TahunStore(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'), 
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_26_penduduk_umur')->insert([
      'tahun' => $request->input('tahun'),
      'kelompok_umur' => 3,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('C-jpbku_1014'))->with('success', 'data berhasil disimpan');
  }
  public function jpbku_1014TahunUpdate(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_umur')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('C-jpbku_1014'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_umur')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
      'kelompok_umur' => 3,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('C-jpbku_1014'))->with('success', 'data berhasil diubah');
    }    
  }
  public function jpbku_1014TahunDel($id)
    {
      $data = \DB::table('m_26_penduduk_umur')->where('tahun', $id);

        $data->delete();
        return redirect(route('C-jpbku_1014'))->with('sukses', 'Data Sudah di Hapus');
    }



//----------------KE 4 15-19 Tahun --------------------------------
    public function jpbku_1519()
    {
      $data = \DB::table('m_26_penduduk_umur')
      ->select(\DB::raw('
        tahun, 
        jumlah,  
        status_data
      '))    
      ->where('kelompok_umur','4')
      ->orderBy('tahun', 'desc')
      ->get(); 

      return view('admin.kependudukan.D_jpbku_1519_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => '15-19 Tahun',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbku-15-10',
        'data' => $data
      ]);
    }

    public function jpbku_1519Store(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'), 
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_26_penduduk_umur')->insert([
      'tahun' => $request->input('tahun'),
      'kelompok_umur' => 4,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('D_jpbku_1519'))->with('success', 'data berhasil disimpan');
  }
  public function jpbku_1519Update(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_umur')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('D_jpbku_1519'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_umur')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
      'kelompok_umur' => 4,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('D_jpbku_1519'))->with('success', 'data berhasil diubah');
    }    
  }
  
  public function jpbku_1519Del($id)
    {
      $data = \DB::table('m_26_penduduk_umur')->where('tahun', $id);

        $data->delete();
        return redirect(route('D_jpbku_1519'))->with('sukses', 'Data Sudah di Hapus');
    }



//----------------KE 5 20-24 Tahun --------------------------------
    public function jpbku_2024()
    {
      $data = \DB::table('m_26_penduduk_umur')
      ->select(\DB::raw('
        tahun, 
        jumlah,  
        status_data
      '))    
      ->where('kelompok_umur','5')
      ->orderBy('tahun', 'desc')
      ->get(); 

      return view('admin.kependudukan.E_jpbku_2024Tahun_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => '20-24 Tahun',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbku-20-24',
        'data' => $data
      ]);
    }

    public function jpbku_2024Store(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'), 
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_26_penduduk_umur')->insert([
      'tahun' => $request->input('tahun'),
      'kelompok_umur' => 5,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('E-jpbku_2024'))->with('success', 'data berhasil disimpan');
  }
  public function jpbku_2024Update(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_umur')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('E-jpbku_2024'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_umur')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
      'kelompok_umur' => 5,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('E-jpbku_2024'))->with('success', 'data berhasil diubah');
    }    
  }
  
  public function jpbku_2024Del($id)
    {
      $data = \DB::table('m_26_penduduk_umur')->where('tahun', $id);

        $data->delete();
        return redirect(route('E-jpbku_2024'))->with('sukses', 'Data Sudah di Hapus');
    }



    //----------------KE 6 25-29 Tahun --------------------------------
    public function jpbku_2529()
    {
      $data = \DB::table('m_26_penduduk_umur')
      ->select(\DB::raw('
        tahun, 
        jumlah,  
        status_data
      '))    
      ->where('kelompok_umur','6')
      ->orderBy('tahun', 'desc')
      ->get(); 

      return view('admin.kependudukan.F_jpbku_2529Tahun_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => '25-29 Tahun',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbku-25-29',
        'data' => $data
      ]);
    }

    public function jpbku_2529Store(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'), 
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_26_penduduk_umur')->insert([
      'tahun' => $request->input('tahun'),
      'kelompok_umur' => 6,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('F-jpbku_2529'))->with('success', 'data berhasil disimpan');
  }
  public function jpbku_2529Update(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_umur')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('F-jpbku_2529'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_umur')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
      'kelompok_umur' => 6,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('F-jpbku_2529'))->with('success', 'data berhasil diubah');
    }    
  }
  
  public function jpbku_2529Del($id)
    {
      $data = \DB::table('m_26_penduduk_umur')->where('tahun', $id);

        $data->delete();
        return redirect(route('F-jpbku_2529'))->with('sukses', 'Data Sudah di Hapus');
    }




    //----------------KE 7 30-34 Tahun --------------------------------    
    public function jpbku_3034()
    {
      $data = \DB::table('m_26_penduduk_umur')
      ->select(\DB::raw('
        tahun, 
        jumlah,  
        status_data
      '))    
      ->where('kelompok_umur','7')
      ->orderBy('tahun', 'desc')
      ->get();  

      return view('admin.kependudukan.G_jpbku_3034Tahun_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => '30-34 Tahun',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbku-30-34',
        'data' => $data
      ]);
    }

    public function jpbku_3034Store(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'), 
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_26_penduduk_umur')->insert([
      'tahun' => $request->input('tahun'),
      'kelompok_umur' => 7,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('G-jpbku_3034'))->with('success', 'data berhasil disimpan');
  }
  public function jpbku_3034Update(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_umur')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('G-jpbku_3034'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_umur')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
      'kelompok_umur' => 7,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('G-jpbku_3034'))->with('success', 'data berhasil diubah');
    }    
  }
  
  public function jpbku_3034Del($id)
    {
      $data = \DB::table('m_26_penduduk_umur')->where('tahun', $id);

        $data->delete();
        return redirect(route('G-jpbku_3034'))->with('sukses', 'Data Sudah di Hapus');
    }

    //----------------KE 8 35-39 Tahun --------------------------------  
    public function jpbku_3539()
    {
      $data = \DB::table('m_26_penduduk_umur')
      ->select(\DB::raw('
        tahun, 
        jumlah,  
        status_data
      '))    
      ->where('kelompok_umur','8')
      ->orderBy('tahun', 'desc')
      ->get();  

      return view('admin.kependudukan.H_jpbku_3539Tahun_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => '35-39 Tahun',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbku-35-39',
        'data' => $data
      ]);
    }

    public function jpbku_3539Store(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'), 
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_26_penduduk_umur')->insert([
      'tahun' => $request->input('tahun'),
      'kelompok_umur' => 8,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('H-jpbku_3539'))->with('success', 'data berhasil disimpan');
  }
  public function jpbku_3539Update(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_umur')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('H-jpbku_3539'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_umur')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
      'kelompok_umur' => 8,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('H-jpbku_3539'))->with('success', 'data berhasil diubah');
    }    
  }
  
  public function jpbku_3539Del($id)
    {
      $data = \DB::table('m_26_penduduk_umur')->where('tahun', $id);

        $data->delete();
        return redirect(route('H-jpbku_3539'))->with('sukses', 'Data Sudah di Hapus');
    }

    //----------------KE 9 35-39 Tahun --------------------------------  
    public function jpbku_4044()
    {
      $data = \DB::table('m_26_penduduk_umur')
      ->select(\DB::raw('
        tahun, 
        jumlah,  
        status_data
      '))    
      ->where('kelompok_umur','9')
      ->orderBy('tahun', 'desc')
      ->get();  

      return view('admin.kependudukan.I_jpbku_4044Tahun_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => '40-44 Tahun',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbku-40-44',
        'data' => $data
      ]);
    }

    public function jpbku_4044Store(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'), 
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_26_penduduk_umur')->insert([
      'tahun' => $request->input('tahun'),
      'kelompok_umur' => 9,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('I-jpbku_4044'))->with('success', 'data berhasil disimpan');
  }
  public function jpbku_4044Update(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_umur')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('I-jpbku_4044'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_umur')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
      'kelompok_umur' => 9,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('I-jpbku_4044'))->with('success', 'data berhasil diubah');
    }    
  }
  
  public function jpbku_4044Del($id)
    {
      $data = \DB::table('m_26_penduduk_umur')->where('tahun', $id);

        $data->delete();
        return redirect(route('I-jpbku_4044'))->with('sukses', 'Data Sudah di Hapus');
    }

    //----------------KE 10 45-49 Tahun --------------------------------  
    public function jpbku_4549()
    {
      $data = \DB::table('m_26_penduduk_umur')
      ->select(\DB::raw('
        tahun, 
        jumlah,  
        status_data
      '))    
      ->where('kelompok_umur','10')
      ->orderBy('tahun', 'desc')
      ->get(); 

      return view('admin.kependudukan.J_jpbku_4549Tahun_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => '45-49 Tahun',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbku-45-49',
        'data' => $data
      ]);
    }

    public function jpbku_4549Store(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'), 
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_26_penduduk_umur')->insert([
      'tahun' => $request->input('tahun'),
      'kelompok_umur' => 10,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('J-jpbku_4549'))->with('success', 'data berhasil disimpan');
  }
  public function jpbku_4549Update(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_umur')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('J-jpbku_4549'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_umur')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
      'kelompok_umur' => 10,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('J-jpbku_4549'))->with('success', 'data berhasil diubah');
    }    
  }
  
  public function jpbku_4549Del($id)
    {
      $data = \DB::table('m_26_penduduk_umur')->where('tahun', $id);

        $data->delete();
        return redirect(route('J-jpbku_4549'))->with('sukses', 'Data Sudah di Hapus');
    }


    //----------------KE 11 50-54 Tahun --------------------------------  
    public function jpbku_5054()
    {
      $data = \DB::table('m_26_penduduk_umur')
      ->select(\DB::raw('
        tahun, 
        jumlah,  
        status_data
      '))    
      ->where('kelompok_umur','11')
      ->orderBy('tahun', 'desc')
      ->get(); 

      return view('admin.kependudukan.K_jpbku_5054Tahun_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => '50-54 Tahun',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbku-50-54',
        'data' => $data
      ]);
    }

    public function jpbku_5054Store(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'), 
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_26_penduduk_umur')->insert([
      'tahun' => $request->input('tahun'),
      'kelompok_umur' => 11,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('K-jpbku_5054'))->with('success', 'data berhasil disimpan');
  }
  public function jpbku_5054Update(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_umur')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('K-jpbku_5054'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_umur')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
      'kelompok_umur' => 11,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('K-jpbku_5054'))->with('success', 'data berhasil diubah');
    }    
  }
  
  public function jpbku_5054Del($id)
    {
      $data = \DB::table('m_26_penduduk_umur')->where('tahun', $id);

        $data->delete();
        return redirect(route('K-jpbku_5054'))->with('sukses', 'Data Sudah di Hapus');
    }


    //----------------KE 12 54-59 Tahun --------------------------------  
    public function jpbku_5459()
    {
      $data = \DB::table('m_26_penduduk_umur')
      ->select(\DB::raw('
        tahun, 
        jumlah,  
        status_data
      '))    
      ->where('kelompok_umur','12')
      ->orderBy('tahun', 'desc')
      ->get();  

      return view('admin.kependudukan.L_jpbku_5459Tahun_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => '54-59 Tahun',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbku-54-59',
        'data' => $data
      ]);
    }

    public function jpbku_5459Store(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'), 
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_26_penduduk_umur')->insert([
      'tahun' => $request->input('tahun'),
      'kelompok_umur' => 12,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('L-jpbku_5459'))->with('success', 'data berhasil disimpan');
  }
  public function jpbku_5459Update(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_umur')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('L-jpbku_5459'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_umur')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
      'kelompok_umur' => 12,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('L-jpbku_5459'))->with('success', 'data berhasil diubah');
    }    
  }
  
  public function jpbku_5459Del($id)
    {
      $data = \DB::table('m_26_penduduk_umur')->where('tahun', $id);

        $data->delete();
        return redirect(route('L-jpbku_5459'))->with('sukses', 'Data Sudah di Hapus');
    }


    //----------------KE 13 60 64 Tahun --------------------------------  
    public function jpbku_6064()
    {
      $data = \DB::table('m_26_penduduk_umur')
      ->select(\DB::raw('
        tahun, 
        jumlah,  
        status_data
      '))    
      ->where('kelompok_umur','13')
      ->orderBy('tahun', 'desc')
      ->get(); 

      return view('admin.kependudukan.M_jpbku_6064Tahun_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => '60-64 Tahun',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbku-60-64',
        'data' => $data
      ]);
    }

    public function jpbku_6064Store(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'), 
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_26_penduduk_umur')->insert([
      'tahun' => $request->input('tahun'),
      'kelompok_umur' => 13,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('M-jpbku_6064'))->with('success', 'data berhasil disimpan');
  }
  public function jpbku_6064Update(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_umur')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('M-jpbku_6064'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_umur')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
      'kelompok_umur' => 13,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('M-jpbku_6064'))->with('success', 'data berhasil diubah');
    }    
  }
  
  public function jpbku_6064Del($id)
    {
      $data = \DB::table('m_26_penduduk_umur')->where('tahun', $id);

        $data->delete();
        return redirect(route('M-jpbku_6064'))->with('sukses', 'Data Sudah di Hapus');
    }





    //----------------KE 14 65 69 Tahun -------------------------------- 
    public function jpbku_6569()
    {
      $data = \DB::table('m_26_penduduk_umur')
      ->select(\DB::raw('
        tahun, 
        jumlah,  
        status_data
      '))    
      ->where('kelompok_umur','14')
      ->orderBy('tahun', 'desc')
      ->get();

      return view('admin.kependudukan.N_jpbku_6569Tahun_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => '65-69 Tahun',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbku-65-69',
        'data' => $data
      ]);
    }

    public function jpbku_6569Store(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'), 
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_26_penduduk_umur')->insert([
      'tahun' => $request->input('tahun'),
      'kelompok_umur' => 14,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('N-jpbku_6569'))->with('success', 'data berhasil disimpan');
  }
  public function jpbku_6569Update(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_umur')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('N-jpbku_6569'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_umur')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
      'kelompok_umur' => 14,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('N-jpbku_6569'))->with('success', 'data berhasil diubah');
    }    
  }
  
  public function jpbku_6569Del($id)
    {
      $data = \DB::table('m_26_penduduk_umur')->where('tahun', $id);

        $data->delete();
        return redirect(route('N-jpbku_6569'))->with('sukses', 'Data Sudah di Hapus');
    }




    //----------------KE 15 65 69 Tahun -------------------------------- 
    public function jpbku_7074()
    {
      $data = \DB::table('m_26_penduduk_umur')
      ->select(\DB::raw('
        tahun, 
        jumlah,  
        status_data
      '))    
      ->where('kelompok_umur','15')
      ->orderBy('tahun', 'desc')
      ->get();

      return view('admin.kependudukan.O_jpbku_7074Tahun_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => '70-74 Tahun',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbku-70-74',
        'data' => $data
      ]);
    }

    public function jpbku_7074Store(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'), 
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]);
 
    \DB::table('m_26_penduduk_umur')->insert([
      'tahun' => $request->input('tahun'),
      'kelompok_umur' => 15,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('O-jpbku_7074'))->with('success', 'data berhasil disimpan');
  }
  public function jpbku_7074Update(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_umur')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('O-jpbku_7074'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_umur')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
      'kelompok_umur' => 15,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('O-jpbku_7074'))->with('success', 'data berhasil diubah');
    }    
  }
  
  public function jpbku_7074Del($id)
    {
      $data = \DB::table('m_26_penduduk_umur')->where('tahun', $id);

        $data->delete();
        return redirect(route('O-jpbku_7074'))->with('sukses', 'Data Sudah di Hapus');
    }


    //----------------KE 16 65 69 Tahun -------------------------------- 
    public function jpbku_75()
    {
      $data = \DB::table('m_26_penduduk_umur')
      ->select(\DB::raw('
        tahun, 
        jumlah,  
        status_data
      '))    
      ->where('kelompok_umur','16')
      ->orderBy('tahun', 'desc')
      ->get();

      return view('admin.kependudukan.P_jpbku_75Tahun_tampil', [
        'title' => 'Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)',
        'sumber' => '75+ Tahun',
        'menu_active' => 'menu-kependudukan',
        'sub_menu_active' => 'none',
        'page_active' => 'kependudukan-jpbku-75-n',
        'data' => $data
      ]);
    }

    public function jpbku_75Store(Request $request)
  {
    $this->validate($request, [
      'tahun' => 'required|numeric|digits:4|min:2020|max:'.date('Y'), 
      'jumlah' => 'required|numeric|min:0|max:100',
      'status_data' => 'required|in:1,2,3',
    ]); 
 
    \DB::table('m_26_penduduk_umur')->insert([
      'tahun' => $request->input('tahun'),
      'kelompok_umur' => 16,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
    ]); 
     
    return redirect(route('P-jpbku_75'))->with('success', 'data berhasil disimpan');
  }
  public function jpbku_75Update(Request $request, $id)
  {
    $data = \DB::table('m_26_penduduk_umur')
    ->where('tahun', $id)
    ->first();
 
    if (is_null($data))
    {
      return redirect(route('P-jpbku_75'))->with('error', 'data gagal disimpan');
    }
    else
    { 
      $this->validate($request, [        
        'jumlah' => 'required|numeric|min:0|max:100',
        'status_data' => 'required|in:1,2,3',
      ]);
      \DB::table('m_26_penduduk_umur')
      ->where('tahun', $request->input('tahun'))
      ->update([ 
      'kelompok_umur' => 16,  
      'jumlah' => $request->input('jumlah'),    
      'status_data' => $request->input('status_data'),
      ]);
      return redirect(route('P-jpbku_75'))->with('success', 'data berhasil diubah');
    }    
  }
  
  public function jpbku_75Del($id)
    {
      $data = \DB::table('m_26_penduduk_umur')->where('tahun', $id);

        $data->delete();
        return redirect(route('P-jpbku_75'))->with('sukses', 'Data Sudah di Hapus');
    }

}
