<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchClient(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::where('name','LIKE','%'.$request->name.'%')->get();
            $output = '';
            if (count($data)>0) {
                $output = '<ul class="list-group" style="" id="clientSearch">';
                foreach ($data as $row) {
                    $output .= '<a href="'.route('product', $row->id).'"><li class="list-group-item"><img src="'.url('images/products/'.$row->image).'" alt=""><span>'.$row->name.'</span></li></a>';
                }
                $output .= '</ul>';
            }else {
                $output .= '<li class="list-group-item">'.'Không tìm thấy sản phẩm'.'</li>';
            }
            return $output;
        }
        // return view('autosearch');
    }

}
