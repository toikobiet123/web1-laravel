@extends('layouts.client')
@section('title', 'Trang chủ')
@section('content')
    {{-- =========== --}}
    {{-- <section class="breadcrumb breadcrumb_bg">
                        <div class="container">
                          <div class="row justify-content-center">
                            <div class="col-lg-8">
                              <div class="breadcrumb_iner">
                                <div class="breadcrumb_iner_item">
                                  <h2>@section('')</h2>
                                  <p>Home <span>-</span> contact us</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section> --}}
    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Các danh mục chính</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Tủ giày chất lượng cao siêu xịn xò đỉnh cao vũ trụ</p>
                        <h3>Tủ Giày</h3>
                        <a href="{{route('sortByCate',4)}}" class="feature_btn">Xem ngay <i class="fas fa-play"></i></a>
                        <img src="{{ asset('client/img/feature/pngtree-shoe-cabinet-png-image_2417691-removebg-preview.png') }}" width="70%" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Tủ quần áo chất lượng cao</p>
                        <h3>Tủ Quần Áo</h3>
                        <a href="{{route('sortByCate',3)}}" class="feature_btn">Xem ngay <i class="fas fa-play"></i></a>
                        <img src="{{ asset('client/img/feature/53-534154_wardrobe-png-transparent-picture-wardrobe-png-removebg-preview.png') }}" alt="" width="80%">
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Thảm</h3>
                        <a href="{{route('sortByCate',5)}}" class="feature_btn">Xem ngay <i class="fas fa-play"></i></a>
                        <img src="{{ asset('client/img/feature/carpet-rug-KaEw5R9-600-removebg-preview.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Bàn ăn</h3>
                        <a href="{{route('sortByCate',2)}}" class="feature_btn">Xem ngay <i class="fas fa-play"></i></a>
                        <img src="{{ asset('client/img/feature/ban_an_go_chan_sat_porto_1m8-768x511-removebg-preview.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-12 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Sofa gia đình chất lượng tốt</p>
                        <h3>Sofa</h3>
                        <a href="{{route('sortByCate',1)}}" class="feature_btn">Xem ngay <i class="fas fa-play"></i></a>
                        <img src="{{ asset('client/img/feature/11578208737-804118106-removebg-preview.png') }}" width="60%" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product_list">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Sản phẩm mới nhất<span>shop</span></h2>
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

    <section class="product_list best_seller ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Sản phẩm được quan tâm nhất <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        @foreach ($product_view as $item)
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
    </section>
    <!-- product_list part end-->

    <!-- subscribe_area part start-->
    <section class="subscribe_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="subscribe_area_text text-center">
                        <h5>Tham gia đăng ký tin tức</h5>
                        <h2>Đăng ký để nhận những tin tức mới nhất</h2>
                        <form action="{{ route('contact.email') }}" method="POST" name="sub">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="nhập email tại đây"
                                    name="email">
                                <div class="input-group-append">
                                    <button class="input-group-text btn_2" id="basic-addon2">Đăng ký ngay</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@section('script')
    <script>
        $(document).on('submit','.sub' function () {
            alert('msg');
        });
    </script>
@endsection
