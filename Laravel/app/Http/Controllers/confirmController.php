<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class confirmController extends Controller
{
    public function index(Transaction $transaction)
    {
        return \view('confirm',\compact('transaction'));
    }
}
