<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetail extends Controller
{
    public function index(Product $product)
    {
        $related_products = Product::select('id','name','price','image','cate_id')->where('cate_id','=',$product->cate_id)->where('id','!=',$product->id)->get();
        // \dd($related_products);
            $product->increment('view',1);
        // \dd($product);

        return \view('product-detail',[
            'product' => $product,
            'related_products' => $related_products
        ]);
    }
}
