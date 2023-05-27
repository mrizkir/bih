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
                   href="{{ '/depan' }}" role="button" style="font-size: 12px;">
                   Selamat Datang, <b> SUSI KURNIAWATI </b>&nbsp;&nbsp;
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

                   <a href="/edituser" class="d-block"> Administrator</a>

               </div>
           </div>


           <!-- Sidebar Menu -->
           <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                   data-accordion="false">

                   <li class="nav-item">
                       <a href="#" class="nav-link">
                        <img src="{{ asset('administrator/img_mda/h1.png') }}" style="width:8%;margin:3px;"> 
                           <p style="font-size: 10px;">SOSIAL<i class="fas fa-angle-left right"></i></p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                            <a href="{{ '/ppm' }}" class="nav-link">
                                <i class="far fa-circle nav-icon"
                                    style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Presentasi Penduduk Miskin</p>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Angka Rata-Rata Lama Sekolah (RLS)</p>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Angka Melek Huruf (AMH)</p>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Angka Harapan Hidup (AHH)</p>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Angka Kelangsungan Hidup Bayi (AKHB)</p>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Angka kematian ibu melahirkan per 100.000 kelahiran hidup
                                   </p>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Perkembangan Kondisi Ketenagakerjaan di Kabupaten Bintan
                                   </p>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Indeks Pembangunan Gender </p>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Angka Partisipasi Kasar</p>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Angka partisipasi Murni</p>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Angka Harapan Lama Sekolah (HLS) </p>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Jumlah rumah tidak layak huni yang direhab</p>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Indeks Gini</p>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Indeks daya Beli (Purchasing power parity)</p>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Persentase Penduduk Usia 15 Tahun ke atas menurut
                                       Pendidikan yang Ditamatkan</p>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Indeks Pemeberdayaan Gender</p>
                               </a>
                           </li>
                       </ul>
                   </li>

                   <li class="nav-item">
                       <a href="#" class="nav-link">
                        <img src="{{ asset('administrator/img_mda/h2.png') }}" style="width:8%;margin:3px;"> 
                           <p style="font-size: 10px;">EKONOMI<i class="fas fa-angle-left right"></i></p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '/ppm' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Presentasi Penduduk Miskin</p>
                               </a>
                           </li>
                       </ul>
                   </li>

                   <li class="nav-item">
                       <a href="#" class="nav-link">
                        <img src="{{ asset('administrator/img_mda/h3.png') }}" style="width:8%;margin:3px;"> 
                           <p style="font-size: 10px;">PERTANIAN DAN PERIKANAN<i class="fas fa-angle-left right"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Presentasi Penduduk Miskin</p>
                               </a>
                           </li>
                       </ul>
                   </li>

                   <li class="nav-item">
                       <a href="#" class="nav-link">
                        <img src="{{ asset('administrator/img_mda/h4.png') }}" style="width:8%;margin:3px;"> 
                           <p style="font-size: 10px;">KEPENDUDUKAN<i class="fas fa-angle-left right"></i></p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Presentasi Penduduk Miskin</p>
                               </a>
                           </li>
                       </ul>
                   </li>

                   <li class="nav-item">
                       <a href="#" class="nav-link">
                        <img src="{{ asset('administrator/img_mda/h5.png') }}" style="width:8%;margin:3px;"> 
                           <p style="font-size: 10px;">INFRASTRUKTUR<i class="fas fa-angle-left right"></i></p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Presentasi Penduduk Miskin</p>
                               </a>
                           </li>
                       </ul>
                   </li>

                   <li class="nav-item">
                       <a href="#" class="nav-link">
                        <img src="{{ asset('administrator/img_mda/h6.png') }}" style="width:8%;margin:3px;"> 
                           <p style="font-size: 10px;">VIDEO BINTAN<i class="fas fa-angle-left right"></i></p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ '' }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"
                                       style="color:rgb(255, 255, 255);font-size:10px;"></i>
                                   <p style="font-size: 10px;">Presentasi Penduduk Miskin</p>
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






<!-- jQuery -->
{{-- <script src="{{asset('administrator/plugins/jquery/jquery.min.js')}}"></script>  --}}
<script src="{{asset('administrator/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> 
<script src="{{asset('administrator/plugins/chart.js/Chart.min.js')}}"></script> 
<script src="{{asset('administrator/dist/js/adminlte.min.js')}}"></script> 
<script>
  $(function () { 
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>