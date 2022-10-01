<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $size = Size::select('id','size_name')->get();
        return \view('admin.size.index',\compact('size'));
    }
}
