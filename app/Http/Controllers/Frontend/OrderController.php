<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use App\Models\Frontend\OrderItem;
use App\Models\Frontend\OrderManage;
use App\Models\Frontend\Shipping;
use Carbon\Carbon;
use App\Models\Frontend\Cart;
use App\Models\Frontend\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public  function store(Request $request){
        $request->validate([
            'name'=>'required|string|min:4',
            'email'=>'required|email',
            'number'=>'required|min:11|max:11',
            'country'=>'required',
            'city'=>'required|string',
            'postcode'=>'required',
            'address'=>'required|string',
            'payment'=>'required',
        ]);

        $order_id = Order::insertGetId([
            'user_id' => session('LoggedCustomer'),
            'payment_type' => $request->payment,
            'sub_total' => $request->subtotal,
            'total' => $request->total,
            'coupon_discount' => $request->discount,
            'invoice_no' => substr(md5(time()), 0, 15),
            'created_at' => Carbon::now(),
        ]);


        $cart = Cart::where('user_ip',request()->ip())->get();
        foreach($cart as $carts){
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $carts->product_id,
                'quantity' => $carts->quantity,
                'created_at' => Carbon::now(),
            ]);
        }

        Shipping::insert([
            'order_id' => $order_id,
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'country' => $request->country,
            'city' => $request->city,
            'post_code' => $request->postcode,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);

        Cart::where('user_ip',request()->ip())->delete();
        Wishlist::where('user_id',session('LoggedCustomer'))->where('user_ip',request()->ip())->delete();
        if(Session::has('coupon')){
            session()->forget('coupon');
        }

        return redirect('order-success');

    }


    public function orderManage(Request $request){
        $mnageOrder = Order::where('user_id',$request->user_id)->first();
            OrderManage::insertGetId([
            'user_id' => $request->user_id,
            'payment_type' => $request->payment_type,
            'sub_total' => $request->sub_total,
            'total' => $request->total,
            'coupon_discount' => $request->coupon_discount,
            'invoice_no' => $mnageOrder->invoice_no,
            'process' => 'waiting',
            'created_at' => $mnageOrder->created_at,
        ]);

        Order::where('user_id',$request->user_id)->delete();
        return redirect()->back();
    }

    public function orderMangeUpdate(Request $request,$id){
        $orderManage = OrderManage::find($id);
        $orderManage->process = $request->process;
        $orderManage->update();
        return redirect()->back();
    }
}
