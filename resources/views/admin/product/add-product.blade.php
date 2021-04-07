@extends('admin.layout.master-layout')
@section('title')
    Add Product
    @endsection

@section('content')
        <!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Add Product</a></li>
        </ul>
    </div>
</div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--Panel STATES-->
    <div class="row">
        <!--Panel SUCCESS-->
        <div class="col-sm-12 col-md-8 col-md-offset-2">
            @if(session('message'))
                <div class="alert alert-{{ session('type') }} fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>{{ session('type') == 'success' ? 'Success':'Error' }} !</strong> {{ session('message') }}
                </div>
            @endif
            <div class="panel">
                <div class="panel-header panel-success">
                    <h3 class="panel-title">Add Product</h3>
                    <div class="panel-actions">
                        <ul>
                            <li class="action toggle-panel panel-expand"><span></span></li>
                            <li class="action"><span class="fa fa-bars action" aria-hidden="true"></span></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="inline-validation" class="form-horizontal form-stripe" action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="category" class="col-sm-3 control-label">Category Name</label>
                                    <div class="col-sm-9">
                                        <select name="category_name" id="category" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach($category as $cate)
                                            <option value="{{ $cate->id }}" {{ old('category_name') == $cate->id ? 'selected':''  }}>{{ $cate->category_name }}</option>
                                                @endforeach
                                        </select>
                                        @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <label for="brand" class="col-sm-3 control-label">Brand Name</label>
                                    <div class="col-sm-9">
                                        <select name="brand_name" id="brand" class="form-control">
                                            <option value="">Select Brand</option>
                                            @foreach($brand as $brands)
                                            <option value="{{ $brands->id }}" {{ old('brand_name') == $brands->id ? 'selected':'' }}>{{ $brands->brand }}</option>
                                                @endforeach
                                        </select>
                                        @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_title" class="col-sm-3 control-label">Product Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="product_title" name="product_title" value="{{ old('product_title') }}">
                                        @error('product_title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="sort_desc" class="col-sm-3 control-label">Sort Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="sort_desc" class="form-control" id="sort_desc" rows="3">{{ old('sort_desc') }}</textarea>
                                        @error('sort_desc')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <label for="long_desc" class="col-sm-3 control-label">Long Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="long_desc" class="form-control" id="long_desc" rows="6">{{ old('long_desc') }}</textarea>
                                        @error('long_desc')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="price" class="col-sm-3 control-label">Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                                        @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="radioCustom1" class="col-sm-3 control-label">Status</label>
                                    <div class="col-sm-9">
                                        <div class="radio radio-custom radio-inline">
                                            <input type="radio" id="radioCustom1" name="status" value="active" {{ old('status') == 'active' ? 'checked':'' }}>
                                            <label for="radioCustom1">Active</label>
                                        </div>
                                        <div class="radio radio-custom radio-inline radio-primary">
                                            <input type="radio" id="radioCustom2" name="status" value="inactive" {{ old('status') == 'inactive' ? 'checked':'' }}>
                                            <label for="radioCustom2">Inactive</label>
                                            @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="first_image" class="col-sm-3 control-label">Product Image</label>
                                    <div class="col-sm-4">
                                        <input type="file" name="first_image" class="form-control" id="first_image">
                                        @error('first_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="file" name="second_image" class="form-control" id="first_image">
                                        @error('second_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label for="first_image" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-4">
                                        <input type="file" name="third_image" class="form-control" id="first_image">
                                        @error('third_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="file" name="fourth_image" class="form-control" id="first_image">
                                        @error('fourth_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection