@extends('admin.layout.master-layout')
@section('title')
    Brand
    @endsection

@section('content')
        <!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Brand</a></li>
        </ul>
    </div>
</div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--Panel STATES-->
    <div class="row">
        <!--Panel SUCCESS-->
        <div class="col-sm-5">
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
                    <h3 class="panel-title">Add Brand</h3>
                    <div class="panel-actions">
                        <ul>
                            <li class="action toggle-panel panel-expand"><span></span></li>
                            <li class="action"><span class="fa fa-bars action" aria-hidden="true"></span></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-content">
                    <form class="form-horizontal" action="{{ route('admin.brand.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="brand" class="col-sm-4 control-label">Brand Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="brand" value="{{ old('brand') }}" id="brand" placeholder="Enter Brand Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Panel WARNING-->
        <div class="col-sm-7">
            @if(session('delMessage'))
                <div class="alert alert-{{ session('type') }} fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>{{ session('type') == 'info' ? 'Success':'Error' }} !</strong> {{ session('delMessage') }}
                </div>
            @endif
            <div class="panel">
                <div class="panel-header  panel-info">
                    <h3 class="panel-title">Manage Brand</h3>
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
                                <th>Brand Name</th>
                                <th>Brand Code</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brand as $brands)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $brands->brand }}</td>
                                <td>{{ $brands->brand_code }}</td>
                                <td>
                                    <form action="{{ route('admin.brand.destroy',$brands->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a style="margin-top: 10px;" class="btn btn-sm btn-info" href="{{ route('admin.brand.show',$brands->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                                        <button id="warning-alert" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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