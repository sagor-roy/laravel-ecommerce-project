@extends('frontend.layout.master-layout')
        @section('title')
        Home
        @endsection

@section('content')
<!-- Hero Section Begin -->
<section class="hero">
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
                <span>All Categories</span>
            </div>
            <ul>
                @foreach($category as $cate)
                <li><a style="line-height: 50px;" href="{{ route('catePro',$cate->id) }}">{{ ucfirst($cate->category_name) }}</a></li>
               @endforeach
            </ul>
        </div>
    </div>
    <div class="col-lg-9">
        @include('frontend.search.search')
        <div class="hero__item set-bg" data-setbg="{{ asset('frontend') }}/img/hero/banner.jpg">
            <div class="hero__text">
                <span>FRESH ORDER</span>
                <h2>Online <br />Ecommerce Shop</h2>
                <p>Free Pickup and Delivery Available</p>
                <a href="{{ route('shop') }}" class="primary-btn">SHOP NOW</a>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
<div class="container">
<div class="row">
    <div class="categories__slider owl-carousel">
        @foreach($product as $products)
        <div style="border:1px solid #f4f3f9;" class="col-lg-3">
            <div class="categories__item set-bg" data-setbg="{{ asset($products->first_image) }}">
                <h5><a href="{{ route('productDetail',$products->id) }}">{{ $products->brand->brand }}</a></h5>
            </div>
        </div>
       @endforeach
    </div>
</div>
</div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="section-title">
            <h2>Featured Product</h2>
        </div>
        <div class="featured__controls">
            <ul>
                <li class="active" data-filter="*">All</li>
                @foreach($feature as $cate)
                <li data-filter=".filter{{ $cate->id }}">{{ $cate->category_name }}</li>
                    @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="row featured__filter">
    @foreach($feature as $cate)
       <?php
        $products = \App\Models\Admin\Product::where('category_id',$cate->id)->where('status','active')->limit(4)->latest()->get();
        ?>
    @foreach($products as $features)
    <div class="col-lg-3 col-md-4 col-sm-6 mix filter{{ $cate->id }}">
        <div style="border:4px solid #f3f4f9;" class="featured__item">
            <div class="featured__item__pic set-bg" data-setbg="{{ $features->first_image }}">
                <ul class="featured__item__pic__hover">
                    <li>
                        @if(session()->has('LoggedCustomer'))
                        <form action="{{ route('wishlist') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $features->id }}">
                            <input type="hidden" name="price" value="{{ $features->price }}">
                            <input type="hidden" name="brand_id" value="{{ $features->brand_id }}">
                            <input type="hidden" name="first_image" value="{{ $features->first_image }}">
                            <input type="hidden" name="second_image" value="{{ $features->second_image }}">
                            <input type="hidden" name="third_image" value="{{ $features->third_image }}">
                            <input type="hidden" name="fourth_image" value="{{ $features->fourth_image }}">
                            <button
                                    onMouseOver="this.style.background='#7fad39'"
                                    onMouseOut="this.style.background='#ffffff'"
                                    style="background-color: white;border-radius: 50px;" class="btn" type="submit"><i class="fa fa-heart"></i></button>
                        </form>
                            @else
                            <a style="cursor: pointer;" onclick="alert('Please Login first');"><i class="fa fa-heart"></i></a>
                        @endif
                    </li>
                    <li><a href="{{ route('productDetail',$features->id) }}"><i class="fa fa-eye"></i></a></li>
                    <li>
                        <form action="{{ route('cart') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $features->id }}">
                            <input type="hidden" name="price" value="{{ $features->price }}">
                            <input type="hidden" name="brand_id" value="{{ $features->brand_id }}">
                            <input type="hidden" name="first_image" value="{{ $features->first_image }}">
                            <input type="hidden" name="second_image" value="{{ $features->second_image }}">
                            <input type="hidden" name="third_image" value="{{ $features->third_image }}">
                            <input type="hidden" name="fourth_image" value="{{ $features->fourth_image }}">
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
            <div class="featured__item__text">
                <h6><a href="{{ route('productDetail',$features->id) }}">{{ $features->brand->brand }}</a></h6>
                <h5>{{ number_format($features->price) }}&#2547;</h5>
            </div>
        </div>
    </div>
        @endforeach
        @endforeach
