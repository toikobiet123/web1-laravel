<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::select('id','name','price','image','description','status','cate_id','size_id','view')
        ->with('size')
        ->with('category') //truy vaasn theem quan hệ trước khi show ra nếu để show mới lặp và truy vấn sẽ gây n+1 query
        ->paginate(8);
        // \dd($product);
        return \view('admin.product.index', \compact('product'));
    }
    public function create()
    {
        $size = Size::select('id','size_name')->get();
        $category = Category::select('id','name')->get();
        return \view('admin.product.create',[
            'size'=>$size,
            'category'=>$category
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required',
            'image_list' => 'required',
        ],[
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.min' => 'Tên sản phẩm không được nhỏ hơn 6 kí tự',
            'price.required' => 'Giá sản phẩm không được để trống',
            'price.numeric' => 'Giá sản phẩm không thể nhập chữ',
            'description.required' => 'Chi tiết sản phẩm không được để trống',
            'image.required' => 'Phải có ảnh đại diện sản phẩm',
            'image_list.required' => 'Ảnh sản phẩm không thể để trống'
        ]);
        $product = new Product;
        $product->fill($request->all());
        // \dd($request->image_list);
        // $product->name = $request->name;
        // $product->price = $request->price;
        // $product->description = $request->description;
        // $product->size_id = $request->size_id;
        // $product->cate_id = $request->cate_id;
        // if($request->hasFile('description')){
        //     $txtFile = $request->file('description');
        //     $txtFileName = \date('YmdHi').$txtFile->getClientOriginalName();
        //     $txtFile->storeAs('images/textEditor',$txtFileName);
        // }
        $product->status = $request->status == true ? '1': '0';
        // $product->image = $request->image;
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> storeAs('images/products', $filename);
            $product->image= $filename;
        }
        // Products::create($data);
        $array_list = [];
        if($image_list = $request->file('image_list'))
        {
            foreach($image_list as $multiFile){
                $name_list = \date('YmHi').$multiFile->getClientOriginalName();
                $product->image_list = $multiFile->storeAs('images/products', $name_list);
                $array_list[] = $name_list;
            };
            $product->image_list = implode('|',$array_list);
        }
        // \dd($product);
        $product->save();
        return \redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return \redirect()->route('products.index');
        //  có thể sử dụng model::destroy($student);

    }
    public function edit(Product $product)
    {
        $size = Size::select('id','size_name')->get();
        $category = Category::select('id','name')->get();
        return \view('admin.product.edit',[
            'product' => $product,
            'size' => $size,
            'category' => $category
        ]);
    }
    public function update(ProductRequest $request, $product)
    {

        $product = Product::find($product);
        $product->fill($request->all());
        $product->status = $request->status == true ? '1': '0';
        // $product->image = $request->image;
        if($request->hasFile('image')){
            $path = 'images/products/'. $product->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> storeAs('images/products', $filename);
            $product->image= $filename;
        }
        $array_list = [];
        if($image_list = $request->file('image_list'))
        {
            foreach($image_list as $multiFile){
                $name_list = \date('YmHi').$multiFile->getClientOriginalName();
                $product->image_list = $multiFile->storeAs('images/products', $name_list);
                $array_list[] = $name_list;
            };
            $product->image_list = implode('|',$array_list);
        }
        $product->update();
        // $data = $request->all();

        // $student->update($data);
        // nếu ở đây dùng update($data) thì vẫn cần @method(PUT) ở form
        return \redirect()->route('products.index');
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $products = Product::where('name', 'LIKE', '%' . $request->name . '%')->get();

            if ($products) {
                foreach ($products as $key => $item) {
                    $output .= '<tr>
                    <td>' . $item->id . '</td>
                    <td>' . $item->name . '</td>
                    <td>' . $item->price . '</td>
                    <td>' . $item->category->name . '</td>
                    <td>' . $item->size->size_name . '</td>
                    <td>  <input data-id="'.$item->id.'" class="toggle-class" type="checkbox" data-onstyle="success"
                    data-offstyle="danger" data-toggle="toggle" data-on="Hiện"
                    data-off="Ẩn"'. $item->status == 1 ? 'checked' : ''.'>' . '</td>


                    <td><img id="product-img" src="'.url('images/products/'.$item->image) .'" width="200px" alt=""></td>
                    </tr>';
                }
            }

            return Response($output);
            // return \view('admin.product.index');
        }
    }
    public function changeStatus(Request $request){
        $product = Product::find($request->product_id);
        $product->status = $request->status;
        $product->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

}
