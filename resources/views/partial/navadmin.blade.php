<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    {{-- <li class="nav-item d-none d-sm-inline-block">
<a href="{{ '/depan' }}" class="nav-link">Home</a>
  </li> --}}
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true"
        href="{{ route('dashboard') }}" role="button" style="font-size: 12px;">
        Selamat Datang, <b> {!! Auth::user()->username !!} </b>&nbsp;&nbsp;
        <i class="fas fa-th-large" style="color:rgb(0, 136, 255);"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ '/dashboard' }}" class="brand-link">
    {{-- <img src="{{ asset('administrator/dist/img/AdminLTELogo.png') }}" alt="MDA" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
    <center>
      <span class="brand-text font-weight-light" style="font-size:12px;">Selamat Datang</span>
    </center>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('administrator/img_mda/admin.jpeg') }}" class="img-circle elevation-2"
          alt="Image Kosong">
      </div>
      <div class="info">
        <a href="#" class="d-block">Administrator</a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <img src="{{ asset('administrator/img_mda/h1.png') }}" style="width:12%;margin:3px;">
            <p style="font-size: 10px;">SOSIAL<i class="fas fa-angle-left right"
                style="margin-top: 10px;"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('sosial-ppm.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Presentasi Penduduk Miskin (PPM)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('sosial-ipm.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Indeks Pembangunan Manusia (IPM) </p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('sosial-rls.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Angka Rata-Rata Lama Sekolah (RLS)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('sosial-ahm.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Angka Melek Huruf (AMH)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('sosial-ahh.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Angka Harapan Hidup (AHH)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('sosial-akhb.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Angka Kelangsungan Hidup Bayi (AKHB)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('sosial-akim.index') }}" class="nav-link">
                <div style="width:30px;height:55px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Angka Kematian Ibu Melahirkan per 100.000 kelahiran hidup
                  (AKIM)
                </p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('sosial-pkk.index') }}" class="nav-link">
                <div style="width:30px;height:50px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Perkembangan Kondisi Ketenagakerjaan di Kabupaten Bintan
                  (PKK)
                </p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('sosial-ipg.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Indeks Pembangunan Gender (IPG)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Angka Partisipasi Kasar (APK)<i
                    class="fas fa-angle-left right" style="margin-top: 5px;"></i></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('sosial-apk_SD') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">SD 7-12 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('sosial-apk_SMP') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">SMP 13-15 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('sosial-apk_SMA') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">SMA 16-18 Tahun</p>
                  </a>
                </li>
              </ul>

            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Angka partisipasi Murni (APM)<i
                    class="fas fa-angle-left right" style="margin-top: 5px;"></i></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('sosial-apm_SD') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">SD 7-12 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('sosial-apm_SMP') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">SMP 13-15 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('sosial-apm_SMA') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">SMA 16-18 Tahun</p>
                  </a>
                </li>
              </ul>

            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('sosial-hls.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Angka Harapan Lama Sekolah (HLS)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('sosial-jrtlh.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Jumlah rumah tidak layak huni yang direhab (JRTLH)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('sosial-ig.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Indeks Gini (IG)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('sosial-idb.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Indeks Daya Beli - Purchasing Power Parity (IDB)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('sosial-ppu.index') }}" class="nav-link">
                <div style="width:30px;height:75px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Persentase Penduduk Usia 15 Tahun ke atas menurut
                  Pendidikan yang Ditamatkan (PPU)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('sosial-ipgg.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Indeks Pemeberdayaan Gender (IPGG)</p>
              </a>
            </li>
          </ul>


        </li>

        <li class="nav-item{!!Helper::isMenuActive ($menu_active,'menu-ekonomi',' menu-open')!!}">
          <a href="#" class="nav-link{!!Helper::isMenuActive ($menu_active,'menu-ekonomi',' active')!!}">
            <img src="{{ asset('administrator/img_mda/h2.png') }}" style="width:12%;margin:3px;">
            <p style="font-size: 10px;">EKONOMI<i class="fas fa-angle-left right"
                style="margin-top: 10px;"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('ekonomi-pe.index') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-pe',' active')!!}">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Petumbuhan Ekonomi (PE)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('ekonomi-li.index') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-li',' active')!!}">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Laju Inflasi (LI)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item{!!Helper::isMenuActive ($sub_menu_active,'menu-ekonomi-adhb',' menu-open')!!}">
              <a href="" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)<i
                    class="fas fa-angle-left right" style="margin-top: 5px;"></i></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_A') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-a',' active')!!}">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">A. Pertanian, Kehutanan dan Perikanan</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_B') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-b',' active')!!}">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">B. Pertambangan dan Penggalian</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_C') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-c',' active')!!}">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">C. Industri Pengolahan</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_D') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-d',' active')!!}">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">D. Pengadaan Listrik dan Gas</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_E') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-e',' active')!!}">
                    <div style="width:30px;height:55px;float:left;"></div>
                    <p style="font-size: 12px;">E. Pengadaan Air, Pengelolaan Sampah, Limbah dan
                      Daur Ulang</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_F') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-f',' active')!!}">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">F. Konstruksi</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_G') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-g',' active')!!}">
                    <div style="width:30px;height:55px;float:left;"></div>
                    <p style="font-size: 12px;">G. Perdagangan Besar dan Eceran, Reparasi Mobil dan
                      Sepeda Motor</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_H') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-h',' active')!!}">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">H. Transportasi dan Pergudangan</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_I') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-i',' active')!!}">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">I. Penyediaan Akomodasi dan Makan Minum</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_J') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-j',' active')!!}">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">J. Informasi dan Komunikasi</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_K') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-k',' active')!!}">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">K. Jasa Keuangan dan Asuransi</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_L') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-l',' active')!!}">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">L. Real Estate</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_MN') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-mn',' active')!!}">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">M,N. Jasa Perusahaan</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_O') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-o',' active')!!}">
                    <div style="width:30px;height:55px;float:left;"></div>
                    <p style="font-size: 12px;">O. Administrasi Pemerintahan, Pertahanan dan
                      Jaminan Sosial Wajib</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_P') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-p',' active')!!}">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">P. Jasa Pendidikan</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_Q') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-q',' active')!!}">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">Q. Jasa Kesehatan dan Kegiatan Sosial</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhb_RSTU') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhb-rstu',' active')!!}">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">R,S,T,U. Jasa Lainnya</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item{!!Helper::isMenuActive ($sub_menu_active,'menu-ekonomi-adhk',' menu-open')!!}">
              <a href="" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Distribusi PDRB Atas Dasar Harga Konstan (ADHK)<i
                    class="fas fa-angle-left right" style="margin-top: 5px;"></i></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_A') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-a',' active')!!}">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">A. Pertanian, Kehutanan dan Perikanan</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_B') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-b',' active')!!}"">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">B. Pertambangan dan Penggalian</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_C') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-c',' active')!!}"">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">C. Industri Pengolahan</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_D') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-d',' active')!!}"">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">D. Pengadaan Listrik dan Gas</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_E') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-e',' active')!!}"">
                    <div style="width:30px;height:55px;float:left;"></div>
                    <p style="font-size: 12px;">E. Pengadaan Air, Pengelolaan Sampah, Limbah dan
                      Daur Ulang</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_F') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-f',' active')!!}"">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">F. Konstruksi</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_G') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-g',' active')!!}"">
                    <div style="width:30px;height:55px;float:left;"></div>
                    <p style="font-size: 12px;">G. Perdagangan Besar dan Eceran, Reparasi Mobil dan
                      Sepeda Motor</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_H') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-h',' active')!!}"">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">H. Transportasi dan Pergudangan</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_I') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-i',' active')!!}"">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">I. Penyediaan Akomodasi dan Makan Minum</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_J') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-j',' active')!!}"">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">J. Informasi dan Komunikasi</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_K') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-k',' active')!!}"">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">K. Jasa Keuangan dan Asuransi</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_L') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-l',' active')!!}"">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">L. Real Estate</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_MN') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-mn',' active')!!}"">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">M,N. Jasa Perusahaan</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_O') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-o',' active')!!}"">
                    <div style="width:30px;height:55px;float:left;"></div>
                    <p style="font-size: 12px;">O. Administrasi Pemerintahan, Pertahanan dan
                      Jaminan Sosial Wajib</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_P') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-p',' active')!!}"">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">P. Jasa Pendidikan</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_Q') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-q',' active')!!}"">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">Q. Jasa Kesehatan dan Kegiatan Sosial</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ekonomi-adhk_RSTU') }}" class="nav-link{!!Helper::isMenuActive ($page_active,'ekonomi-adhk-rstu',' active')!!}"">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">R,S,T,U. Jasa Lainnya</p>
                  </a>
                </li>
              </ul>

            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('ekonomi-kw.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Kunjungan Wisata (KW)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('ekonomi-pma.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Realisasi Investasi (PMA/ PMDN)</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <img src="{{ asset('administrator/img_mda/h3.png') }}" style="width:12%;margin:3px;">
            <p style="font-size: 10px;">PERTANIAN DAN PERIKANAN<i class="fas fa-angle-left right"
                style="margin-top: 10px;"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('pertanian-ppb.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Produksi Perikanan Budidaya (PPB)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('pertanian-ppt.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Produksi Perikanan Tangkap(PPT)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('pertanian-cpkup.index') }}" class="nav-link">
                <div style="width:30px;height:55px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Capaian Produksi Komoditi Unggulan Perkebunan (CPKUP)
                </p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('pertanian-cpkh.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Capaian Produksi Komoditi Hortikultura (CPKH)</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('pertanian-jpp.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Jumlah Produksi Peternakan (JPP)</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <img src="{{ asset('administrator/img_mda/h4.png') }}" style="width:12%;margin:3px;">
            <p style="font-size: 10px;">KEPENDUDUKAN<i class="fas fa-angle-left right"
                style="margin-top: 10px;"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('kependudukan-jp.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Jumlah Penduduk (JP)</p>
              </a>
            </li>
          </ul> 
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)<i
                    class="fas fa-angle-left right" style="margin-top: 5px;"></i></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('A-jpbku_04Tahun') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">0-4 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('B-jpbku_59Tahun') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">5-9 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('C-jpbku_1014Tahun') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">10-14 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('D-jpbku_1519Tahun') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">15-19 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('E-jpbku_2024Tahun') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">20-24 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('F-jpbku_2529Tahun') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">25-29 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('G-jpbku_3034Tahun') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">30-34 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('H-jpbku_3539Tahun') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">35-39 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('I-jpbku_4044Tahun') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">40-44 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('J-jpbku_4549Tahun') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">45-49 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('K-jpbku_5054Tahun') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">50-54 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('L-jpbku_5459Tahun') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">54-59 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('M-jpbku_6064Tahun') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">60-64 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('N-jpbku_6569Tahun') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">65-69 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('O-jpbku_7074Tahun') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">70-74 Tahun</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('P-jpbku_75Tahun') }}" class="nav-link">
                    <div style="width:30px;height:35px;float:left;"></div>
                    <p style="font-size: 12px;">75+ Tahun</p>
                  </a>
                </li>
              </ul>
          
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('kependudukan-pp.index') }}" class="nav-link">
            <div style="width:30px;height:35px;float:left;">
              <i class="far fa-circle nav-icon" style="color:rgb(255, 255, 255);font-size:10px;"></i>
            </div>
            <p style="font-size: 12px;">Pertumbuhan Penduduk (PP)</p>
          </a>
        </li>
      </ul>
      </li>

      <li class="nav-item{!!Helper::isMenuActive ($menu_active,'menu-infrastruktur',' menu-open')!!}">
        <a href="#" class="nav-link">
          <img src="{{ asset('administrator/img_mda/h5.png') }}" style="width:12%;margin:3px;">
          <p style="font-size: 10px;">INFRASTRUKTUR<i class="fas fa-angle-left right"
              style="margin-top: 10px;"></i></p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('infrastruktur-pjdd.index') }}" class="nav-link{!!Helper::isMenuActive ($page_active, 'infrastruktur-pjdd', ' active')!!}">
              <div style="width:30px;height:35px;float:left;">
                <i class="far fa-circle nav-icon"
                  style="color:rgb(255, 255, 255);font-size:10px;"></i>
              </div>
              <p style="font-size: 12px;">Panjang Jalan Yang Dibangun dan Ditingkatkan (PJDD)</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('infrastruktur-prt.index') }}" class="nav-link{!!Helper::isMenuActive ($page_active, 'infrastruktur-prt', ' active')!!}">
              <div style="width:30px;height:55px;float:left;">
                <i class="far fa-circle nav-icon"
                  style="color:rgb(255, 255, 255);font-size:10px;"></i>
              </div>
              <p style="font-size: 12px;">Persentase Rumah Tangga yang menggunakan air bersih
                (PRT)</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('infrastruktur-ptkj.index') }}" class="nav-link">
              <div style="width:30px;height:35px;float:left;">
                <i class="far fa-circle nav-icon"
                  style="color:rgb(255, 255, 255);font-size:10px;"></i>
              </div>
              <p style="font-size: 12px;">Persentase Tingkat Kemantapan Jalan (PTKJ)</p>
            </a>
          </li>
        </ul>
      </li>



      <li class="nav-item">
        <a href="#" class="nav-link">
          <img src="{{ asset('administrator/img_mda/h6.png') }}" style="width:12%;margin:3px;">
          <p style="font-size: 10px;">VIDEO BINTAN<i class="fas fa-angle-left right"
              style="margin-top: 10px;"></i></p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('video-dv.index') }}" class="nav-link">
              <div style="width:30px;height:35px;float:left;">
                <i class="far fa-circle nav-icon"
                  style="color:rgb(255, 255, 255);font-size:10px;"></i>
              </div>
              <p style="font-size: 12px;">Data Video (DV)</p>
            </a>
          </li>
        </ul>

      </li>
      @hasrole('superadmin')
        <li class="nav-header"></li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <img src="{{ asset('administrator/img_mda/h6.png') }}" style="width:12%;margin:3px;">
            <p style="font-size: 10px;">MANAJEMEN USER<i class="fas fa-angle-left right"
                style="margin-top: 10px;"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('user-iu.index') }}" class="nav-link">
                <div style="width:30px;height:35px;float:left;">
                  <i class="far fa-circle nav-icon"
                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                </div>
                <p style="font-size: 12px;">Input User (IU)</p>
              </a>
            </li>
          </ul>
        </li>
      @endhasrole

      <li class="nav-header"></li>
      <li class="nav-header"></li>
      <li class="nav-item">
        <a href="{{ '/' }}" target="_blank" class="nav-link">
          <i class="nav-icon far fa-circle text-success"></i>
          <p style="font-size: 12px;">Lihat Web</p>
        </a>
      </li>
      <li class="nav-header"></li>
      <li class="nav-header"></li>

      <li class="nav-item" style="margin-top: -40px;">
        <a href="{{ '/logout' }}" class="nav-link">
          <i class="nav-icon far fa-circle text-danger" style="color:rgb(255, 10, 10);"></i>
          <p class="text" style="font-size: 12px;">Logout</p>
        </a>
      </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
