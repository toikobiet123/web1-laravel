<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product_new = Product::select('id','name','image','price')->orderBy('id','DESC')->limit(10)->get();
        $product_view =Product::select('id','name','image','price','view')->orderBy('view','DESC')->limit(9)->get();
        return view('home_cli', \compact('product_new', 'product_view'));
    }

}
