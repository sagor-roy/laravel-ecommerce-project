<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Wishlist;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishAll = Wishlist::where('user_id',session('LoggedCustomer'))->where('user_ip',request()->ip())->get();
        if(count($wishAll) > 0){
            $wishlist = Wishlist::where('user_id',session('LoggedCustomer'))->where('user_ip',request()->ip())->get();
            $category = Category::where('status','active')->latest()->get();
            return view('frontend.wishlist.wishlist',compact('category','wishlist'));
        }else{
            return redirect('/');
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
        $check = Wishlist::where('product_id',$request->product_id)->where('user_id',session('LoggedCustomer'))->where('user_ip',request()->ip())->first();
        if($check){
            Wishlist::where('product_id',$request->product_id)->where('user_id',session('LoggedCustomer'))->where('user_ip',request()->ip())->get();
            session()->flash('type','danger');
            session()->flash('message','Product already add to wishlist');
            return redirect()->back();
        }else{
            $cart = new Wishlist();
            $cart->user_id = session('LoggedCustomer');
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
        session()->flash('message','Product add to wishlist');
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
        Wishlist::find($id)->delete();
        return redirect()->back();
    }
}
