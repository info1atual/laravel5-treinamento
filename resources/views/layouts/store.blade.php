<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shop</title>

    <link href="{{ asset(elixir('css/all.css')) }}" rel="stylesheet">

</head><!--/head-->
<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> (19) 5555-5555</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> atendimento@schoolofnet.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ url() }}"><span>CodeCommerce</span></a>
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('account.orders') }}"><i class="fa fa-user"></i> Minha conta</a></li>
                            <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i> Carrinho</a></li>
                            
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}"><i class="fa fa-lock"></i> Login</a></li>
                                <li><a href="{{ url('/auth/register') }}"><i class="fa fa-sign-in"></i> Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('account.orders') }}">Área do Cliente</a></li>
                                        <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('/home') }}" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">Products</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="{{ route('cart') }}">Cart</a></li>
                                    
                                </ul>
                            </li>

                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>                        
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Buscar"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<section>
    <div class="container">
        <div class="row">

            @yield('categories')
          
            @yield('content')

        </div>
    </div>
    <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <ul class="list-inline item-details">
                <li><a href="http://themifycloud.com">ThemifyCloud</a></li>
                <li><a href="http://themescloud.org">ThemesCloud</a></li>
            </ul>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © {{ date('Y') }} CodeCommerce. All rights reserved.</p>
                <p class="pull-right">
                    Designed by 
                    <span>
                        <a target="_blank" href="http://about.me/wandrymoura">Wandry Moura</a> 
                        @if (isset(auth()->user()->id) && auth()->user()->is_admin == 1)
                            | 
                            <a href="{{ route('admin') }}" target="_blank">Administração</a>
                        @endif
                    </span>
                </p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->

<script src="{{ asset(elixir('js/all.js')) }}"></script>
@yield('scripts')

</body>
</html>