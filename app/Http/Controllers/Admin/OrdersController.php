<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Customer;
use App\Models\Frontend\Order;
use App\Models\Frontend\OrderItem;
use App\Models\Frontend\OrderManage;
use App\Models\Frontend\Shipping;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::latest()->get();
        return view('admin.order.order',compact('order'));
    }

     public function orderMange()
    {
        $OrderManage = OrderManage::latest()->get();
        return view('admin.order.order_manage',compact('OrderManage'));
    }

     public function orderDetail($id)
    {
        $order = Order::where('user_id',$id)->first();
        $orderItem = OrderItem::where('order_id',$order->id)->get();
        $shipping = Shipping::where('order_id',$order->id)->get();
        return view('admin.order.order_details',compact('orderItem','shipping'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::where('user_id',$id)->delete();
        //OrderItem::where()->delete();
        //Shipping::where()->delete();
        session()->flash('type','success');
        session()->flash('delMessage','Order Deleted Successfull');
        return redirect()->back();
    }
}
