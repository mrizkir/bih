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
               <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="{{ '/depan' }}" role="button">
                   Selamat Datang, <b> SUSI KURNIAWATI </b>&nbsp;&nbsp;
                   <i class="fas fa-th-large" style="color:red;"></i>
               </a>
           </li>
       </ul>
   </nav>
   <!-- /.navbar -->


   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
       <!-- Brand Logo -->
       <a href="{{ '/depan' }}" class="brand-link">
           {{-- <img src="{{ asset('administrator/dist/img/AdminLTELogo.png') }}" alt="MDA" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
           <center>
               <span class="brand-text font-weight-light">Selamat Datang</span>
           </center>
       </a>

       <!-- Sidebar -->
       <div class="sidebar">
           <!-- Sidebar user panel (optional) -->
           <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                   <img src="{{asset('administrator/img_mda/admin.jpeg')}}" class="img-circle elevation-2" alt="Image Kosong">
               </div>
               <div class="info">
                   
                   <a href="/edituser" class="d-block"> Administrator</a>
                 
               </div>
           </div>


           <!-- Sidebar Menu -->
           <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                   <li class="nav-item">
                       <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th" style="color:rgb(95, 194, 15);font-size:12px;"></i> 
                           <p style="font-size: 13px;">INPUT DATA<i class="fas fa-angle-left right"></i></p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link"> 
                                <i class="far fa-circle nav-icon" style="color:rgb(255, 255, 255);font-size:12px;"></i>
                                   <p style="font-size: 12px;">Tampil Data</p>
                               </a>
                           </li>
                       </ul>
                   </li>



 



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