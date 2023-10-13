<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIEkonomiController extends Controller {  
  //EKONOMI  list uraian - [m_uraian_pdrb]
  public function uraianIndex(Request $request)
	{
    $data = \DB::table('m_uraian_pdrb AS A')
    ->select(\DB::raw('
      id,
      kategori,
      uraian
    '))            
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'EKONOMI list uraian - [m_uraian_pdrb] berhasil diperoleh',      
      'result'=>$data
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //EKONOMI  Petumbuhan Ekonomi (PE) - [m_17_ekonomi]
	public function peIndex(Request $request)
	{
    $data = \DB::table('m_17_ekonomi AS A')
    ->select(\DB::raw('
      tahun,
      pertumbuhan_ekonomi,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'asc')
    ->get();

    $last_data = \DB::table('m_17_ekonomi AS A')
    ->select(\DB::raw('      
      tahun,
      pertumbuhan_ekonomi,
      B.jenis_data AS status_data
    '))       
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'EKONOMI  Petumbuhan Ekonomi (PE) - [m_17_ekonomi] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data,
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //EKONOMI  Laju Inflasi (LI) - [m_18_inflasi]
	public function liIndex(Request $request)
	{
    $data = \DB::table('m_18_inflasi AS A')
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
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->get();

    $last_data = \DB::table('m_18_inflasi AS A')
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
      B.jenis_data AS status_data
    '))       
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'EKONOMI  Laju Inflasi (LI) - [m_18_inflasi] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //EKONOMI Distribusi PDRB Atas Dasar Harga Berlaku (ADHB) - [m_19_pdrb_berlaku]
	public function adhbIndex(Request $request)
	{
    $this->validate($request, [
      'uraian_id' => 'required|exists:m_uraian_pdrb,id'
    ]);

    $data = \DB::table('m_19_pdrb_berlaku AS A')
    ->select(\DB::raw('
      B.id,
      B.uraian,      
      A.tahun,
      jumlah,
      kategori,
      C.jenis_data AS status_data
    '))    
    ->join('m_uraian_pdrb AS B', 'A.uraian', 'B.id')
    ->join('m_jenis_data AS C', 'A.status_data', 'C.id')
    ->orderBy('tahun', 'desc')
    ->get();

    $last_data = \DB::table('m_19_pdrb_berlaku AS A')
    ->select(\DB::raw('      
      B.id,
      B.uraian,      
      A.tahun,
      jumlah,
      kategori,
      C.jenis_data AS status_data
    '))       
    ->join('m_uraian_pdrb AS B', 'A.uraian', 'B.id')
    ->join('m_jenis_data AS C', 'A.status_data', 'C.id')
    // ->where('B.id', $request->input('uraian_id'))
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'EKONOMI Distribusi PDRB Atas Dasar Harga Berlaku (ADHB) - [m_19_pdrb_berlaku] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //EKONOMI  Distribusi PDRB Atas Dasar Harga Konstan (ADHK) - [m_19_pdrb_konstan]
	public function adhkIndex(Request $request)
	{
    $this->validate($request, [
      'uraian_id' => 'required|exists:m_uraian_pdrb,id'
    ]);

    $data = \DB::table('m_19_pdrb_konstan AS A')
    ->select(\DB::raw('
      B.id,
      B.uraian,      
      A.tahun,
      jumlah,
      kategori,
      C.jenis_data AS status_data
    '))    
    ->join('m_uraian_pdrb AS B', 'A.uraian', 'B.id')
    ->join('m_jenis_data AS C', 'A.status_data', 'C.id')
    // ->where('B.id', $request->input('uraian_id'))
    ->orderBy('tahun', 'desc')
    ->get();

    $last_data = \DB::table('m_19_pdrb_konstan AS A')
    ->select(\DB::raw('      
      B.id,
      B.uraian,      
      A.tahun,
      jumlah,
      kategori,
      C.jenis_data AS status_data
    '))       
    ->join('m_uraian_pdrb AS B', 'A.uraian', 'B.id')
    ->join('m_jenis_data AS C', 'A.status_data', 'C.id')
    // ->where('B.id', $request->input('uraian_id'))
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'EKONOMI  Distribusi PDRB Atas Dasar Harga Konstan (ADHK) - [m_19_pdrb_konstan] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //EKONOMI Kunjungan Wisata (KW) - [m_20_kunjungan]
	public function kwIndex(Request $request)
	{
    $data = \DB::table('m_20_kunjungan AS A')
    ->select(\DB::raw('
      tahun,
      mancanegara,
      nusantara,
      jumlah,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->get();

    $last_data = \DB::table('m_20_kunjungan AS A')
    ->select(\DB::raw('      
      tahun,
      mancanegara,
      nusantara,
      jumlah,
      B.jenis_data AS status_data
    '))       
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'EKONOMI Kunjungan Wisata (KW) - [m_20_kunjungan] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  //EKONOMI Realisasi Investasi (PMA/ PMDN) - [m_35_pma]
	public function pmaIndex(Request $request)
	{
    $data = \DB::table('m_35_pma AS A')
    ->select(\DB::raw('
      tahun,
      jumlah,
      B.jenis_data AS status_data
    '))    
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->get();

    $last_data = \DB::table('m_35_pma AS A')
    ->select(\DB::raw('      
      tahun,
      jumlah,
      B.jenis_data AS status_data
    '))       
    ->join('m_jenis_data AS B', 'A.status_data', 'B.id')
    ->orderBy('tahun', 'desc')
    ->limit(1)
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'EKONOMI Realisasi Investasi (PMA/ PMDN) - [m_35_pma] berhasil diperoleh',
      'last_data'=>$last_data,
      'result'=>$data
    ], 200)->setEncodingOptions(JSON_NUMERIC_CHECK);
  }
  
}