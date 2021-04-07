<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | online ecommerce site</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css" type="text/css">

</head>

<body>
<!-- Page Preloder -
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <?php
        $total = \App\Models\Frontend\Cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->price * $t->quantity;
        });

        $quantity = \App\Models\Frontend\Cart::all()->where('user_ip',request()->ip())->sum('quantity');

        $wish = \App\Models\Frontend\Wishlist::where('user_id',session('LoggedCustomer'))->where('user_ip',request()->ip())->get();
        ?>
        <div class="col-lg-3">
            <div class="header__cart">
                <ul>
                    <?php
                    $wishAll = \App\Models\Frontend\Wishlist::where('user_id',session('LoggedCustomer'))->where('user_ip',request()->ip())->get();
                    ?>
                    @if(count($wishAll) > 0)
                        <li><a href="{{ route('wishlistHome') }}"><i class="fa fa-heart"></i> <span>{{ count($wish) }}</span></a></li>
                    @else
                        <li><a style="cursor: pointer;" onclick="alert('Please add to wishlist');"><i class="fa fa-heart"></i> <span>{{ count($wish) }}</span></a></li>
                    @endif
                    <?php
                    $all =  \App\Models\Frontend\Cart::where('user_ip',request()->ip())->get();
                    ?>
                    @if(count($all) > 0)
                        <li><a href="{{ route('shoopingCart') }}"><i class="fa fa-shopping-bag"></i> <span>{{ $quantity }}</span></a></li>
                    @else
                        <li><a style="cursor: pointer;" onclick="alert('Please add to product');"><i class="fa fa-shopping-bag"></i> <span>{{ $quantity }}</span></a></li>
                    @endif
                </ul>
                <div class="header__cart__price">item: <span>{{ number_format($total) }}&#2547;</span></div>
            </div>
        </div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="img/language.png" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <?php
        if(session()->has('LoggedCustomer')){
            $customers = \App\Models\Frontend\Customer::where('id','=',session('LoggedCustomer'))->first();
        }
        ?>
        <div class="header__top__right__auth">
            @if(session()->has('LoggedCustomer'))
                <div class="header__top__right__language">
                    @if($customers->image)
                        <img class="rounded-circle" width="30px" height="30px" src="{{ asset($customers->image) }}" alt="profile image">
                    @else
                        <i class="fa fa-user"></i>
                    @endif
                    <?php
                    $customer =  \App\Models\Frontend\Customer::where('id','=',session('LoggedCustomer'))->first();
                    ?>
                    <div>{{ ucwords($customer->name) }}</div>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="{{ route('user.profile.myProfile') }}">Profile</a></li>
                        <li><a href="{{ route('user.profile.logout') }}">Logout</a></li>
                    </ul>
                </div>
            @else
                <a href="{{ route('user.login') }}"><i class="fa fa-user"></i> Login</a>
            @endif
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="{{ request()->is('/') ? 'active':'' }}"><a href="{{ route('home') }}">Home</a></li>
            <li class="{{ request()->is('shop') ? 'active':'' }}"><a href="{{ route('shop') }}">Shop</a></li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="{{ asset('frontend') }}/img/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            @if(session()->has('LoggedCustomer'))
                                <div class="header__top__right__language">
                                    @if($customers->image)
                                        <img class="rounded-circle" width="30px" height="30px" src="{{ asset($customers->image) }}" alt="profile image">
                                    @else
                                    <i class="fa fa-user"></i>
                                    @endif
                                    <?php
                                    $customer =  \App\Models\Frontend\Customer::where('id','=',session('LoggedCustomer'))->first();
                                    ?>
                                    <div>{{ ucwords($customer->name) }}</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="{{ route('user.profile.myProfile') }}">Profile</a></li>
                                        <li><a href="{{ route('user.profile.logout') }}">Logout</a></li>
                                    </ul>
                                </div>
                            @else
                                <a href="{{ route('user.login') }}"><i class="fa fa-user"></i> Login</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('frontend') }}/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="{{ request()->is('/') ? 'active':'' }}"><a href="{{ route('home') }}">Home</a></li>
                        <li class="{{ request()->is('shop') ? 'active':'' }}"><a href="{{ route('shop') }}">Shop</a></li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <?php
            $total = \App\Models\Frontend\Cart::all()->where('user_ip',request()->ip())->sum(function($t){
                return $t->price * $t->quantity;
            });

                $quantity = \App\Models\Frontend\Cart::all()->where('user_ip',request()->ip())->sum('quantity');

                $wish = \App\Models\Frontend\Wishlist::where('user_id',session('LoggedCustomer'))->where('user_ip',request()->ip())->get();
            ?>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <?php
                        $wishAll = \App\Models\Frontend\Wishlist::where('user_id',session('LoggedCustomer'))->where('user_ip',request()->ip())->get();
                        ?>
                        @if(count($wishAll) > 0)
                        <li><a href="{{ route('wishlistHome') }}"><i class="fa fa-heart"></i> <span>{{ count($wish) }}</span></a></li>
                            @else
                        <li><a style="cursor: pointer;" onclick="alert('Please add to wishlist');"><i class="fa fa-heart"></i> <span>{{ count($wish) }}</span></a></li>
                            @endif
                        <?php
                        $all =  \App\Models\Frontend\Cart::where('user_ip',request()->ip())->get();
                        ?>
                        @if(count($all) > 0)
                            <li><a href="{{ route('shoopingCart') }}"><i class="fa fa-shopping-bag"></i> <span>{{ $quantity }}</span></a></li>
                            @else
                            <li><a style="cursor: pointer;" onclick="alert('Please add to product');"><i class="fa fa-shopping-bag"></i> <span>{{ $quantity }}</span></a></li>
                            @endif
                    </ul>
                    <div class="header__cart__price">item: <span>{{ number_format($total) }}&#2547;</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->