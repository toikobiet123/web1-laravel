@extends('admin.layout.master')
@section('title') Sửa sản phẩm @endsection
@section('content')
<div class="row">

    <form action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">

            <label for="Tên sản phẩm">
            </label>
                Tên sản phẩm:
                <input type="text" class="form-control" name="name" value="{{$product->name}}">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
        <label for="Giá">
        </label>
            Giá:
            <input type="text" name="price" class="form-control" value="{{$product->price}}">
        <label for="desc">
            Chi tiết:
        </label>
            <textarea name="description" id="summernote" cols="80" rows="10" class="form-control">{!! $product->description !!}</textarea>

        <label for="">Kích thước</label>
        <select name="size_id" id="" class="form-control">
            @foreach ($size as $item)
            <option value="{{$item->id}}"{{$product->size_id === $item->id ? 'selected':''}} >{{$item->size_name}}
            </option>

            @endforeach
        </select>
        <label for="">Danh mục</label>
        <select name="cate_id" id="" class="form-control">
            @foreach ($category as $item)
            <option value="{{$item->id}}"{{$product->cate_id === $item->id ? 'selected':''}} >{{$item->name}}
            </option>

            @endforeach
        </select>
        <label for="">
            Trạng thái
            <input type="checkbox" class="" name="status" {{$product->status == 1 ? 'checked':''}}>
        </label>
        <div class="form-group">
            <label for="image">Ảnh sản phẩm:</label>
            <input type="file" name="image" id="image" class="form-control">
          </div>
          <div class="form-group">
            <img id="product-img" src="{{ url('images/products/'.$product->image) }}" width="200px" alt=""></td>
          </div>
          <div class="form-group">
            <label for="image">Ảnh chi tiết sản phẩm:</label>
            <input type="file" name="image_list[]" multiple id="image" class="form-control">
          </div>
          <div class="form-group">
              @foreach (explode('|', $product->image_list) as $item)
              <img src="{{ url('images/products/'.$item) }}" width="200px" alt="">
              @endforeach
          </div>
        <button type="submit" class="btn btn-success">Lưu Sản phẩm</button>
    </form>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Nhập gì đó điiiiii',
            tabsize: 10,
      height: 200,
      minHeight: 100,
      maxHeight: 300,
      focus: true,
      codemirror: {
        theme: 'monokai'
      }
        });
    });
  </script>
@endsection
