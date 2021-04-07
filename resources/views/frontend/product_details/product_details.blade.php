@extends('frontend.layout.master-layout')

@section('title')
    Product Detail
    @endsection

@section('content')
    <style>
        .star1 button {
            border: none;
            background-color: transparent;
            padding: 16px 25px 0px 0px;
            font-size: 20px;
        }
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:absolute;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }

    </style>

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
                        <h2>Product Details</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home') }}">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            @foreach($product as $products)
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                 src="{{ asset($products->first_image) }}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="{{ asset($products->fourth_image) }}"
                                 src="{{ asset($products->fourth_image) }}" alt="">
                            <img data-imgbigurl="{{ asset($products->third_image) }}"
                                 src="{{ asset($products->third_image) }}" alt="">
                            <img data-imgbigurl="{{ asset($products->second_image) }}"
                                 src="{{ asset($products->second_image) }}" alt="">
                            <img data-imgbigurl="{{ asset($products->first_image) }}"
                                 src="{{ asset($products->first_image) }}" alt="">

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $products->product_title }}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">{{ number_format($products->price) }}&#2547;</div>
                        <p>{{ $products->sort_desc }}</p>
                        <div class="product__details__quantity">
                            <form action="{{ route('detailCart') }}" method="post">
                                @csrf
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="hidden" name="price" value="{{ $products->price }}">
                                        <input type="hidden" name="pro_id" value="{{ $products->id }}">
                                        <input type="hidden" name="brand_id" value="{{ $products->brand_id }}">
                                        <input type="hidden" name="first_image" value="{{ $products->first_image }}">
                                        <input type="hidden" name="second_image" value="{{ $products->second_image }}">
                                        <input type="hidden" name="third_image" value="{{ $products->third_image }}">
                                        <input type="hidden" name="fourth_image" value="{{ $products->fourth_image }}">
                                        <input type="text" name="qty" value="1">
                                    </div>
                                </div>
                        </div>
                        <button type="submit" class="primary-btn border-0">ADD TO CARD</button>
                            </form>
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
                                <button class="heart-icon border-0" type="submit"><i class="fa fa-heart"></i></button>
                            </form>
                        @else
                            <a class="heart-icon" style="cursor: pointer;" onclick="alert('Please Login first');"><i class="fa fa-heart"></i></a>
                        @endif
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php
                $commnet = \App\Models\Frontend\Comments::where('product_id',$products->id)->get();
                ?>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                   aria-selected="true">Comments ({{ count($commnet) }})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                   aria-selected="false">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                   aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">

                                <form action="{{ route('rating',$products->id) }}" method="post">
                                    @csrf
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>



                                <div class="product__details__tab__desc">
                                    <?php
                                    $commnet = \App\Models\Frontend\Comments::where('product_id',$products->id)->get();
                                    ?>
                                    <h6>Comment ({{ count($commnet) }})</h6>
                                    <div class="card">
                                        <div class="card-body">
                                            {{--<div style="margin-bottom: 25px" class="comment">--}}
                                                {{--<h4><img width="20px" src="{{ asset('frontend/user.png') }}" alt=""> User</h4>--}}
                                                {{--<p class="">hello admin how are you</p>--}}
                                                {{--<h4 class="ml-5"><img width="20px" src="{{ asset('frontend/user.png') }}" alt=""> Admin</h4>--}}
                                                {{--<p class="ml-5">hello admin how are you</p>--}}
                                            {{--</div>--}}
                                            <?php
                                            $commnet = \App\Models\Frontend\Comments::where('product_id',$products->id)->get();
                                            ?>
                                            @if($commnet)
                                            @foreach($commnet as $row)
                                                <?php
                                                    $customer = \App\Models\Frontend\Customer::where('id',$row->user_id)->first();
                                                    ?>
                                                    <div class="comment">
                                                        <h4>@if($customer->image)
                                                                <img width="40px" class="rounded-circle" src="{{ asset($customer->image) }}" alt="image">
                                                            @else
                                                                <img width="40px" class="rounded-circle" src="{{ asset('frontend/user.png') }}" alt="image">
                                                                @endif
                                                                {{ $customer->name }}</h4>
                                                        <p style="display: inline-block;color: white;padding: 2px 15px;border-radius: 50px;" class="ml-5 bg-secondary">{{ $row->comment }}</p>
                                                        <p class="time_ago text-primary">{{ $row->created_at->diffForHumans() }}
                                                            @if($row->user_id == session('LoggedCustomer'))
                                                            <span class="ml-3"><a class="text-danger" href="{{ route('commentDelete',$row->id) }}">Delete</a></span>
                                                                @else
                                                            @endif
                                                        </p>
                                                    </div>
                                                @endforeach
                                            @else
                                                @endif

                                            <div class="comment_box mt-5">
                                                @if(session('LoggedCustomer'))
                                                    <form action="{{ route('comment') }}" method="post">
                                                        @csrf
                                                        <input type="text" name="comment" class="form-control" placeholder="Comment" required>
                                                        @error('comment')
                                                        <span class="text-danger">{{ $message }}<br></span>
                                                        @enderror
                                                        <input type="hidden" name="product_id" class="form-control" value="{{ $products->id }}">
                                                        <button type="submit" class="btn btn-primary">Comment</button>
                                                    </form>
                                                @else
                                                    <input type="text" class="form-control" placeholder="Comment">
                                                    <a onclick="alert('Please Login first');"  class="btn btn-primary text-white">Comment</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Description</h6>
                                    <p>{{ $products->long_desc }}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Review</h6>
                                    <p>{{ $products->long_desc }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="categories__slider owl-carousel">
                        @foreach($relPro as $products)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div style="border:4px solid #f3f4f9;" class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{asset($products->first_image)}}">
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
                                            <li><a href="{{  route('productDetail',$products->id) }}"><i class="fa fa-retweet"></i></a></li>
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
                                        <h6><a href="{{  route('productDetail',$products->id) }}">{{ $products->brand->brand }}</a></h6>
                                        <h5>{{ number_format($products->price) }}&#2547;</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
@endsection