</div>
</div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
<div class="container">
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="banner__pic">
            <img src="{{ asset('frontend') }}/img/banner/banner-1.jpg" alt="">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="banner__pic">
            <img src="{{ asset('frontend') }}/img/banner/banner-2.jpg" alt="">
        </div>
    </div>
</div>
</div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
<div class="container">
<div class="row">
    <div class="col-lg-4 col-md-6">
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
                    <a href="{{  route('productDetail',$latest->id) }}" class="latest-product__item">
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
    <div class="col-lg-4 col-md-6">
        <div class="latest-product__text">
            <h4>Top Rated Products</h4>
            <div class="latest-product__slider owl-carousel">
                <div class="latest-prdouct__slider__item">
                    <?php
                    $top = \App\Models\Admin\Product::where('status','active')->orderBy('price','DESC')->limit(3)->get();
                    ?>
                    @foreach($top as $topFirst)
                        <a href="{{  route('productDetail',$topFirst->id) }}" class="latest-product__item">
                            <div class="latest-product__item__pic">
                                <img style="width: 100px" src="{{ asset($topFirst->first_image) }}" alt="">
                            </div>
                            <div class="latest-product__item__text">
                                <h6>{{ $topFirst->brand->brand }}</h6>
                                <span>{{ number_format($topFirst->price) }}&#2547;</span>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="latest-prdouct__slider__item">
                    <?php
                    $top = \App\Models\Admin\Product::where('status','active')->orderBy('price','DESC')->skip(3)->take(3)->get();
                    ?>
                    @foreach($top as $topFirst)
                        <a href="{{  route('productDetail',$topFirst->id) }}" class="latest-product__item">
                            <div class="latest-product__item__pic">
                                <img style="width: 100px" src="{{ asset($topFirst->first_image) }}" alt="">
                            </div>
                            <div class="latest-product__item__text">
                                <h6>{{ $topFirst->brand->brand }}</h6>
                                <span>{{ number_format($topFirst->price) }}&#2547;</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="latest-product__text">
            <h4>Review Products</h4>
            <div class="latest-product__slider owl-carousel">
                <div class="latest-prdouct__slider__item">
                    <?php
                    $top = \App\Models\Admin\Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
                    ?>
                    @foreach($top as $topFirst)
                        <a href="{{  route('productDetail',$topFirst->id) }}" class="latest-product__item">
                            <div class="latest-product__item__pic">
                                <img style="width: 100px" src="{{ asset($topFirst->first_image) }}" alt="">
                            </div>
                            <div class="latest-product__item__text">
                                <h6>{{ $topFirst->brand->brand }}</h6>
                                <span>{{ number_format($topFirst->price) }}&#2547;</span>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="latest-prdouct__slider__item">
                    <?php
                    $top = \App\Models\Admin\Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
                    ?>
                    @foreach($top as $topFirst)
                        <a href="{{  route('productDetail',$topFirst->id) }}" class="latest-product__item">
                            <div class="latest-product__item__pic">
                                <img style="width: 100px" src="{{ asset($topFirst->first_image) }}" alt="">
                            </div>
                            <div class="latest-product__item__text">
                                <h6>{{ $topFirst->brand->brand }}</h6>
                                <span>{{ number_format($topFirst->price) }}&#2547;</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<!-- Latest Product Section End -->

<!-- Blog Section Begin -->
<section class="from-blog spad">
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="section-title from-blog__title">
            <h2>From The Blog</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="blog__item">
            <div class="blog__item__pic">
                <img src="{{ asset('frontend') }}/img/blog/blog-1.jpg" alt="">
            </div>
            <div class="blog__item__text">
                <ul>
                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                    <li><i class="fa fa-comment-o"></i> 5</li>
                </ul>
                <h5><a href="#">Cooking tips make cooking simple</a></h5>
                <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="blog__item">
            <div class="blog__item__pic">
                <img src="{{ asset('frontend') }}/img/blog/blog-2.jpg" alt="">
            </div>
            <div class="blog__item__text">
                <ul>
                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                    <li><i class="fa fa-comment-o"></i> 5</li>
                </ul>
                <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="blog__item">
            <div class="blog__item__pic">
                <img src="{{ asset('frontend') }}/img/blog/blog-3.jpg" alt="">
            </div>
            <div class="blog__item__text">
                <ul>
                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                    <li><i class="fa fa-comment-o"></i> 5</li>
                </ul>
                <h5><a href="#">Visit the clean farm in the US</a></h5>
                <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<!-- Blog Section End -->
@endsection