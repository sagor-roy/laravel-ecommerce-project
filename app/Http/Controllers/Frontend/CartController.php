<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Cart;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Cart::where('user_ip',request()->ip())->get();
        if(count($all) > 0){
            $category = Category::where('status','active')->latest()->get();
            $cart = Cart::where('user_ip',request()->ip())->get();
            return view('frontend.cart.cart',compact('category','cart'));
        }else{
            return redirect('shop');
        }
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
        $check = Cart::where('product_id',$request->product_id)->where('user_ip',request()->ip())->first();
        if($check){
            Cart::where('product_id',$request->product_id)->where('user_ip',request()->ip())->get();
            session()->flash('type','danger');
            session()->flash('message','Product already add to cart');
            return redirect()->back();
        }else{
            $cart = new Cart();
            $cart->product_id = $request->product_id;
            $cart->quantity = 1;
            $cart->brand_id = $request->brand_id;
            $cart->first_image = $request->first_image;
            $cart->second_image = $request->second_image;
            $cart->third_image = $request->third_image;
            $cart->fourth_image = $request->fourth_image;
            $cart->price = $request->price;
            $cart->user_ip = request()->ip();
            $cart->save();
        }
        session()->flash('type','success');
        session()->flash('message','Product add to cart');
        return redirect()->back();
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
        $request->validate([
            'update_quan' => 'integer|min:0',
        ]);

        $update = Cart::find($id);
        $update->quantity = $request->update_quan;
        $update->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::find($id)->delete();
        return redirect()->back();
    }
}
