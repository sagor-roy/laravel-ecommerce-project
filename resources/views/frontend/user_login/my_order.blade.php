@extends('frontend.layout.master-layout')

@section('title')
    My Order
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
                <?php
                $orderManage = \App\Models\Frontend\OrderManage::where('user_id',session('LoggedCustomer'))->get();
                ?>
                <div class="card-body">
                    <div class="row">
                        @include('frontend.user_login.layout.menu')
                        <div class="col-md-9">
                            <div
                                    @if(count($orderManage) > 4)
                                            @else
                                    style="height: 350px;"
                                            @endif
                                    class="card">
                                <div class="card-body">
                                    @if(count($orderManage) > 0)
                                    <table class="table table-bordered table-striped">
                                        <h3 class="my-2">My Order</h3>
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>No.</th>
                                            <th>Invoice No.</th>
                                            <th>Payment Type</th>
                                            <th>Sub Total</th>
                                            <th>Order Date</th>
                                            <th>Process</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->invoice_no }}</td>
                                            <td>{{ $row->payment_type }}</td>
                                            @if($row->total == NULL)
                                                <td>{{ number_format($row->sub_total) }}&#2547;</td>
                                            @else
                                                <td>{{ number_format($row->total) }}&#2547;</td>
                                            @endif
                                            <td>{{ $row->created_at }}</td>
                                            @if($row->process == 'waiting')
                                            <td><span style="border-radius: 50px;" class="bg-danger px-3 text-white">{{ $row->process }}</span></td>
                                            @else
                                            <td><span style="border-radius: 50px;" class="bg-success px-3 text-white">{{ $row->process }}</span></td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                        @else
                                            <h3 class="my-2">My Order</h3>
                                            <hr>
                                        <h4 style="margin-top: 120px;" class="text-danger text-center">( Empty )</h4>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection