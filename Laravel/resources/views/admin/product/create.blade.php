@extends('admin.layout.master')
@section('title') Thêm sản phẩm @endsection
@section('content-title','Thêm sinh viên')
@section('content')


    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">

            <label for="Tên sản phẩm">
            </label>
                Tên sản phẩm:
                <input type="text" class="form-control" name="name">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
        <div class="form-group">
        <label for="Giá">
        </label>
            Giá:
            <input type="text" name="price" class="form-control">
            @error('price')
            <span class="text-danger">{{$message}}</span>
          @enderror</div>
          <div class="form-group">
        <label for="desc">
        </label>
        Chi tiết:
            <textarea name="description" id="summernote" cols="80" rows="10" class="form-control"></textarea>
            @error('description')
            <span class="text-danger">{{$message}}</span>
        @enderror</div>
        <div class="row">

        </div>
        <div class="form-group lg-4">

            <label for="">Kích thước</label>
            <select name="size_id" id="" class="form-control">
                @foreach ($size as $item)
                <option value="{{$item->id}}" >{{$item->size_name}}
                </option>

                @endforeach
            </select>
        </div>
        <div class="form-group lg-4">

            <label for="">Danh mục</label>
            <select name="cate_id" id="" class="form-control">
                @foreach ($category as $item)
                <option value="{{$item->id}}" >{{$item->name}}
                </option>

                @endforeach
            </select>
        </div>
        <div class="form-group lg-4">

            <label for="">
                Trạng thái
                <input type="checkbox" class="form-check-input" name="status">
            </label>
        </div>
        <div class="form-group">
            <label for="image">Ảnh đại diện sản phẩm:</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
            <span class="text-danger">{{$message}}</span>
        @enderror
          </div>
          <div class="form-group">
            <label for="image">Ảnh chi tiết sản phẩm:</label>
            <input type="file" name="image_list[]" multiple id="image" class="form-control">
            @error('image_list')
            <span class="text-danger">{{$message}}</span>
        @enderror
          </div>
        <button type="submit" class="btn btn-success">Thêm Sản phẩm</button>
    </form>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Nhập gì đó điiiiii',
            tabsize: 2,
      height: 200,
      minHeight: 100,
      maxHeight: 300,
      onImageUpload: function(files, editor, welEditable) {
      sendFile(files[0], editor, welEditable);
    },
      focus: true,
      codemirror: {
        theme: 'monokai'
      },popover: {
  image: [
    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
    ['float', ['floatLeft', 'floatRight', 'floatNone']],
    ['remove', ['removeMedia']]
  ],
  link: [
    ['link', ['linkDialogShow', 'unlink']]
  ],
  table: [
    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
  ],
  air: [
    ['color', ['color']],
    ['font', ['bold', 'underline', 'clear']],
    ['para', ['ul', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture']]
  ]
}

        });
    });
  </script>
@endsection
