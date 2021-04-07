@extends('admin.layout.master-layout')
@section('title')
    Manage Product
    @endsection

@section('content')
        <!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Manage Product</a></li>
        </ul>
    </div>
</div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--Panel STATES-->
    <div class="row">
        <!--Panel SUCCESS-->
        <div class="col-sm-12">
            @if(session('delMessage'))
                <div class="alert alert-{{ session('type') }} fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>{{ session('type') == 'success' ? 'Success':'Error' }} !</strong> {{ session('delMessage') }}
                </div>
            @endif
            <div class="panel">
                <div class="panel-header panel-success">
                    <h3 class="panel-title">Manage Product</h3>
                    <div class="panel-actions">
                        <ul>
                            <li class="action toggle-panel panel-expand"><span></span></li>
                            <li class="action"><span class="fa fa-bars action" aria-hidden="true"></span></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover text-center" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Category</th>
                                <th>Pro. Title</th>
                                <th>Pro. Code</th>
                                <th>Sort Desc.</th>
                                <th>Long Desc.</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $products)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $products->category->category_name }}</td>
                                <td>{{ substr($products->product_title,0,10).'.....' }}</td>
                                <td>{{ $products->brand->brand_code }}</td>
                                <td>{{ substr($products->sort_desc,0,15).'.....' }}</td>
                                <td>{{ substr($products->long_desc,0,25).'.....' }}</td>
                                <td>{{ $products->price }}&#2547;</td>
                                <td><img width="50px" src="{{ asset($products->first_image) }}" alt="first image"></td>
                                <td><span class="badge x-{{ $products->status == 'active' ? 'success':'danger' }}">{{ $products->status }}</span></td>
                                <td>
                                    <form action="{{ route('admin.product.destroy',$products->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a style="margin-top: 10px;" class="btn btn-sm btn-info" href="{{ route('admin.product.show',$products->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                                        <button onclick="return confirm('Are you sure to Delete?');" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection