@extends('frontend.layout.master-layout')

        @section('title')
        Shooping Cart
        @endsection

@section('content')

                <!-- Hero Section Begin -->
        <section class="hero hero-normal">
            <div class="container">
                @if(session('message'))
                    <div class="alert alert-{{ session('type') == 'success' ? 'success':'danger' }} alert-dismissible fade show" role="alert">
                        <strong>{{ session('type') == 'success' ? 'Success':'Sorry' }} ! </strong> {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>All Category</span>
                            </div>
                            <ul>
                                @foreach($category as $cate)
                                    <li><a style="line-height: 50px;" href="{{ route('catePro',$cate->id) }}">{{ ucfirst($cate->category_name) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="hero__search">
                            @include('frontend.search.search')
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>+65 11.188.888</h5>
                                    <span>support 24/7 time</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->

        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Organi Shop</h2>
                            <div class="breadcrumb__option">
                                <a href="{{ route('home') }}">Home</a>
                                <span>Shop</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->


        <!-- Shoping Cart Section Begin -->
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $pro)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img width="80px" src="{{ asset($pro->first_image) }}" alt="">
                                        <h5>{{ $pro->brand->brand }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{ number_format($pro->price) }}&#2547;
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <form action="{{ route('updateQuan',$pro->id) }}" method="post">
                                            @csrf
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" name="update_quan" value="{{ $pro->quantity }}">
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                        </form>
                                    </td>
                                    <?php
                                    $total = $pro->quantity * $pro->price;
                                    ?>
                                    <td class="shoping__cart__total">
                                        {{ number_format($total) }}&#2547;
                                    </td>
                                    <td class="shoping__cart__item__close text-danger">
                                        <a class="btn btn-danger" href="{{ route('productDelete',$pro->id) }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="{{ route('shop') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @if(Session::has('coupon'))
                            @else
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Discount Codes</h5>
                                <form action="{{ route('discountCoupon') }}" method="post">
                                    @csrf
                                    <input type="text" name="coupon_name" value="{{ old('coupon_name') }}" placeholder="Enter your coupon code">
                                    <button type="submit" class="site-btn">APPLY COUPON</button>
                                    <br>
                                    @error('coupon_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    @if(session('faild'))
                                        <span class="text-danger">{{ session('faild') }}</span>
                                        @endif
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <?php
                            $total = \App\Models\Frontend\Cart::all()->where('user_ip',request()->ip())->sum(function($t){
                                return $t->price * $t->quantity;
                            });
                            ?>
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Subtotal <span>{{ number_format($total) }}&#2547;</span></li>
                                @if(Session::has('coupon'))
                                    <?php
                                    $gtotal = $total * session()->get('coupon')['discount']/100;
                                    ?>
                                    <li>Discount <a class="btn btn-danger btn-sm" href="{{ route('couponDestroy') }}">remove</a> <span>{{ session()->get('coupon')['discount'] }}% ( {{ number_format($gtotal) }}&#2547; )</span></li>
                                    <li>Total <span>{{ number_format($total - $gtotal) }}&#2547;</span></li>
                                    @else
                                    @endif
                            </ul>
                                @if(session()->has('LoggedCustomer'))
                            <a href="{{ route('checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                                    @else
                                    <a onclick="alert('Please login first');" href="{{ route('user.login') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shoping Cart Section End -->


        @endsection