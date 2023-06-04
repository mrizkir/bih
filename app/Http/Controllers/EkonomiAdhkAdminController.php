<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSosialModel;

class EkonomiAdhkAdminController extends Controller
{
    public function adhkIndex()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get();
  
      return view('admin.ekonomi.4adhk_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'BPS',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk',
        'data' => $data
      ]);
    }
    public function adhk_a()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_A_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'A. Pertanian, Kehutanan dan Perikanan',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-a',
        'data' => $data
      ]);
    }
    public function adhk_b()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_B_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'B. Pertambangan dan Penggalian',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-b',
        'data' => $data
      ]);
    }
    public function adhk_c()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_C_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'C. Industri Pengolahan',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-c',
        'data' => $data
      ]);
    }
    public function adhk_d()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_D_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'D. Pengadaan Listrik dan Gas',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-d',
        'data' => $data
      ]);
    }
    public function adhk_e()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_E_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'E. Pengadaan Air, Pengelolaan Sampah, Limbah dan Daur Ulang',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-e',
        'data' => $data
      ]);
    }
    public function adhk_f()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_F_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'F. Konstruksi',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-f',
        'data' => $data
      ]);
    }
    public function adhk_g()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_G_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'G. Perdagangan Besar dan Eceran, Reparasi Mobil dan Sepeda Motor',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-g',
        'data' => $data
      ]);
    }
    public function adhk_h()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_H_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'H. Transportasi dan Pergudangan',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-h',
        'data' => $data
      ]);
    }
    public function adhk_i()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_I_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'I. Penyediaan Akomodasi dan Makan Minum',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-i',
        'data' => $data
      ]);
    }
    public function adhk_j()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_J_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'J. Informasi dan Komunikasi',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-j',
        'data' => $data
      ]);
    }
    public function adhk_k()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_K_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'K. Jasa Keuangan dan Asuransi',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-k',
        'data' => $data
      ]);
    }
    public function adhk_l()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_L_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'L. Real Estate',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-l',
        'data' => $data
      ]);
    }
    public function adhk_mn()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_MN_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'M,N. Jasa Perusahaan',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-mn',
        'data' => $data
      ]);
    }
    public function adhk_o()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_O_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'O. Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-o',
        'data' => $data
      ]);
    }
    public function adhk_p()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_P_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'P. Jasa Pendidikan',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-p',
        'data' => $data
      ]);
    }
    public function adhk_q()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_Q_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'Q. Jasa Kesehatan dan Kegiatan Sosial',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-q',
        'data' => $data
      ]);
    }
    public function adhk_rstu()
    {
      $data = DataSosialModel::orderBy('tahun', 'desc')->get(); 

      return view('admin.ekonomi.ekonomi_adhk_RSTU_tampil', [
        'title' => 'Distribusi PDRB Atas Dasar Harga Konstan (ADHK)',
        'sumber' => 'R,S,T,U. Jasa Lainnya',
        'menu_active' => 'menu-ekonomi',
        'sub_menu_active' => 'menu-ekonomi-adhk',
        'page_active' => 'ekonomi-adhk-rstu',
        'data' => $data
      ]);
    }
}
