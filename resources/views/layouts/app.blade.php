<!DOCTYPE html>
<html lang="en">
<script src="https://use.fontawesome.com/7c8efe0a98.js"></script>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JualApps.com</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <div class="navbar-fixed">
        <nav>
            <div class="container">
                <div class="nav-wrapper">
                <a href="{{ url('/') }}" class="brand-logo">Jual Apps</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="{{route('product')}}">Produk</a></li>
                        <li><a href="#">Afiliasi</a></li>
                        <li><a href="#">FAQ</a></li>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        {{-- 
                        <li><a href="{{ url('/register') }}">Registrasi</a></li>
                         --}}
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main>
    @yield('content')
    </main>

    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l2 s12">
                    <b class="white-text">JUAL APPS</b>
                    <ul>
                        <li><a class="grey-text" href="#!">Produk</a></li>
                        <li><a class="grey-text" href="#!">Afiliasi</a></li>
                        <li><a class="grey-text" href="#!">FAQ</a></li>
                        <li><a class="grey-text" href="#!">Login</a></li>
                    </ul>
                </div>
                <div class="col l2 s12">
                    <b class="white-text">IKUTI KAMI</b>
                    <ul>
                        <li><a class="grey-text" href="#!">Facebook</a></li>
                        <li><a class="grey-text" href="#!">Twitter</a></li>
                        <li><a class="grey-text" href="#!">Instagram</a></li>
                    </ul>
                </div>
                <div class="col l4 s12">
                    <b class="white-text">KONTAK KAMI</b>
                    <ul>
                        <li><a class="grey-text" href="#!">
                            <p>
                                Jl. Syahdan Kemanggisan,<br>
                                Jakarta Barat
                            </p>
                        </a></li>
                    </ul>
                </div>
                <div class="col l4 s12">
                    <b class="white-text">SUBSCRIBE</b>
                    <ul>
                        <li><a class="grey-text" href="#!">
                            <p>
                                Dapatkan diskon produk terbaru kami
                            </p>
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © Jual Apps, 2016
                <a class="grey-text right" href="#!">Terms and Conditions</a>
                <a class="grey-text right" href="#!">Privacy Policy</a>
            </div>
        </div>
    </footer>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
          
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    @yield('script')
</body>
</html>
