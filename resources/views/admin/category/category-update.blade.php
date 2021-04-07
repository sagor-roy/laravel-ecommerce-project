@extends('admin.layout.master-layout')
@section('title')
    Category
    @endsection

@section('content')
        <!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Update Category</a></li>
        </ul>
    </div>
</div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--Panel STATES-->
    <div class="row">
        <!--Panel SUCCESS-->
        <div class="col-sm-12 col-md-8 col-md-offset-2">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                @if(session('message'))
                    <div class="alert alert-{{ session('type') }} fade in">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>{{ session('type') == 'success' ? 'Success':'Error' }} !</strong> {{ session('message') }}
                    </div>
                @endif
            <div class="panel">
                <div class="panel-header panel-success">
                    <h3 class="panel-title">Update Category</h3>
                    <div class="panel-actions">
                        <ul>
                            <li class="action toggle-panel panel-expand"><span></span></li>
                            <li class="action"><span class="fa fa-bars action" aria-hidden="true"></span></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-content">
                    @foreach($show as $category)
                    <form class="form-horizontal" action="{{ route('admin.category.update',$category->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="categroy" class="col-sm-4 control-label">Category Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="category_name" id="categroy" value="{{ $category->category_name }}">
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="categroy" class="col-sm-4 control-label">Status</label>
                            <div class="col-sm-8">
                                <div class="radio radio-custom radio-inline">
                                    <input type="radio" id="radioCustom1" name="status" value="active" {{  $category->status == 'active' ? 'checked':'' }}>
                                    <label for="radioCustom1">Active</label>
                                </div>
                                <div class="radio radio-custom radio-inline radio-primary">
                                    <input type="radio" id="radioCustom2" name="status" value="inactive" {{  $category->status == 'inactive' ? 'checked':'' }}>
                                    <label for="radioCustom2">Inactive</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a style="margin-top: 10px;" class="btn btn-warning" href="{{ route('admin.category.category') }}">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection