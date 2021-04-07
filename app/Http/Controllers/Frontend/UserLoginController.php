<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;

class UserLoginController extends Controller
{
    public function index(){
        $category = Category::where('status','active')->latest()->get();
        return view('frontend.user_login.user_login',compact('category'));
    }

}
