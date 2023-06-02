<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIEkonomiController extends Controller {  
  //EKONOMI  Petumbuhan Ekonomi (PE) - [m_17_ekonomi]
	public function peIndex(Request $request)
	{
    $data = \DB::table('m_17_ekonomi')
    ->select(\DB::raw('
      tahun,
      pertumbuhan_ekonomi,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'EKONOMI  Petumbuhan Ekonomi (PE) - [m_17_ekonomi] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //EKONOMI  Laju Inflasi (LI) - [m_18_inflasi]
	public function liIndex(Request $request)
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

    return response()->json([
      'status'=>'100',
      'message'=>'EKONOMI  Laju Inflasi (LI) - [m_18_inflasi] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //EKONOMI Distribusi PDRB Atas Dasar Harga Berlaku (ADHB) - [m_19_pdrb_berlaku]
	public function adhbIndex(Request $request)
	{
    $data = \DB::table('m_19_pdrb_berlaku AS a')
    ->select(\DB::raw('
      b.id,
      b.uraian,      
      jumlah,
      kategori,
      status_data
    '))    
    ->join('m_uraian_pdrb AS b', 'a.uraian', 'b.id')
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'EKONOMI Distribusi PDRB Atas Dasar Harga Berlaku (ADHB) - [m_19_pdrb_berlaku] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //EKONOMI  Distribusi PDRB Atas Dasar Harga Konstan (ADHK) - [m_19_pdrb_konstan]
	public function adhkIndex(Request $request)
	{
    $data = \DB::table('m_19_pdrb_konstan AS a')
    ->select(\DB::raw('
      b.id,
      b.uraian,      
      jumlah,
      kategori,
      status_data
    '))    
    ->join('m_uraian_pdrb AS b', 'a.uraian', 'b.id')
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'EKONOMI  Distribusi PDRB Atas Dasar Harga Konstan (ADHK) - [m_19_pdrb_konstan] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //EKONOMI Kunjungan Wisata (KW) - [m_20_kunjungan]
	public function kwIndex(Request $request)
	{
    $data = \DB::table('m_20_kunjungan')
    ->select(\DB::raw('
      tahun,
      mancanegara,
      nusantara,
      jumlah,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'EKONOMI Kunjungan Wisata (KW) - [m_20_kunjungan] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  //EKONOMI Realisasi Investasi (PMA/ PMDN) - [m_35_pma]
	public function pmaIndex(Request $request)
	{
    $data = \DB::table('m_35_pma')
    ->select(\DB::raw('
      tahun,
      jumlah,
      status_data
    '))    
    ->orderBy('tahun', 'desc')
    ->get();

    return response()->json([
      'status'=>'100',
      'message'=>'EKONOMI Realisasi Investasi (PMA/ PMDN) - [m_35_pma] berhasil diperoleh',
      'result'=>$data
    ], 200);
  }
  
}