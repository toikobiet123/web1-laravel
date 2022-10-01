@extends('layouts.client')
@section('title')
    {{ $product->name }}
@endsection
@section('content')
    <div class="product_image_area section_padding">
        <div class="container">
            <div class="row s_product_inner justify-content-between">
                <div class="col-lg-7 col-xl-7">
                    <div class="product_slider_img">
                        <div id="vertical">
                            <div data-thumb="{{ url('images/products/' . $product->image) }}">
                                <img src="{{ url('images/products/' . $product->image) }}" />
                            </div>
                            @foreach (explode('|', $product->image_list) as $item)
                                <div data-thumb="{{ url('images/products/' . $item) }}">
                                    <img src="{{ url('images/products/' . $item) }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="s_product_text">
                        <h3>{{ $product->name }}</h3>
                        <h2>{{ number_format($product->price) }} VNĐ</h2>
                        <ul class="list">
                            <li>
                                <a class="active" href="#">
                                    <span>Danh mục</span> : {{ $product->category->name }}</a>
                            </li>
                            <li>
                                <a href="#"> <span>Kích cỡ</span> : {{ $product->size->size_name }}</a>
                            </li>
                            <li>
                                <a href="#"> <span>Trạng thái</span> : <span class="text-success"> Còn hàng</span></a>
                            </li>
                        </ul>
                        <div style="height: 50px">
                            <p>
                                {{-- {!!$product->description!!} --}}
                            </p>
                        </div>
                        <div>
                            <div class="card_area d-flex justify-content-between align-items-center">
                                <div class="product_count">
                                    <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                                    <input class="input-number" type="text" value="1" min="0" max="10">
                                    <span class="number-increment"> <i class="ti-plus"></i></span>
                                </div>
                                <a href="{{ route('add.to.cart', $product->id) }}" class="btn_3">Thêm vào giỏ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                        aria-selected="true">Chi tiết sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">Bình luận</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  active" id="review-tab" data-toggle="tab" href="#review" role="tab"
                        aria-controls="review" aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="col-lg-12">
                        {!! $product->description !!}
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="comment_list">
                                @foreach ($product->comments as $comment)
                                    <div class="review_item">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4>{{ $comment->user->name }}</h4>
                                                <h5>{{ $comment->created_at }}</h5>
                                                <a class="reply_btn reply_comment" href="#"
                                                    data-id="{{ $comment->id }}">Reply</a>
                                                @if ($comment->parent_id == $comment->id)
                                                    @foreach ($rep as $item)
                                                        <div class="review_item reply">
                                                            <div class="media">
                                                                <div class="d-flex">
                                                                    <img src="img/product/single-product/review-2.png"
                                                                        alt="" />
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4>{{ $rep->name }}</h4>
                                                                    <h5>{{ $rep->created_at }}</h5>
                                                                    <a class="reply_btn" href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                {{ $rep->comment }}
                                                            </p>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <form action="{{ route('comment.rep') }}"
                                                    class="form_reply-{{ $comment->id }} formReply" style="display: none;"
                                                    method="post">
                                                    @csrf
                                                    <input type="text" name="comment"
                                                        id="rep_comment-{{ $comment->id }}" class="form-control" />
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                                    <input type="hidden" name="parent_id"
                                                        value="{{ $comment->id }}" />

                                                    <button type="submit" data-id="{{ $comment->id }}" value="submit"
                                                        class="btn_3 btn_rep">
                                                        rep bình luận
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <p>
                                            {{ $comment->comment }}
                                        </p>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Thêm bình luận tại đây</h4>
                                <form class="row contact_form" action="{{ route('comment.add') }}" method="POST"
                                    id="">
                                    @csrf

                                    <div class="col-md-12">
                                        @if (Auth::check())
                                            <div class="form-group">
                                                <input type="text" name="comment" class="form-control" />
                                                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                            </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" value="submit" class="btn_3">
                                            Thêm bình luận
                                        </button>
                                    @else
                                        <a href="{{ route('login') }}" class="text-danger">Bạn cần đăng nhập để bình
                                            luận</a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row total_rate">
                                <div class="col-6">
                                    <div class="box_total">
                                        <h5>Overall</h5>
                                        <h4>4.0</h4>
                                        <h6>(03 Reviews)</h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="rating_list">
                                        <h3>Hiện có {{ $product->rating->count() }} đánh giá</h3>
                                        <ul class="list">
                                            <li>
                                                <a href="#">5 sao
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i> 01</a>
                                            </li>
                                            <li>
                                                <a href="#">4 sao
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>

                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#">3 sao
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>


                                                    <i class="fa fa-star"></i> 01</a>
                                            </li>
                                            <li>
                                                <a href="#">2 sao
                                                    <i class="fa fa-star"></i>



                                                    <i class="fa fa-star"></i> 01</a>
                                            </li>
                                            <li>
                                                <a href="#">1 sao

                                                    <i class="fa fa-star"></i> 01</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="review_list">
                                @foreach ($product->rating as $review)
                                <div class="review_item">
                                        <div class="media">
                                            {{-- <div class="d-flex">
                                            <img src="img/product/single-product/review-1.png" alt="" />
                                        </div> --}}
                                            <div class="media-body">
                                                <h4>{{ $review->user->name }}</h4>
                                                @for ($i = 0; $i < $review->rating; $i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                                {{-- <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> --}}
                                            </div>
                                        </div>
                                        <p>
                                            {{ $review->review }}
                                        </p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <form class="row contact_form" action="{{ route('rating') }}" method="POST"> @csrf
                                    <div>
                                        <h4>Thêm một đánh giá</h4>
                                        @if (Auth::check())

                                        <label for="input-1" class="control-label">Đánh giá</label>
                                        <input id="input-1" name="rating" class="rating rating-loading"
                                            data-min="0" data-max="5" data-step="1">

                                    </div>

                                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="review" rows="1" placeholder="Review"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" value="submit" class="btn_3">
                                            Gửi đánh giá
                                        </button>
                                    </div>
                                    @else
                                    <a href="{{route('login')}}"><p class="text-danger">Bạn cần đăng nhập để đánh giá sản phẩm</p></a>
                                        @endif

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Description Area =================-->

    <!-- product_list part start-->
    <section class="product_list best_seller">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        @foreach ($related_products as $item)
                            <div class="single_product_item">
                                <a href="{{ route('product', $item->id) }}">
                                    <img src="{{ url('images/products/' . $item->image) }}" width="270px"
                                        height="270px" alt="">
                                    <div class="single_product_text">
                                        <h4>{{ $item->name }}</h4>
                                        <h3>{{ number_format($item->price) }} VNĐ</h3>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).on('click', '.reply_comment', function(i) {
            i.preventDefault();
            let jzt = $(this).data('id')
            // alert(jzt);
            var form = '.form_reply-' + jzt;
            // gì zảy trời
            // $(form).show();
            $('.formReply').slideUp();
            $(form).slideDown();
            console.log(form);
        });
        // $(document).on('click','.btn_rep', function (e) {
        //     e.preventDefault();
        //     let jzt = $(this).data('id')
        //     var reply = '#rep_comment-'+jzt;
        //     var comment_reply = $(reply).val();
        //     $.ajax({
        //         type: "post",
        //         url: "{{ route('comment.rep') }}",
        //         data: {
        //             data : comment_reply,
        //             _token: '{{ csrf_token() }}',

        //         },
        //         success: function (response) {

        //         }
        //     });
        // });
    </script>
    <script>
        $('.rating').on('change', function() {
            console.log($(this).val());
        })
    </script>
@endsection
