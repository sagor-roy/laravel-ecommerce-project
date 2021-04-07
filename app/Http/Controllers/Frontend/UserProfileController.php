<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Frontend\Customer;
use App\Models\Frontend\Order;
use App\Models\Frontend\OrderManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Image;

class UserProfileController extends Controller
{

    public function updateProfile(){
        if(session()->has('LoggedCustomer')){
            $customer = Customer::where('id','=',session('LoggedCustomer'))->first();
            $data = ['LoggedCustomerInfo'=>$customer];
        }
        $category = Category::where('status','active')->latest()->get();
        return view('frontend.user_login.update_account',compact('category'),$data);
    }

     public function changePass(){
         if(session()->has('LoggedCustomer')){
             $customer = Customer::where('id','=',session('LoggedCustomer'))->first();
             $data = ['LoggedCustomerInfo'=>$customer];
         }
        $category = Category::where('status','active')->latest()->get();
        return view('frontend.user_login.change_password',compact('category'),$data);
    }

     public function myOrder(){
         if(session()->has('LoggedCustomer')){
             $customer = Customer::where('id','=',session('LoggedCustomer'))->first();
             $data = ['LoggedCustomerInfo'=>$customer];
         }
         $order = OrderManage::where('user_id',session('LoggedCustomer'))->where('process','!=','return')->latest()->get();
        $category = Category::where('status','active')->latest()->get();
        return view('frontend.user_login.my_order',compact('category','order'),$data);
    }

//    public function myOrderDetail(){
//        if(session()->has('LoggedCustomer')){
//            $customer = Customer::where('id','=',session('LoggedCustomer'))->first();
//            $data = ['LoggedCustomerInfo'=>$customer];
//        }
//        $category = Category::where('status','active')->latest()->get();
//        return view('frontend.user_login.my_order_details',compact('category'),$data);
//    }

    public function check(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|min:6',
        ]);

        $customer = Customer::where('email', '=', $request->email)->first();
        if($customer){
            if(Hash::check($request->password,$customer->password)){
                session()->put('LoggedCustomer',$customer->id);
                return redirect('user/profile/my-account');
            }else{
                session()->flash('type','danger');
                session()->flash('message','Invalid password');
                return redirect()->back();
            }
        }else{
            session()->flash('type','danger');
            session()->flash('message','No account found on this email');
            return redirect()->back();
        }

    }

    public function profile(){

        if(session()->has('LoggedCustomer')){
            $customer = Customer::where('id','=',session('LoggedCustomer'))->first();
            $data = ['LoggedCustomerInfo'=>$customer];
        }

        $category = Category::where('status','active')->latest()->get();
        return view('frontend.user_login.user_profile',compact('category'),$data);
    }


    public function logout(){
        if(session()->has('LoggedCustomer')){
            session()->pull('LoggedCustomer');
            return redirect('user/login');
        }
    }


    public function orderSuccessView(){

        $category = Category::where('status','active')->latest()->get();
        return view('frontend.order_success.order_success',compact('category'));

    }


    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|min:4',
            'email' => 'required|email|max:255',
            'number' => 'required|min:11|max:11',
        ]);

        if($request->file('image') == null){
            $update = Customer::find($id);
            $update->name = $request->name;
            $update->email = $request->email;
            $update->number = $request->number;
            $update->update();
            session()->flash('type','success');
            session()->flash('message','Profile Updated Succesfull..!!');
            return redirect()->back();
        }else{
            $update = Customer::find($id);
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            Image::make($file)->resize(100,100)->save('uploads/user-profile/'.$name);

            if($update->image == null){

            }else{
                if (file_exists(public_path($folder = $update->image)))
                {
                    unlink(public_path($folder));
                }
            }

            $update->name = $request->name;
            $update->email = $request->email;
            $update->number = $request->number;
            $update->image = 'uploads/user-profile/'.$name;
            $update->update();
            session()->flash('type','success');
            session()->flash('message','Profile Updated Succesfull..!!');
            return redirect()->back();
        }

    }


    public function updatePass(Request $request,$id){
        $request->validate([
            'old_password' => 'required|min:6',
            'password' => 'required|confirmed',
        ]);

        $check = Customer::find($id);
        if(Hash::check($request->old_password,$check->password)){
            $check->password = Hash::make($request->password);
            $check->update();
            session()->flash('type','success');
            session()->flash('message','Password Updated Succesfull..!!');
            return redirect()->back();
        }else{
            session()->flash('type','danger');
            session()->flash('message','The old password do not match..!!');
            return redirect()->back();
        }

    }

}
