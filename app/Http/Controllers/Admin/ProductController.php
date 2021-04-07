<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   // ADD PRODUCT
    public function addProduct()
    {
        $category = Category::where('status', 'active')->get();
        $brand = Brand::get();
        return view('admin.product.add-product',compact('category','brand'));
    }

    // MANAGE PRODUCT
    public function manageProduct()
    {
        $product = Product::latest()->get();
        return view('admin.product.manage-product',compact('product'));
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
            'category_name' => 'required',
            'brand_name' => 'required|unique:products,brand_id',
            'product_title' => 'required|unique:products,product_title',
            'sort_desc' => 'required|min:30',
            'long_desc' => 'required|min:50',
            'price' => 'required',
            'status' => 'required',
            'first_image' => 'required|mimes:jpeg,png,jpg,webp',
            'second_image' => 'required|mimes:jpeg,png,jpg,webp',
            'third_image' => 'required|mimes:jpeg,png,jpg,webp',
            'fourth_image' => 'required|mimes:jpeg,png,jpg,webp',
        ]);

        try{
            $first_image = $request->file('first_image');
            $file_name1 = substr(md5(time()), 0, 20).'_01.'.$first_image->getClientOriginalExtension();
            Image::make($first_image)->resize(540,560)->save('uploads/products/'.$file_name1);
            $first_image_output = 'uploads/products/'.$file_name1;
            // SECCOND
            $second_image = $request->file('second_image');
            $file_name2 = substr(md5(time()), 0, 20).'_02.'.$second_image->getClientOriginalExtension();
            Image::make($second_image)->resize(540,560)->save('uploads/products/'.$file_name2);
            $second_image_output = 'uploads/products/'.$file_name2;
            // THIRD
            $third_image = $request->file('third_image');
            $file_name3 = substr(md5(time()), 0, 20).'_03.'.$third_image->getClientOriginalExtension();
            Image::make($third_image)->resize(540,560)->save('uploads/products/'.$file_name3);
            $third_image_output = 'uploads/products/'.$file_name3;
            // FOURTH
            $fourth_image = $request->file('fourth_image');
            $file_name4 = substr(md5(time()), 0, 20).'_04.'.$fourth_image->getClientOriginalExtension();
            Image::make($fourth_image)->resize(540,560)->save('uploads/products/'.$file_name4);
            $fourth_image_output = 'uploads/products/'.$file_name4;


            $cate = new Product();
            $cate->category_id = $request->category_name;
            $cate->brand_id = $request->brand_name;
            $cate->product_title = $request->product_title;
            $cate->slug = strtolower(str_replace(' ','-',$request->product_title));
            $cate->sort_desc = $request->sort_desc;
            $cate->long_desc = $request->long_desc;
            $cate->price = $request->price;
            $cate->first_image = $first_image_output;
            $cate->second_image = $second_image_output;
            $cate->third_image = $third_image_output;
            $cate->fourth_image = $fourth_image_output;
            $cate->save();
            session()->flash('type','success');
            session()->flash('message','Product Added Successfull..!!');
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
        $product = Product::where('id',$id)->get();
        $category = Category::get();
        $brand = Brand::get();
        return view('admin.product.product-update',compact('product','category','brand'));
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
            'category_name' => 'required',
            'brand_name' => 'required|unique:products,brand_id,'.$id,
            'product_title' => 'required|unique:products,product_title,'.$id,
            'sort_desc' => 'required|min:30',
            'long_desc' => 'required|min:50',
            'price' => 'required',
            'first_image' => 'mimes:jpeg,png,jpg,webp',
            'second_image' => 'mimes:jpeg,png,jpg,webp',
            'third_image' => 'mimes:jpeg,png,jpg,webp',
            'fourth_image' => 'mimes:jpeg,png,jpg,webp',
        ]);


        try{
            // FIRST IMAGE
            if($request->first_image == null){
                $proUpdate = Product::find($id);
                $proUpdate->category_id = $request->category_name;
                $proUpdate->brand_id = $request->brand_name;
                $proUpdate->product_title = $request->product_title;
                $proUpdate->slug = strtolower(str_replace(' ','-',$request->product_title));
                $proUpdate->sort_desc = $request->sort_desc;
                $proUpdate->long_desc = $request->long_desc;
                $proUpdate->price = $request->price;
                $proUpdate->status = $request->status;
                $proUpdate->update();
                session()->flash('type','success');
                session()->flash('message','Product Updated Successfull..!!');
            }else{
                $proUpdate = Product::find($id);
                $file = $request->file('first_image');
                $name =substr(md5(time()), 0, 20).'_04.'.$file->getClientOriginalName();
                Image::make($file)->resize(540,560)->save('uploads/products/'.$name);
                if (file_exists(public_path($folder = $proUpdate->first_image)))
                {
                    unlink(public_path($folder));
                };
                $proUpdate->category_id = $request->category_name;
                $proUpdate->brand_id = $request->brand_name;
                $proUpdate->product_title = $request->product_title;
                $proUpdate->slug = strtolower(str_replace(' ','-',$request->product_title));
                $proUpdate->sort_desc = $request->sort_desc;
                $proUpdate->long_desc = $request->long_desc;
                $proUpdate->price = $request->price;
                $proUpdate->status = $request->status;
                $proUpdate->first_image = 'uploads/products/'.$name;
                $proUpdate->update();
                session()->flash('type','success');
                session()->flash('message','Product Updated Successfull..!!');
            }

            // SECOND IMAGE
            if($request->second_image == null){
                $proUpdate = Product::find($id);
                $proUpdate->category_id = $request->category_name;
                $proUpdate->brand_id = $request->brand_name;
                $proUpdate->product_title = $request->product_title;
                $proUpdate->slug = strtolower(str_replace(' ','-',$request->product_title));
                $proUpdate->sort_desc = $request->sort_desc;
                $proUpdate->long_desc = $request->long_desc;
                $proUpdate->price = $request->price;
                $proUpdate->status = $request->status;
                $proUpdate->update();
                session()->flash('type','success');
                session()->flash('message','Product Updated Successfull..!!');
            }else{
                $proUpdate = Product::find($id);
                $file = $request->file('second_image');
                $name =substr(md5(time()), 0, 20).'_04.'.$file->getClientOriginalName();
                Image::make($file)->resize(540,560)->save('uploads/products/'.$name);
                if (file_exists(public_path($folder = $proUpdate->second_image)))
                {
                    unlink(public_path($folder));
                };
                $proUpdate->category_id = $request->category_name;
                $proUpdate->brand_id = $request->brand_name;
                $proUpdate->product_title = $request->product_title;
                $proUpdate->slug = strtolower(str_replace(' ','-',$request->product_title));
                $proUpdate->sort_desc = $request->sort_desc;
                $proUpdate->long_desc = $request->long_desc;
                $proUpdate->price = $request->price;
                $proUpdate->status = $request->status;
                $proUpdate->second_image = 'uploads/products/'.$name;
                $proUpdate->update();
                session()->flash('type','success');
                session()->flash('message','Product Updated Successfull..!!');
            }
            // THIRD IMAGE
            if($request->third_image == null){
                $proUpdate = Product::find($id);
                $proUpdate->category_id = $request->category_name;
                $proUpdate->brand_id = $request->brand_name;
                $proUpdate->product_title = $request->product_title;
                $proUpdate->slug = strtolower(str_replace(' ','-',$request->product_title));
                $proUpdate->sort_desc = $request->sort_desc;
                $proUpdate->long_desc = $request->long_desc;
                $proUpdate->price = $request->price;
                $proUpdate->status = $request->status;
                $proUpdate->update();
                session()->flash('type','success');
                session()->flash('message','Product Updated Successfull..!!');
            }else{
                $proUpdate = Product::find($id);
                $file = $request->file('third_image');
                $name =substr(md5(time()), 0, 20).'_04.'.$file->getClientOriginalName();
                Image::make($file)->resize(540,560)->save('uploads/products/'.$name);
                if (file_exists(public_path($folder = $proUpdate->third_image)))
                {
                    unlink(public_path($folder));
                };
                $proUpdate->category_id = $request->category_name;
                $proUpdate->brand_id = $request->brand_name;
                $proUpdate->product_title = $request->product_title;
                $proUpdate->slug = strtolower(str_replace(' ','-',$request->product_title));
                $proUpdate->sort_desc = $request->sort_desc;
                $proUpdate->long_desc = $request->long_desc;
                $proUpdate->price = $request->price;
                $proUpdate->status = $request->status;
                $proUpdate->third_image = 'uploads/products/'.$name;
                $proUpdate->update();
                session()->flash('type','success');
                session()->flash('message','Product Updated Successfull..!!');
            }
            // FOURTH IMAGE
            if($request->fourth_image == null){
                $proUpdate = Product::find($id);
                $proUpdate->category_id = $request->category_name;
                $proUpdate->brand_id = $request->brand_name;
                $proUpdate->product_title = $request->product_title;
                $proUpdate->slug = strtolower(str_replace(' ','-',$request->product_title));
                $proUpdate->sort_desc = $request->sort_desc;
                $proUpdate->long_desc = $request->long_desc;
                $proUpdate->price = $request->price;
                $proUpdate->status = $request->status;
                $proUpdate->update();
                session()->flash('type','success');
                session()->flash('message','Product Updated Successfull..!!');
            }else{
                $proUpdate = Product::find($id);
                $file = $request->file('fourth_image');
                $name =substr(md5(time()), 0, 20).'_04.'.$file->getClientOriginalName();
                Image::make($file)->resize(540,560)->save('uploads/products/'.$name);
                if (file_exists(public_path($folder = $proUpdate->fourth_image)))
                {
                    unlink(public_path($folder));
                };
                $proUpdate->category_id = $request->category_name;
                $proUpdate->brand_id = $request->brand_name;
                $proUpdate->product_title = $request->product_title;
                $proUpdate->slug = strtolower(str_replace(' ','-',$request->product_title));
                $proUpdate->sort_desc = $request->sort_desc;
                $proUpdate->long_desc = $request->long_desc;
                $proUpdate->price = $request->price;
                $proUpdate->status = $request->status;
                $proUpdate->fourth_image = 'uploads/products/'.$name;
                $proUpdate->update();
                session()->flash('type','success');
                session()->flash('message','Product Updated Successfull..!!');
            }


        }catch (Exception $error){
            session()->flash('type','danger');
            session()->flash('message',$error->getMessage());
        }
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
            $delPro = Product::find($id);
            if(file_exists(public_path($delPro->first_image))){
                unlink(public_path($delPro->first_image));
            }
            if(file_exists(public_path($delPro->second_image))){
                unlink(public_path($delPro->second_image));
            }
            if(file_exists(public_path($delPro->third_image))){
                unlink(public_path($delPro->third_image));
            }
            if(file_exists(public_path($delPro->fourth_image))){
                unlink(public_path($delPro->fourth_image));
            }

            $delPro->delete();
            session()->flash('type','success');
            session()->flash('delMessage','Product Deleted Successfull..!!');
        }catch (Exception $error){
            session()->flash('type','danger');
            session()->flash('delMessage',$error->getMessage());
        }
        return redirect()->back();
    }
}
