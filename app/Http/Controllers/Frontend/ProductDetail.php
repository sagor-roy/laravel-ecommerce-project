<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Frontend\Cart;

class ProductDetail extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'qty' => 'integer|min:0',
        ]);

        $check = Cart::where('product_id',$request->pro_id)->where('user_ip',request()->ip())->first();
        if($check){
            Cart::where('product_id',$request->pro_id)->where('user_ip',request()->ip())->get();
            session()->flash('type','danger');
            session()->flash('message','Product already add to cart');
            return redirect()->back();
        }else{
            $cart = new Cart();
            $cart->product_id = $request->pro_id;
            $cart->quantity = $request->qty;
            $cart->price = $request->price;
            $cart->brand_id = $request->brand_id;
            $cart->first_image = $request->first_image;
            $cart->second_image = $request->second_image;
            $cart->third_image = $request->third_image;
            $cart->fourth_image = $request->fourth_image;
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
        $product = Product::where('id',$id)->where('status','active')->get();
        $rel = Product::find($id);
        $cat = $rel->category_id;
        $relPro = Product::where('category_id',$cat)->latest()->limit(10)->where('id','!=',$id)->get();
        $category = Category::where('status','active')->latest()->get();
        return view('frontend.product_details.product_details',compact('product','category','relPro'));
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
        //
    }
}
