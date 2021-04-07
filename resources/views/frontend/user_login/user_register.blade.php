@extends('frontend.layout.master-layout')

        @section('title')
        User Register
        @endsection

@section('content')
<!-- Hero Section Begin -->
<section class="hero">
<div class="container">

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

        <div class="log-in">
            @if(session('message'))
                <div class="alert alert-{{ session('type') == 'success' ? 'success':'danger' }} alert-dismissible fade show" role="alert">
                    <strong>{{ session('type') == 'success' ? 'Success':'Sorry' }} ! </strong> {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User Register</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <a class="btn btn-danger form-control" href=""><i class="fa fa-google"></i> Google</a>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-primary form-control" href=""><i class="fa fa-facebook"></i> Facebook</a>
                                </div>
                            </div>
                            <hr>
                            <form action="{{ route('user.store') }}" method="post">
                                @csrf
                            <div class="form-group">
                                <label for="email">User Name</label>
                                <input type="text" class="form-control" name="name" id="email" value="{{ old('name') }}" placeholder="Enter your name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Phone Number</label>
                                <input type="number" class="form-control" name="number" id="email" value="{{ old('number') }}" placeholder="Enter your number">
                                @error('number')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Password</label>
                                <input type="password" class="form-control" name="password" id="email"  placeholder="Enter your password">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="email" placeholder="Enter your confirm password">
                            </div>

                             <div class="form-group">
                                <label for="email"></label>
                                <input type="submit" class="form-control btn btn-success" value="Register">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <div class="card-title"><a class="text-success" href="{{ route('user.login') }}">All ready registerd?</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<!-- Hero Section End -->

<!-- Banner Begin -->
<div class="banner my-5">
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





@endsection