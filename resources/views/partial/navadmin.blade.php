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

           <a href="" class="d-block">Administrator</a>

         </div>
       </div>


       <!-- Sidebar Menu -->
       <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
           data-accordion="false">

           <li class="nav-item">
             <a href="#" class="nav-link">
               <img src="{{ asset('administrator/img_mda/h1.png') }}" style="width:12%;margin:3px;">
               <p style="font-size: 10px;">SOSIAL<i class="fas fa-angle-left right"></i></p>
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
                   <p style="font-size: 12px;">Perkembangan Kondisi Ketenagakerjaan (IPK))
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
                 <a href="{{ route('sosial-apk.index') }}" class="nav-link">
                   <div style="width:30px;height:35px;float:left;">
                     <i class="far fa-circle nav-icon"
                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                   </div>
                   <p style="font-size: 12px;">Angka Partisipasi Kasar (APK)</p>
                 </a>
               </li>
             </ul>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="{{ route('sosial-apm.index') }}" class="nav-link">
                   <div style="width:30px;height:35px;float:left;">
                     <i class="far fa-circle nav-icon"
                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                   </div>
                   <p style="font-size: 12px;">Angka partisipasi Murni (APM)</p>
                 </a>
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
                   <p style="font-size: 12px;">Indeks Pemeberdayaan Gender (IPG)</p>
                 </a>
               </li>
             </ul>


           </li>

           <li class="nav-item">
             <a href="#" class="nav-link">
               <img src="{{ asset('administrator/img_mda/h2.png') }}" style="width:12%;margin:3px;">
               <p style="font-size: 10px;">EKONOMI<i class="fas fa-angle-left right"></i></p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="{{ route('ekonomi-pe.index') }}" class="nav-link">
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
                 <a href="{{ route('ekonomi-li.index') }}" class="nav-link">
                   <div style="width:30px;height:35px;float:left;">
                     <i class="far fa-circle nav-icon"
                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                   </div>
                   <p style="font-size: 12px;">Laju Inflasi (LI)</p>
                 </a>
               </li>
             </ul>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="{{ route('ekonomi-adhb.index') }}" class="nav-link">
                   <div style="width:30px;height:35px;float:left;">
                     <i class="far fa-circle nav-icon"
                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                   </div>
                   <p style="font-size: 12px;">Distribusi PDRB Atas Dasar Harga Berlaku (ADHB)</p>
                 </a>
               </li>
             </ul>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="{{ route('ekonomi-adhk.index') }}" class="nav-link">
                   <div style="width:30px;height:35px;float:left;">
                     <i class="far fa-circle nav-icon"
                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                   </div>
                   <p style="font-size: 12px;">Distribusi PDRB Atas Dasar Harga Konstan (ADHK)</p>
                 </a>
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
               <p style="font-size: 10px;">PERTANIAN DAN PERIKANAN<i class="fas fa-angle-left right"></i>
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
                   <div style="width:30px;height:35px;float:left;">
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
               <p style="font-size: 10px;">KEPENDUDUKAN<i class="fas fa-angle-left right"></i></p>
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
                 <a href="{{ route('kependudukan-jpbk.index') }}" class="nav-link">
                   <div style="width:30px;height:35px;float:left;">
                     <i class="far fa-circle nav-icon"
                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                   </div>
                   <p style="font-size: 12px;">Jumlah Penduduk Berdasarkan Kecamatan Tahun 2021 (JPBK)
                   </p>
                 </a>
               </li>
             </ul>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="{{ route('kependudukan-jpbku.index') }}" class="nav-link">
                   <div style="width:30px;height:35px;float:left;">
                     <i class="far fa-circle nav-icon"
                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                   </div>
                   <p style="font-size: 12px;">Jumlah Penduduk Berdasarkan Kelompok Umur (JPBKU)</p>
                 </a>
               </li>
             </ul>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="{{ route('kependudukan-pp.index') }}" class="nav-link">
                   <div style="width:30px;height:35px;float:left;">
                     <i class="far fa-circle nav-icon"
                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                   </div>
                   <p style="font-size: 12px;">Pertumbuhan Penduduk (PP)</p>
                 </a>
               </li>
             </ul>
           </li>

           <li class="nav-item">
             <a href="#" class="nav-link">
               <img src="{{ asset('administrator/img_mda/h5.png') }}" style="width:12%;margin:3px;">
               <p style="font-size: 10px;">INFRASTRUKTUR<i class="fas fa-angle-left right"></i></p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="{{ route('infrastruktur-pjdd.index') }}" class="nav-link">
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
                 <a href="{{ route('infrastruktur-prt.index') }}" class="nav-link">
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
               <p style="font-size: 10px;">VIDEO BINTAN<i class="fas fa-angle-left right"></i></p>
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
               <p style="font-size: 10px;">MANAJEMEN USER<i class="fas fa-angle-left right"></i></p>
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
