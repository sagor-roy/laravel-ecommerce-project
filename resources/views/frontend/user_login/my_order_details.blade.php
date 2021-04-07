@extends('frontend.layout.master-layout')

@section('title')
    My Order Details
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

    <section id="user_profile">
        <div class="container">
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
                                   <h3>My Order Details</h3>
                                   <hr>
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <table class="table table-bordered table-striped">
                                               <tbody>
                                               <tr>
                                                   <td>Name</td>
                                                   <td>hdshfi</td>
                                               </tr>
                                               <tr>
                                                   <td>Name</td>
                                                   <td>hdshfi</td>
                                               </tr>
                                               <tr>
                                                   <td>Name</td>
                                                   <td>hdshfi</td>
                                               </tr>

                                               </tbody>
                                           </table>
                                       </div>
                                       <div class="col-sm-8">
                                           <table class="table table-bordered table-striped">
                                               <thead>
                                               <tr>
                                                   <th>Image</th>
                                                   <th>Brand Name</th>
                                                   <th>Brand Code</th>
                                                   <th>Quantity</th>
                                               </tr>
                                               </thead>
                                               <tbody>
                                               <tr>
                                                   <td>Name</td>
                                                   <td>Name</td>
                                                   <td>Name</td>
                                                   <td>hdshfi</td>
                                               </tr>

                                               </tbody>
                                           </table>
                                       </div>
                                   </div>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection