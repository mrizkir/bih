<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>.:: {{$title}}::.</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="bintan in hand" />
    <!-- //Meta tag Keywords -->
    {{-- <link href="//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet"> --}}
    <!--/Style-CSS -->
    <link rel="stylesheet" href="{{asset('home/css/style.css')}}" type="text/css" media="all" />
    <!--//Style-CSS -->

    <link rel="stylesheet" href="{{asset('home/css/font-awesome.min.css')}}" type="text/css" media="all">

</head>

<body>
  
  @yield('isikonten')
    <!-- //form section start -->
      <!-- js -->
  <script src="{{asset('home/js/jquery.min.js')}}"></script>
  {{-- <!-- //js -->
  <script src="{{asset('home/js/jquery.vide.js')}}"></script>
  <script>
       $(document).ready(function () {
           $("#block").vide("{{asset('home/images/freelan.mp4')}}"); // Non declarative initialization
    
           var instance = $("#block").data("vide"); // Get instance
           var video = instance.getVideoObject(); // Get video object
           instance.destroy(); // Destroy instance
       });
  </script> --}}
</body>

</html>












