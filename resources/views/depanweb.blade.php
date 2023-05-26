@extends('layouts.depan-all')
@section('isikonten')
<div id="block" class="w3lvide-content" data-vide-bg="images/freelan" data-vide-options="position: 0% 50%" style="background-image: url('{{asset('home/images/bb.jpg')}}');">
    <!-- /form -->
    <div class="workinghny-form-grid">
        <div class="main-hotair">
            <center><img src="{{asset('home/images/ll.png')}}" style="width:120px;"></center>
            <div class="content-wthree">
                <h1 style="font-size: 15px;margin-top: 15px;">Bintan In Hand</h1><BR>
                <form action="#" method="post"> 
                    <input type="email" class="text" name="text" placeholder="Email" required="" autofocus>
                    <input type="password" class="password" name="password" placeholder="Password" required="" autofocus>
                    <button class="btn" type="submit">Login</button>
                </form>
                
                <p class="continue">
                    <!-- <span>Or create account using social media!</span> -->
                </p>
               
            </div>
          
        </div>
   

    <!-- copyright-->
    <div class="copyright text-center">
        <p class="copy-footer-29">Administrator Kabupaten Bintan<BR>
            <span style="font-size: 11px;">
                Created By : BAPELITBANG | 
                Support by <a href="https://mda-enterprise.web.id">MDA-Enterprise</a></span>
                </p>
    </div>
    </div>
    <!-- //copyright-->
</div>
@endsection
