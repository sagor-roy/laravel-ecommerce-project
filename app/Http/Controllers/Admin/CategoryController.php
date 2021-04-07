<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::latest()->get();
        return view('admin.category.category',compact('category'));
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
            'category_name' => 'required|min:4|unique:categories,category_name',
            'status' => 'required',
        ]);

        try{
            $cate = new Category();
            $cate->category_name = $request->category_name;
            $cate->slug = strtolower(str_replace(' ','-',$request->category_name));
            $cate->status = $request->status;
            $cate->save();
            session()->flash('type','success');
            session()->flash('message','Category Added Successfull..!!');
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
        $show = Category::where('id',$id)->get();
        return view('admin.category.category-update',compact('show'));
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
    public function update(CategoryRequest $request,$id)
    {
        $request->validate([
            'category_name' => 'required|min:4|unique:categories,id,'.$id,
            'status' => 'required',
        ]);

        $update =  Category::find($id);
        $update->category_name = $request->category_name;
        $update->slug = str_replace(' ','-',$request->category_name);
        $update->status = $request->status;
        $update->update();
        session()->flash('type','success');
        session()->flash('message','Category Updated Succesfull..!!');
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
            Category::where('id',$id)->delete();
            session()->flash('type','info');
            session()->flash('delMessage','Category Deleted Successfull..!!');
        }catch (Exception $error){
            session()->flash('type','danger');
            session()->flash('delMessage',$error->getMessage());
        }
        return redirect()->back();

    }
}
