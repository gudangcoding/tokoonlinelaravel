<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hanifa Store</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>


     <link href="{{ asset(elixir('css/app.css')) }}" rel="stylesheet">

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
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Hanifa Store
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if(Auth::check())
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    @can('admin-access')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Manage <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('categories.index')}}"><i class="fa fa-btn fa-tags"></i>Categories</a></li>
                            <li><a href="{{ route('products.index')}}"><i class="fa fa-gift">Products</i></a></li>
                            <li><a href="{{ route('orders.index') }}"><i class="fa fa-btn fa-shopping-cart"></i>Orders</a></li>
                        </ul>
                    </li>
                        @endcan
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @include('layouts._customer-feature', ['partial_view'=>'layouts._cart-menu-bar'])
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if(Auth::check())
                                @can('admin-access')
                                <li><a href="{{url('profile/edit') }}"><i class="fa fa-user-md"></i>Profile</a></li>
                                @endcan
                                @endif
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if(session()->has('flash_notification.message'))
        <div class="container">
            <div class="alert alert-{{session()->get('flash_notification.level')}}">
                <button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>
                {{session()->get('flash_notification.message')}}
            </div>
        </div>
    @endif

    @yield('content')
    <script src="{{ asset(elixir('js/all.js')) }}"></script>

    @if(Session::has('flash_product_name'))
        @include('catalogs._product-added', ['product_name'=> Session::get('flash_product_name')])
    @endif

</body>
</html>
