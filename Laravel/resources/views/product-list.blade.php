@extends('layouts.client')
@section('title') {{$pageTitle}} @endsection
@section('content')
<section class="cat_product_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <form action="{{route('sortByPrice')}}" method="POST">
                                @csrf
                            <h3>Danh mục sản phẩm</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                               @foreach ($category as $item)
                               <li>
                                <a href="{{route('sortByCate',$item->id)}}">{{$item->name}}</a>
                                {{-- <input type="checkbox" name="cate" id="" value="{{$item->id}}"> {{$item->name}} --}}
                                {{-- <span>()</span> --}}
                            </li>
                               @endforeach
                            </ul>
                        </div>

                    </aside>
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Kích thước</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                @foreach ($size as $size)
                                <li>
                                 <a href="{{route('sortBySize',$size->id)}}">{{$size->size_name}}</a>
                                 {{-- <input type="checkbox" name="size" id="" value="{{$size->id}}"> {{$size->size_name}} --}}

                             </li>
                                @endforeach


                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets price_rangs_aside">
                        <div class="l_w_title">
                            <h3>Lọc theo giá</h3>
                        </div>
                        {{-- <form action="{{route('sortByPrice')}}" method="POST"> --}}
                            {{-- @csrf --}}
                        <div class="widgets_inner">
                            <div class="range_item">
                                <div id="slider-range"></div>
                                <input type="text" class="js-range-slider" value="" />
                                <div class="d-flex">
                                    <div class="price_text">
                                        <p>Khoảng giá :</p>
                                    </div>
                                    <div class="price_value d-flex justify-content-center">
                                        <input type="text" class="js-input-from" name="min" id="amount" readonly />
                                        <span>to</span>
                                        <input type="text" class="js-input-to" name="max" id="amount" readonly />
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-danger">Lọc giá</button>
                        </div>
                    </form>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product_top_bar d-flex justify-content-between align-items-center">
                            <div class="single_product_menu d-flex">
                              <p> Số lượng sản phẩm: <span class="text-danger">{{$product->count()}}</span></p>
                            </div>
                            <div class="single_product_menu d-flex">
                                <h5>Lọc theo : </h5>
                                <select>
                                    <option value="0">Không lọc</option>
                                    <option value="1">Tên</option>
                                    <option value="2">Giá</option>
                                    <option value="3">Ngày bày bán</option>
                                </select>
                            </div>


                            <div class="single_product_menu d-flex">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="search"
                                        aria-describedby="inputGroupPrepend">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i
                                                class="ti-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{-- sản phẩm ở đây --}}
                <div class="row align-items-center latest_product_inner">

                    @foreach ($product as $item)
                    <div class="col-lg-4 col-sm-6">
                        <div class="single_product_item">

                            <img src="{{url('images/products/'.$item->image)}}" width="270px" height="270px" alt="">

                            <div class="single_product_text">
                                <h4>{!!Str::limit($item->name,25)!!}</h4>

                                <h3>{{number_format($item->price)}} <span class="text-danger">VNĐ</span></h3>
                                <a href="{{ route('add.to.cart', $item->id) }}" class="add_cart" style="font-size: 12px">Thêm nhanh vào giỏ</a>
                                <a href="{{route('product', $item->id)}}">Xem chi tiết</a>
                            </div>

                        </div>
                    </div>
                    @endforeach

                    <div class="col-lg-12" style="float: end">
                            {{ $product->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Category Product Area =================-->

<!-- product_list part start-->
<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Sản phẩm mới nhất</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-12">
                        <div class="best_product_slider owl-carousel">
                            @foreach ($product_new as $item)
                                <div class="single_product_item">
                                    <img src="{{ url('images/products/' . $item->image) }}" alt="">
                                    <div class="single_product_text">
                                        <h4>{{ $item->name }}</h4>
                                        <h3>{{ number_format($item->price) }} VNĐ</h3>
                                        <a href="{{ route('add.to.cart', $item->id) }}" class="add_cart"
                                            style="font-size: 12px">Thêm nhanh vào giỏ</a>
                                        <a href="{{ route('product', $item->id) }}">Xem chi tiết</a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
