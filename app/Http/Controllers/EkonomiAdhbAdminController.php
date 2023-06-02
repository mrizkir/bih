<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class EkonomiAdhbAdminController extends Controller
{
    public function adhbIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.3adhb_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'BPS',
        'data' => $data
      ]);
    }

    public function adhb_a()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_A_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'A. Pertanian, Kehutanan dan Perikanan',
        'data' => $data
      ]);
    }
    public function adhb_b()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_B_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'B. Pertambangan dan Penggalian',
        'data' => $data
      ]);
    }
    public function adhb_c()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_C_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'C. Industri Pengolahan',
        'data' => $data
      ]);
    }
    public function adhb_d()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_D_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'D. Pengadaan Listrik dan Gas',
        'data' => $data
      ]);
    }
    public function adhb_e()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_E_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'E. Pengadaan Air, Pengelolaan Sampah, Limbah dan Daur Ulang',
        'data' => $data
      ]);
    }
    public function adhb_f()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_F_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'F. Konstruksi',
        'data' => $data
      ]);
    }
    public function adhb_g()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_G_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'G. Perdagangan Besar dan Eceran, Reparasi Mobil dan Sepeda Motor',
        'data' => $data
      ]);
    }
    public function adhb_h()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_H_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'H. Transportasi dan Pergudangan',
        'data' => $data
      ]);
    }
    public function adhb_i()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_I_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'I. Penyediaan Akomodasi dan Makan Minum',
        'data' => $data
      ]);
    }
    public function adhb_j()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_J_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'J. Informasi dan Komunikasi',
        'data' => $data
      ]);
    }
    public function adhb_k()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_K_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'K. Jasa Keuangan dan Asuransi',
        'data' => $data
      ]);
    }
    public function adhb_l()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_L_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'L. Real Estate',
        'data' => $data
      ]);
    }
    public function adhb_mn()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_MN_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'M,N. Jasa Perusahaan',
        'data' => $data
      ]);
    }
    public function adhb_o()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_O_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'O. Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib',
        'data' => $data
      ]);
    }
    public function adhb_p()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_P_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'P. Jasa Pendidikan',
        'data' => $data
      ]);
    }
    public function adhb_q()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_Q_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'Q. Jasa Kesehatan dan Kegiatan Sosial',
        'data' => $data
      ]);
    }
    public function adhb_rstu()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.ekonomi_adhb_RSTU_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)',
        'sumber' => 'R,S,T,U. Jasa Lainnya',
        'data' => $data
      ]);
    } 
}
