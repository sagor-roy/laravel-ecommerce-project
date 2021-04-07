@extends('admin.layout.master-layout')
@section('title')
     Order Manage
    @endsection

@section('content')
        <!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Order Manage</a></li>
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
                    <h3 class="panel-title">Order Manage</h3>
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
                                <th>Process</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($OrderManage as $row)
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
                                    <form action="{{ route('orderMangeUpdate',$row->id) }}" method="post">
                                        @csrf
                                        <select style="margin-top: 10px;" class="btn btn-sm btn-secondary" name="process">
                                            <option value="waiting" {{ $row->process == 'waiting' ? 'selected':'' }}>waiting</option>
                                            <option value="shifted" {{ $row->process == 'shifted' ? 'selected':'' }}>shifted</option>
                                            <option value="return" {{ $row->process == 'return' ? 'selected':'' }}>return</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-<?php
                                        if($row->process == 'waiting'){
                                            echo 'warning';
                                        }elseif($row->process == 'shifted'){
                                            echo 'success';
                                        }elseif($row->process == 'return'){
                                            echo 'danger';
                                        }
                                        ?>"><i class="icon fa fa-check"></i></button>
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