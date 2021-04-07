<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couponShow = Coupon::latest()->get();
        return view('admin.coupon.coupon',compact('couponShow'));
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
            'coupon_name' => 'required|min:4|unique:coupons,coupon_name',
            'discount' => 'required',
        ]);

        try{
            $coupon = new Coupon();
            $coupon->coupon_name = $request->coupon_name;
            $coupon->discount = $request->discount;
            $coupon->save();
            session()->flash('type','success');
            session()->flash('message','Coupon Added Successfull..!!');
        }catch (Exception $error){
            session()->flash('type','danger');
            session()->flash('message',$error->getMessage());
        }
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
        try{
            Coupon::find($id)->delete();
            session()->flash('type','info');
            session()->flash('delMessage','Coupon Deleted Successfull..!!');
        }catch (Exception $error){
            session()->flash('type','danger');
            session()->flash('delMessage',$error->getMessage());
        }
        return redirect()->back();
    }
}
