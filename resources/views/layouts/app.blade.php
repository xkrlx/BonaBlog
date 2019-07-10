<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>TITLE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">


    <!-- Font -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


    <!-- Stylesheets -->

    <link href="/common-css/bootstrap.css" rel="stylesheet">

    <link href="/common-css/ionicons.css" rel="stylesheet">


    <link href="/layout-1/css/styles.css" rel="stylesheet">

    <link href="/layout-1/css/responsive.css" rel="stylesheet">

</head>
<body >

<header>
    <div class="container-fluid no-side-padding">

        <a href="/" class="logo"><img src="/images/logo.png" alt="Logo Image"></a>

        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

        <ul class="main-menu visible-on-click" id="main-menu">
            <li><a href="/">Strona główna</a></li>
            <li><a href="/news">News</a></li>
            <li><a href="/sport">Sport</a></li>
            <li><a href="/inne">Inne</a></li>
            <li><a href="/create">Stwórz post</a></li>
        </ul>
        <ul class="main-menu float-right">
            @if(Auth::user())
                <ul class="main-menu visible-on-click" id="main-menu">
                    <a href="/myprofile" class="logo"><img src="/images/{{ Auth::user()->profile_picture }}" alt="Logo Image"></a>
                    <li><a href="/myprofile">Mój profil</a></li>
                </ul>
                @endif
            @guest
                <li >
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li>
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="menu-right" style="z-index: 44">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" >
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul><!-- main-menu -->

        <!--<div class="src-area">
            <form>
                <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                <input class="src-input" type="text" placeholder="Type of search">
            </form>
        </div>
        --!>
    </div><!-- conatiner -->
</header>

<div class="slider display-table center-text">
    <h1 class="title display-table-cell"><b>@yield('header')</b></h1>
</div><!-- slider -->

<section class="blog-area section">
    <div class="container">




    @yield('content')<!-- single-post -->








    </div><!-- container -->
</section><!-- section -->


<footer>

    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <a class="logo" href="/"><img src="/images/logo.png" alt="Logo Image"></a>
                    <p class="copyright">Bona @ 2017. All rights reserved.</p>
                    <p class="copyright">Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                    <ul class="icons">
                        <li><a href="https://www.facebook.com/profile.php?=7432645066541" target="_blank"><i class="ion-social-facebook-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
                    </ul>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">
                    <h4 class="title"><b>Kategorie</b></h4>
                    <ul>
                        <li><a href="/news">Wiadomości</a></li>
                        <li><a href="/sport">Sport</a></li>
                        <li><a href="/inne">Inne</a></li>
                    </ul>
                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <h4 class="title"><b>SUBSCRIBE</b></h4>
                    <div class="input-area">
                        <form>
                            <input class="email-input" type="text" placeholder="Enter your email">
                            <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                        </form>
                    </div>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

        </div><!-- row -->
    </div><!-- container -->
</footer>


<!-- SCIPTS -->

<script src="/common-js/jquery-3.1.1.min.js"></script>

<script src="/common-js/tether.min.js"></script>

<script src="/common-js/bootstrap.js"></script>

<script src="/common-js/scripts.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>

</body>
</html>
