<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title> @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('asetss/images/favicon.png')}}" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="{{asset('assetss/plugins/themefisher-font/style.css')}}">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{asset('assetss/plugins/bootstrap/css/bootstrap.min.css')}}">

    <!-- Animate css -->
    <link rel="stylesheet" href="{{asset('assetss/plugins/animate/animate.css')}}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{asset('assetss/plugins/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assetss/plugins/slick/slick-theme.css')}}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('assetss/css/style.css')}}">

</head>
<body id="body">

<!-- Start Top Header Bar -->
<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="contact-number">
                    <i class="tf-ion-ios-telephone"></i>
                    <span>+7 707 777 70 70</span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Site Logo -->
                <div class="logo text-center">
                    <a href="{{route('preparats.index')}}">
                        <!-- replace logo here -->
                        <svg width="180px" height="29px" viewBox="0 0 140 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
                               font-family="AustinBold, Austin" font-weight="bold">
                                <g id="Group" transform="translate(-110.000000, -297.000000)" fill="#000000">
                                    <text id="AVIATO">
                                        <tspan x="90.94" y="325">MediStore</tspan>
                                    </text>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="top-menu text-right list-inline">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('message.login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('message.register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('message.logout') }}
                                    </a>
                                    @if(\Illuminate\Support\Facades\Auth::user()->role->role == 'Admin')
                                        <a class="dropdown-item" href="{{ route('adm.users.index') }}">
                                            {{ __('message.admin') }}
                                        </a>
                                    @elseif(\Illuminate\Support\Facades\Auth::user()->role->role == 'Moderator')
                                        <a class="dropdown-item" href="{{ route('adm.categories.index') }}">
                                            {{ __('message.admin') }}
                                        </a>
                                    @endif

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                        {{ __('message.profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('select.index') }}">
                                        {{ __('message.chosen') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('preparat.index') }}">
                                        API
                                    </a>
                                </div>
                            </li>
                            <li class="dropdown cart-nav dropdown-slide">
                                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                        class="tf-ion-android-cart"></i>{{__('message.cart')}}</a>
                                <div class="dropdown-menu cart-dropdown">
                                    <ul class="text-center cart-buttons">
                                        @foreach(\Illuminate\Support\Facades\Auth::user()->preparats as $p)
                                            @if($p->pivot->sales == "korzinada")
                                                <div class="media">
                                                    <a class="pull-left" href="#!">
                                                        <img class="media-object" src="{{asset('uploads/'.$p->image)}}" alt="image" />
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><a href="#!">{{$p->name}}</a></h4>
                                                        <div class="cart-price">
                                                            <span>{{$p->pivot->count}}x</span>
                                                            <span>{{$p->price}}</span>
                                                        </div>
                                                        <h5><strong>{{$p->pivot->count * $p->price}} T</strong></h5>
                                                    </div>
                                                    <a href="#!" class="remove"><i class="tf-ion-close"></i></a>
                                                </div>
                                            @else
                                            @endif
                                        @endforeach
                                        <li><a href="{{route('cart.index')}}" class="btn btn-small">{{__('message.more')}}</a></li>
                                        <li><a href="{{route('cart.story')}}"class="btn btn-small btn-solid-border">{{__('message.history')}}</a></li>
                                    </ul>
                                </div>

                            </li>
                        @endguest
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{config('app.languages')[app()->getLocale()]}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @foreach(config('app.languages') as $ln=>$l)
                                    <a class="dropdown-item" href="{{route('switch.languages',$ln)}}">
                                        {{ $l}}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu">
    <nav class="navbar navigation">
        <div class="container">
            <div class="navbar-header">
                <h2 class="menu-title">Main Menu</h2>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div><!-- / .navbar-header -->

            <!-- Navbar Links -->
            <div id="navbar" class="navbar-collapse collapse text-center">
                <ul class="nav navbar-nav">

                    <!-- Home -->
                    <li class="dropdown ">
                        <a href="{{route('preparats.index')}}">{{__('message.main')}}</a>
                    </li><!-- / Home -->


                    <!-- Elements -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="500"
                           role="button" aria-haspopup="true" aria-expanded="false">{{__('message.category')}} <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">

                                <!-- Basic -->
                                <div class="col-lg-8 col-md-8 mb-sm-3">
                                    <ul>
                                        <li class="dropdown-header">{{__('message.category')}}</li>
                                        @isset($categories)
                                        @foreach($categories as $category)
                                         <li>
                                           <a class="nav-link" href="{{route('preparats.category',$category->id)}}">{{ $category->{'category_'.app()->getLocale()} }}</a>
                                         </li>
                                                @endforeach
                                        @endisset

                                    </ul>
                                </div>
                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Elements -->

                    <li class="dropdown dropdown-slide">
                        @can('create',\App\Models\Preparat::class)
                            <a href="{{route('preparats.create')}}" >{{__('message.create')}}</a>
                        @endcan
                    </li>

                </ul><!-- / .nav .navbar-nav -->

            </div>
            <!--/.navbar-collapse -->
        </div><!-- / .container -->
    </nav>
</section>

@if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

<main class="py-4">
    @yield('content')
</main>

<footer class="footer section text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="social-media">
                    <li>
                        <a href="https://www.facebook.com/themefisher">
                            <i class="tf-ion-social-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/themefisher">
                            <i class="tf-ion-social-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com/themefisher">
                            <i class="tf-ion-social-twitter"></i>
                        </a>
                    </li>
                </ul>
                <ul class="footer-menu text-uppercase">
                    <li>
                        <a href="contact.html">{{__('message.contact')}}</a>
                    </li>
                    <li>
                        <a href="{{route('preparats.index')}}">{{__('message.main')}}</a>
                    </li>

                </ul>
                <p class="copyright-text">Copyright &copy;2022, Designed &amp; Developed by <a href="https://themefisher.com/">Diana Danial</a></p>
            </div>
        </div>
    </div>
</footer>


<!-- Main jQuery -->
<script src="{{asset('assetss/plugins/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.1 -->
<script src="{{asset('assetss/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Bootstrap Touchpin -->
<script src="{{asset('assetss/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
<!-- Instagram Feed Js -->
<script src="{{asset('assetss/plugins/instafeed/instafeed.min.js')}}"></script>
<!-- Video Lightbox Plugin -->
<script src="{{asset('assetss/plugins/ekko-lightbox/dist/ekko-lightbox.min.js')}}"></script>
<!-- Count Down Js -->
<script src="{{asset('assetss/plugins/syo-timer/build/jquery.syotimer.min.js')}}"></script>

<!-- slick Carousel -->
<script src="{{asset('assetss/plugins/slick/slick.min.js')}}"></script>
<script src="{{asset('assetss/plugins/slick/slick-animation.min.js')}}"></script>

<!-- Google Mapl -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script type="text/javascript" src="{{asset('assetss/plugins/google-map/gmap.js')}}"></script>

<!-- Main Js File -->
<script src="{{asset('assetss/js/script.js')}}"></script>



</body>
</html>
