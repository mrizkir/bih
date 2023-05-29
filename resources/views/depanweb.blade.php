@extends('layouts.depan-all')

@section('isikonten')

<div class="body">
    <header id="header" class="header-full-width transparent-header" data-plugin-options="{'stickyEnabled': false}">
        <div class="header-body">
            <div class="header-container container">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-logo">
                                <a href=""></a>
                            </div>
                        </div>
                    </div>
                        
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <div class="header-nav">
                                <div class="header-nav-main header-nav-main-photography-effect-1 header-nav-main-sub-effect-1">
                                    <nav class="collapse">
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li class="dropdown-primary">
                                                <a class="nav-link" href=""></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div> 
                                 
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <center>
        <div style="background:;width:200px;height:auto;margin-top:200px;padding:20px;">
        <img width="150" height="auto"  style="margin-bottom:20px;" src="{{asset('depan/images/BIH.png')}}">
        <a href="{!! route('login') !!}" style="font-size:15px;" class="btn btn-success font-weight-bold btn-py-2 btn-px-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1250">LOGIN</a>
        </div>
        </center>
    </header>
    
    

    <div role="main" class="main full-height" id="main">			
    
        <div class="slider-container rev_slider_wrapper" style="height: 500px;">
            <div id="revolutionSlider" class="slider rev_slider manual" data-version="5.4.8">
                <ul>
                    <li data-transition="fade">
                        <img src="{{asset('depan/images/1.jpg')}}"  
                            alt=""
                            data-bgposition="center center" 
                            data-bgfit="cover" 
                            data-bgrepeat="no-repeat" 
                            class="rev-slidebg">
                        
                        <div class="tp-caption tp-caption-photo-label"
                            data-x="['left','left','left','left']"
                            data-hoffset="['28','28','28','28']" 
                            data-y="['bottom','bottom','bottom','bottom']"
                            data-voffset="['28','28','28','28']" 
                            data-start="500"
                            data-basealign="slide" 
                            data-transform_in="y:[-300%];opacity:0;s:500;"><span style="color:white;">Bintan In Hand | Kabupaten Bintan | Kepulauan Riau</span></div>
                    </li>
                    <li data-transition="fade">
                        <img src="{{asset('depan/images/2.jpg')}}"
                            alt=""
                            data-bgposition="center center" 
                            data-bgfit="cover" 
                            data-bgrepeat="no-repeat" 
                            class="rev-slidebg">

                        <div class="tp-caption tp-caption-photo-label"
                            data-x="['left','left','left','left']"
                            data-hoffset="['28','28','28','28']" 
                            data-y="['bottom','bottom','bottom','bottom']"
                            data-voffset="['28','28','28','28']" 
                            data-start="500"
                            data-basealign="slide" 
                            data-transform_in="y:[-300%];opacity:0;s:500;"><span style="color:yellow;">Bintan In Hand | Kabupaten Bintan | Kepulauan Riau</span></div>
                    </li>
                    <li data-transition="fade">
                        <img src="{{asset('depan/images/3.jpg')}}"  
                            alt=""
                            data-bgposition="center center" 
                            data-bgfit="cover" 
                            data-bgrepeat="no-repeat" 
                            class="rev-slidebg">
                        
                        <div class="tp-caption tp-caption-photo-label"
                            data-x="['left','left','left','left']"
                            data-hoffset="['28','28','28','28']" 
                            data-y="['bottom','bottom','bottom','bottom']"
                            data-voffset="['28','28','28','28']" 
                            data-start="500"
                            data-basealign="slide" 
                            data-transform_in="y:[-300%];opacity:0;s:500;"><span style="color:white;">Bintan In Hand | Kabupaten Bintan | Kepulauan Riau</span></div>
                    </li>
                     <li data-transition="fade">
                        <img src="{{asset('depan/images/4.jpg')}}"  
                            alt=""
                            data-bgposition="center center" 
                            data-bgfit="cover" 
                            data-bgrepeat="no-repeat" 
                            class="rev-slidebg">
                        
                        <div class="tp-caption tp-caption-photo-label"
                            data-x="['left','left','left','left']"
                            data-hoffset="['28','28','28','28']" 
                            data-y="['bottom','bottom','bottom','bottom']"
                            data-voffset="['28','28','28','28']" 
                            data-start="500"
                            data-basealign="slide" 
                            data-transform_in="y:[-300%];opacity:0;s:500;"><span style="color:yellow;">Bintan In Hand | Kabupaten Bintan | Kepulauan Riau</span></div>
                    </li>
                </ul>
            </div>
        </div>

    </div>

</div> 

@endsection