<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\Category;

class UserRegisterController extends Controller
{
    public function index(){
        $category = Category::where('status','active')->latest()->get();
        return view('frontend.user_login.user_register',compact('category'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|min:4',
            'email' => 'required|email|unique:customers',
            'number' => 'required|min:11|max:11|unique:customers',
            'password' => 'required|min:6|confirmed',
        ]);

        try{
            $register = new Customer();
            $register->name = $request->name;
            $register->email = $request->email;
            $register->number = $request->number;
            $register->password = Hash::make($request->password);
            $register->save();
            session()->flash('type','success');
            session()->flash('message','Registration Successfull..!!');
        }catch (Exception $error){
            session()->flash('type','danger');
            session()->flash('message',$error->getMessage());
        }
        return redirect()->back();
    }
}
