<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ratingController extends Controller
{
    public function addRating(Request $request)
    {
        $input = new Rating;
        $input->fill($request->all());
        $input->user_id = \auth()->user()->id;
        $ratingCheck = Rating::where(['user_id'=>Auth::user()->id,'product_id'=>$input['product_id']])->count();
        if ($ratingCheck>0) {
            $message = "Bạn đã đánh giá sản phẩm này rồi";
        }
        $input->save();
        return back();
    }
}
