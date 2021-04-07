@extends('admin.layout.master-layout')
@section('title')
     Order Item
    @endsection

@section('content')
        <!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Order Item</a></li>
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
                    <h3 class="panel-title">Order Item</h3>
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
                                <th>Invoice No</th>
                                <th>Payment</th>
                                <th>Sub-total</th>
                                <th>Discount</th>
                                <th>Total</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->invoice_no }}</td>
                                <td>{{ $row->payment_type }}</td>
                                <td>{{ $row->sub_total }}&#2547;</td>
                                    @if($row->coupon_discount == NULL)
                                        <td>No</td>
                                        @else
                                    <td>{{ $row->coupon_discount }}%</td>
                                    @endif
                                @if($row->total == NULL)
                                    <td>{{ $row->sub_total }}&#2547;</td>
                                    @else
                                <td>{{ $row->total }}&#2547;</td>
                                @endif
                                <td>{{ $row->created_at }}</td>
                                <td>
                                    <form action="{{ route('orderManage') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $row->user_id }}">
                                        <input type="hidden" name="invoice_no" value="{{ $row->invoice_no }}">
                                        <input type="hidden" name="payment_type" value="{{ $row->payment_type }}">
                                        <input type="hidden" name="sub_total" value="{{ $row->sub_total }}">
                                        <input type="hidden" name="coupon_discount" value="{{ $row->coupon_discount }}">
                                        <input type="hidden" name="total" value="{{ $row->total }}">
                                        <input type="hidden" name="created_at" value="{{ $row->created_at }}">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button>
                                        <a onclick="return confirm('Are you sure to Delete?');" style="margin-top: 10px;" class="btn btn-sm btn-danger" href="{{ route('admin.order.orderDelete',$row->user_id) }}"><i class="fa fa-trash"></i></a> <a style="margin-top: 10px;" class="btn btn-sm btn-warning" href="{{ route('admin.order.orderDetail',$row->user_id) }}"><i class="fa fa-check"></i></a>
                                        <a style="margin-top: 10px;" class="btn btn-sm btn-success" href="{{ route('admin.order.invoice',$row->id) }}"><i class="fa fa-print"></i></a>
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