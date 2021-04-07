<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function update(Request $request,$id){

        $rating = new Rating();
        $rating->user_id = session('LoggedCustomer');
        $rating->product_id = $id;
        $rating->rating_point = $request->rate;
        $rating->save();
        return redirect()->back();
    }
}
