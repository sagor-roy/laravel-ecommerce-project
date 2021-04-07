<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::latest()->get();
        return view('admin.brand.brand',compact('brand'));
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
            'brand' => 'required|min:4|unique:brands,brand',
        ]);

        try{
            $cate = new Brand();
            $cate->brand = $request->brand;
            $cate->slug = strtolower(str_replace(' ','-',$request->brand));
            $cate->brand_code = substr(md5(time()), 0, 10);
            $cate->save();
            session()->flash('type','success');
            session()->flash('message','Brand Added Successfull..!!');
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
        $show = Brand::where('id',$id)->get();
        return view('admin.brand.brand-update',compact('show'));
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
            'brand' => 'required|min:4|unique:brands,id,'.$id,
        ]);

        $update =  Brand::find($id);
        $update->brand = $request->brand;
        $update->slug = str_replace(' ','-',$request->brand);
        $update->update();
        session()->flash('type','success');
        session()->flash('message','Brand Updated Succesfull..!!');
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
        try{
            Brand::where('id',$id)->delete();
            session()->flash('type','info');
            session()->flash('delMessage','Category Deleted Successfull..!!');
        }catch (Exception $error){
            session()->flash('type','danger');
            session()->flash('delMessage',$error->getMessage());
        }
        return redirect()->back();
    }
}
