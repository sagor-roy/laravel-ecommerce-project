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
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Update Brand</a></li>
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
                    <h3 class="panel-title">Update Brand</h3>
                    <div class="panel-actions">
                        <ul>
                            <li class="action toggle-panel panel-expand"><span></span></li>
                            <li class="action"><span class="fa fa-bars action" aria-hidden="true"></span></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-content">
                    @foreach($show as $brands)
                    <form class="form-horizontal" action="{{ route('admin.brand.update',$brands->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="brand" class="col-sm-4 control-label">Brand Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="brand" id="brand" value="{{ $brands->brand }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a style="margin-top: 10px;" class="btn btn-warning" href="{{ route('admin.brand.brand') }}">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection