<!DOCTYPE html>
<html lang="en">
<head>
<title>{{__('language.T-SQUAR')}}</title>
<link rel="shortcut icon" href="images/T-squar.jpg" type="image/x-icon">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<!-- STYLESHEET CSS FILES -->
<link rel="stylesheet" href={{asset('css/bootstrap.min.css')}}>
<link rel="stylesheet" href={{asset('css/animate.min.css')}}>
<link rel="stylesheet" href={{asset('css/font-awesome.min.css')}}>
<link rel="stylesheet" href={{asset('css/nivo-lightbox.css')}}>
<link rel="stylesheet" href={{asset('css/nivo_themes/default/default.css')}}>
<link rel="stylesheet" href={{asset('css/templatemo-style.css')}}>
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
<!-- preloader section -->
<div class="preloader">
  <div class="sk-spinner sk-spinner-rotating-plane"></div>
</div>
<!-- home section -->
<section id="home">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        @if (session('message_users'))
          <h4 class="alert alert-success text-center">{{session('message_users')}}</h4>
          @endif
        <h1 class="wow bounceInDown rotate">{{__('language.T-SQUAR')}}</h1>
        <h2 class="wow bounce">{{__('language.H2 HOME')}}</h2>
        <a href="#intro" class="btn btn-default smoothScroll">{{__('language.VIEW')}}</a></div>
    </div>
  </div>
</section>
<!-- navigation section -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> </button>
      <a href="#" class="navbar-brand">{{__('language.T-SQUAR')}}</a></div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#home" class="smoothScroll">{{__('language.HOME')}}</a></li>
        <li><a href="#intro" class="smoothScroll">{{__('language.INTRO')}}</a></li>
        <li><a href="#work" class="smoothScroll">{{__('language.COURSES')}}</a></li>
        <li><a href="#team" class="smoothScroll">{{__('language.TEAM')}}</a></li>
        <li><a href="#portfolio" class="smoothScroll">{{__('language.PROJECTS')}}</a></li>
        <li><a href="#price" class="smoothScroll">{{__('language.PRICE')}}</a></li>
        <li><a href="#contact">{{__('language.CONTACT')}}</a></li>

        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li class="nav-item">
            <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach

        @if (Route::has('login'))
                            
                                @auth
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
            
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{ route('home') }}">
                                            {{__('language.HOME')}}
                                        </a></li>

                                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{__('language.LOGOUT')}}
                                        </a></li>

            
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                                @else
                                    <li><a class="nav-link text-light" href="{{ route('login') }}">{{__('language.LOGIN')}}</a></li>
                        
                                    @if (Route::has('register'))
                                <li><a class="nav-link text-light" href="{{ route('register') }}">{{__('language.REGISTER')}}</a></li>
                                    @endif
                                @endauth
                          
                        @endif 
        
      </ul>
    </div>
  </div>
</div>





<section>
    @yield('cartoona')
</section>










<!-- footer section -->
<footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <h2 class="wow fadeIn" data-wow-delay="0.9s">{{__('language.FOLLOWUS')}}</h2>
          <ul class="social-icon">
            <li><a href="#" class="fa fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li>
            <li><a href="#" class="fa fa-behance wow bounceIn" data-wow-delay="0.9s"></a></li>
            <li><a href="#" class="fa fa-github wow bounceIn" data-wow-delay="0.9s"></a></li>
            <li><a href="#" class="fa fa-android wow bounceIn" data-wow-delay="0.9s"></a></li>
            <li><a href="#" class="fa fa-phone wow bounceIn" data-wow-delay="0.9s"></a></li>
          </ul>
        </div>
        <div class="col-md-12 col-sm-12 copyright">
          <p>{{__('language.COPY')}} <a target="_blank" rel="#" href="#">{{__('language.T-SQUAR')}}</a></p>
        </div>
      </div>
    </div>
  </footer>
  <!-- JAVASCRIPT JS FILES --> 
  <script src={{asset('js/jquery.js')}}></script> 
  <script src={{asset('js/bootstrap.min.js')}}></script> 
  <script src={{asset('js/nivo-lightbox.min.js')}}></script> 
  <script src={{asset('js/smoothscroll.js')}}></script> 
  <script src={{asset('js/jquery.sticky.js')}}></script> 
  <script src={{asset('js/jquery.parallax.js')}}></script> 
  <script src={{asset('js/wow.min.js')}}></script> 
  <script src={{asset('js/custom.js')}}></script>
  </body>
  </html>