<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $price = Transaction::select('total_price')
        ->where('status',3)
        ->sum('total_price');
        $view = Product::select('view')->sum('view');
        $contact = Contact::select('id')->count();
        $user = User::select('id')->count();
        $trans = Transaction::select('id','status')
                        ->where('status','!=',3)
                        ->where('status','!=',0)
                        ->count();
        $product = Product::select('id')->count();
        return \view('admin.dashboard',\compact('price','view','contact','user','trans','product'));
    }
}
