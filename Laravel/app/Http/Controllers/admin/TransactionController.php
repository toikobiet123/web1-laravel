<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transaction = Transaction::select('id','fullname','email','phone','address','total_price','status','trans_code')
        ->orderBy('id','desc')
        ->paginate(10);
        return \view('admin.transaction.index',\compact('transaction'));
    }
    public function show(Transaction $transaction)
    {
        return \view('admin.transaction.show',\compact('transaction'));
    }
    public function changeStatus(Request $request)
    {
        $transaction = Transaction::select('status')
        ->where('id',$request->id);
        $status = $request->status;

        $transaction
        ->where('id',$request->id)
        ->update(['status' => $status]);
        return \redirect()->route('transaction.list');
    }
}
