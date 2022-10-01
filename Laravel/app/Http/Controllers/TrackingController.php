<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackingController extends Controller
{
    public function index()
    {
        $user_id = \auth()->user()->id;
        $transaction = Transaction::select('*')->where('user_id','=',$user_id)->with('orders')->get();
        // $order = Order::select('*')->where('transaction_id',$transaction->id)->get();
        // foreach($transaction->orders as $id => $item){
        // }

        // $product = Product::select('*')->where('id','=',$transaction->orders->product_id)->get();
            // $product = Product::find('id')->where('id','=',$order->product_id);
        // foreach($transaction->orders as $order){
        // };
        // \dd($user_id,$transaction);
        return \view('tracking',\compact('transaction'));
    }
    public function cancel($id)
    {
        $transaction = Transaction::select('status')->where('id',$id)->first();
        if($transaction->status != 0)
        $status = 0;
        $transaction->where('id',$id)->update(['status' => $status]);
        return \redirect()->back();
    }
}
