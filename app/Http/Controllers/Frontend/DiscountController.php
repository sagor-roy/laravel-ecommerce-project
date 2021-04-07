<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DiscountController extends Controller
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
            'coupon_name' => 'required',
        ]);

        try{
            $check = Coupon::where('coupon_name',$request->coupon_name)->first();
            if($check){
                Session::put('coupon',[
                    'coupon_name'=>$check->coupon_name,
                    'discount'=>$check->discount,
                ]);
            }else{
                session()->flash('faild','Invalid Coupon Name');
            }
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
    public function couponDestroy()
    {
        if(Session::has('coupon')){
            session()->forget('coupon');
            return redirect()->back();
        }
    }
}
