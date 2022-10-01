<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $input = new Transaction;
        $input->fill($request->all());
        $input->user_id = \auth()->user()->id;
        $input->trans_code = \date('YmdHi').\rand(0,9999);
        $input->save();
        if(session()->has('cart')){

            foreach (session()->get('cart') as $id => $item) {
                $order = new Order;
                $order->product_id = $item['product_id'];
                $order->quantity = $item['quantity'];
                $order->transaction_id = $input->id;
                $order->save();
                \session()->forget('cart');
            }

        }
        // $_order = Order::select('*')->where('transaction_id','=',$input->id)->get();
        // \dd($_order,$input->id);
        return \view('confirm',\compact('input'));
        \session()->forget('cart');
    }
}
