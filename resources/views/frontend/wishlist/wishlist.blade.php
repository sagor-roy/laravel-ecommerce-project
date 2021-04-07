@extends('frontend.layout.master-layout')

@section('title')
    Wish List
    @endsection

    @section('content')

            <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
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
                        <h2>Wish List</h2>
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
            @if(session('message'))
                <div class="alert alert-{{ session('type') == 'success' ? 'success':'danger' }} alert-dismissible fade show" role="alert">
                    <strong>{{ session('type') == 'success' ? 'Success':'Sorry' }} ! </strong> {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <tbody>
                            @foreach($wishlist as $row)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img width="80px" src="{{ asset($row->first_image) }}" alt="">
                                    <?php
                                    $brand = \App\Models\Admin\Brand::find($row->brand_id);
                                    ?>
                                    <h5>{{ $brand->brand }}</h5>
                                </td>
                                <td class="">
                                    Brand Code : {{ $brand->brand_code }}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <form action="{{ route('cart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $row->id }}">
                                        <input type="hidden" name="price" value="{{ $row->price }}">
                                        <input type="hidden" name="brand_id" value="{{ $row->brand_id }}">
                                        <input type="hidden" name="first_image" value="{{ $row->first_image }}">
                                        <input type="hidden" name="second_image" value="{{ $row->second_image }}">
                                        <input type="hidden" name="third_image" value="{{ $row->third_image }}">
                                        <input type="hidden" name="fourth_image" value="{{ $row->fourth_image }}">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart"></i> Add to Card</button>
                                    </form>
                                </td>
                                <td class="shoping__cart__item__close text-danger">
                                    <a class="btn btn-danger" href="{{ route('wishlistDestroy',$row->id) }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->


@endsection