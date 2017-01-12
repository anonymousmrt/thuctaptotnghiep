<!DOCTYPE html>
<html lang="en" class="no-js no-svg">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>{{$title}}</title>
<link rel="dns-prefetch" href="//fonts.googleapis.com" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,Lato:400,400i,700,700i" />
@if(in_array('carousel', $libs_elements))
<link rel="stylesheet" href="{{asset('frontend')}}/css/owl.carousel.min.css" />
@endif
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('frontend')}}/css/main.css" />
{{-- scroll --}}
<link href="{{asset('frontend')}}/css/scrollbar.css" rel="stylesheet" type="text/css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css" media="screen">
    #color{
        color: #000000;
    }
    
    
</style>

</head>

<body>
<div id="page" class="site">

<a class="skip-link sr-text" href="#scontent">Skip to content</a>

<header id="sheader" class="sheader">
    <div class="sheet">
        <nav id="snav" class="snav">
            <div class="sbranding">
                <div class="slogo">
                    <a href="{{asset('/')}}" title="fsflex - Premium Extensions">
                        <svg viewBox="0 0 32 32" class="header-logo" role="img">
                            <use xlink:href="{{asset('frontend')}}/images/map.svg#logo" />
                        </svg>
                        <span class="logo-text">fsflex</span>
                    </a>
                </div>
            </div>
            <div class="xmenu-block">
                <ul class="xmenu">
                    <li>
                        @if(!Auth::user())
                            <a href="{{asset('login')}}" id="usrlogin" title="login">
                            <svg viewBox="0 0 32 32" class="icon icon-profile" role="img">
                                <use xlink:href="{{asset('frontend')}}/images/map.svg#icon-profile" />
                            </svg>
                            </a>
                        @else
                            <div class="dropdown" style="width:80px;">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                <svg viewBox="0 0 32 32" class="icon icon-profile" role="img">
                                    <use xlink:href="{{asset('frontend')}}/images/map.svg#icon-profile" />
                                </svg>
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu"  >
                                    <li><a href="{{asset('profile')}}" id="color">Profile</a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" id="color">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>                                    
                                </ul>

                            </div>
                            
                            
                        @endif
                    </li>
                    <li>
                        <button class="smenu-toggle" aria-controls="smenu-block" aria-expanded="false" title="Main menu toggle">
                            <svg viewBox="0 0 32 32" class="icon icon-menu" role="img">
                                <use xlink:href="{{asset('frontend')}}/images/map.svg#icon-menu" />
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
            <div id="smenu-block" class="smenu-block">
                <button class="smenu-close" data-close-controls="smenu-block" title="Close menu">
                    <svg viewBox="0 0 32 32" class="icon icon-cancel" role="img">
                        <use xlink:href="{{asset('frontend')}}/images/map.svg#icon-cancel" />
                    </svg>
                </button>
                <ul id="smenu" class="smenu" aria-expanded="false">
                    <li class="current-menu-item">
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="parent-menu-item"> 
                        <a href="#extensions">Extensions</a>
                        <ul class="sub-menu" style="padding-left: 0px!important; padding-top: 0px!important;padding-right: 0px!important;padding-bottom: 0px!important;">                            
                            <div id="wrapper">
                                <div class="scrollbar" id="style-5">
                                  @foreach($products as $product)
                                    <li>
                                        <a href="{{url('product', ['id'=>$product->id])}}">{{$product->name}}</a>
                                    </li>
                                @endforeach
                                </div>
                                <div class="force-overflow"></div>
                            </div>
                        </ul>                       
                    </li>
                    <li>
                        <a href="#services">Services</a>
                    </li>
                    <li>
                        <a href="#support">Support</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header><!-- #sheader -->





    @yield('content')





<footer id="scolophon" class="sfooter" role="contentinfo">
    <div class="sheet ta-center">
        <div class="fmenu-block">
            <ul id="fmenu" class="fmenu">
                <li><a href="#aboutus">About us</a></li>
                <li><a href="#extension">Extensions</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#support">Support</a></li>
            </ul>
        </div>
        <div class="copyright">&copy; 2016 fsflex. All rights reserved</div>
    </div>
</footer><!-- #scolophon -->

</div>
<script type="text/javascript" src="{{asset('frontend')}}/js/particles.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/svg4everybody.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/main.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/scrollbar.js"></script>

@if(in_array('bootstrap', $libs_elements))
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@endif

@if(in_array('checkout', $libs_elements))
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
@endif

@forelse($custom_scripts as $custom_script)
    <script type="text/javascript" src="{{$custom_script}}"></script>
    @empty
@endforelse
</body>