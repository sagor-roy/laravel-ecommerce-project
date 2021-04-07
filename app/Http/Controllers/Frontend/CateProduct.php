<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class CateProduct extends Controller
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
        $cateHead = Category::where('id',$id)->where('status','active')->get();
        $category = Category::where('status','active')->latest()->get();
        $product = Product::where('category_id',$id)->where('status','active')->paginate(12);
        $all = Product::where('category_id',$id)->where('status','active')->get();
        $latestFirst = Product::where('status','active')->latest()->offset(0)->limit(3)->get();
        $latestLast = Product::where('status','active')->latest()->skip(3)->take(3)->get();
        return view('frontend.category_wise_product.catePro',compact('category','product','all','latestFirst','latestLast','cateHead'));
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
