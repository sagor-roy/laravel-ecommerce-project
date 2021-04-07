@extends('frontend.layout.master-layout')

@section('title')
    Category
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
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend') }}/img/breadcrumb.jpg">
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

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                @foreach($category as $cate)
                                    <li><a style="line-height: 50px;" href="{{ route('catePro',$cate->id) }}">{{ ucfirst($cate->category_name) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                     data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        @foreach($latestFirst as $latest)
                                            <a href="{{ route('productDetail',$latest->id) }}" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img style="width: 100px" src="{{ asset($latest->first_image) }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $latest->brand->brand }}</h6>
                                                    <span>{{ number_format($latest->price) }}&#2547;</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                        @foreach($latestLast as $latest)
                                            <a href="{{ route('productDetail',$latest->id) }}" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img style="width: 100px" src="{{ asset($latest->first_image) }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $latest->brand->brand }}</h6>
                                                    <span>{{ number_format($latest->price) }}&#2547;</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            @foreach($cateHead as $head)
                            <h2>{{ ucwords($head->category_name) }}</h2>
                                @endforeach
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">

                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{ count($all) }}</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($product as $products)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div style="border: 3px solid #cac7c7;" class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset($products->first_image) }}">
                                    <ul class="product__item__pic__hover">
                                        <li>
                                            @if(session()->has('LoggedCustomer'))
                                                <form action="{{ route('wishlist') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                                                    <input type="hidden" name="price" value="{{ $products->price }}">
                                                    <input type="hidden" name="brand_id" value="{{ $products->brand_id }}">
                                                    <input type="hidden" name="first_image" value="{{ $products->first_image }}">
                                                    <input type="hidden" name="second_image" value="{{ $products->second_image }}">
                                                    <input type="hidden" name="third_image" value="{{ $products->third_image }}">
                                                    <input type="hidden" name="fourth_image" value="{{ $products->fourth_image }}">
                                                    <button
                                                            onMouseOver="this.style.background='#7fad39'"
                                                            onMouseOut="this.style.background='#ffffff'"
                                                            style="background-color: white;border-radius: 50px;" class="btn" type="submit"><i class="fa fa-heart"></i></button>
                                                </form>
                                            @else
                                                <a style="cursor: pointer;" onclick="alert('Please Login first');"><i class="fa fa-heart"></i></a>
                                            @endif
                                        </li>
                                        <li><a href="{{ route('productDetail',$products->id) }}"><i class="fa fa-eye"></i></a></li>
                                        <li>
                                            <form action="{{ route('cart') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $products->id }}">
                                                <input type="hidden" name="price" value="{{ $products->price }}">
                                                <input type="hidden" name="brand_id" value="{{ $products->brand_id }}">
                                                <input type="hidden" name="first_image" value="{{ $products->first_image }}">
                                                <input type="hidden" name="second_image" value="{{ $products->second_image }}">
                                                <input type="hidden" name="third_image" value="{{ $products->third_image }}">
                                                <input type="hidden" name="fourth_image" value="{{ $products->fourth_image }}">
                                                <button
                                                        onMouseOver="this.style.background='#7fad39'"
                                                        onMouseOut="this.style.background='#ffffff'"
                                                        style="background-color: white;border-radius: 50px;" class="btn" type="submit"><i class="fa fa-shopping-cart"></i></button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__details__rating text-center">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{ route('productDetail',$products->id) }}">{{ $products->brand->brand }}</a></h6>
                                    <h5>{{ number_format($products->price) }}&#2547;</h5>
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>
                    {{ $product->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection