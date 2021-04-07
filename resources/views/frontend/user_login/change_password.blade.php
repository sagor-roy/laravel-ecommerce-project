@extends('frontend.layout.master-layout')

@section('title')
    Change Password
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

    <section id="user_profile">
        <div class="container">
            @if(session('message'))
                <div class="alert alert-{{ session('type') == 'success' ? 'success':'danger' }} alert-dismissible fade show" role="alert">
                    <strong>{{ session('type') == 'success' ? 'Success':'Sorry' }} ! </strong> {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="card-title">User Profile</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @include('frontend.user_login.layout.menu')
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('user.profile.updatePass',$LoggedCustomerInfo->id) }}" method="post">
                                        @csrf
                                        <table class="table">
                                            <h3 class="my-2">Change Password</h3>
                                            <tbody>
                                            <tr>
                                                <td>Old Password</td>
                                                <td>:</td>
                                                <td><input type="password" name="old_password" class="form-control" placeholder="Enter your old password">
                                                    @error('old_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>New Password</td>
                                                <td>:</td>
                                                <td><input type="password" name="password" class="form-control" placeholder="Enter your new password">
                                                    @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Confirm Password</td>
                                                <td>:</td>
                                                <td><input type="password" name="password_confirmation" class="form-control" placeholder="Enter your confirm password">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><input type="submit" class="btn btn-success" value="Update"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection