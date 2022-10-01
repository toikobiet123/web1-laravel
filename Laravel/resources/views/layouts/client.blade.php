<!DOCTYPE html>
<html lang="en">
{{--
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/lightslider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/price_rangs.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('summernote/summernote.min.css')}}">
    <link rel="shortcut icon" href="{{asset('client/favicon.ico')}}" />
</head> --}}
    @include('include_cli._head')
<body>
    {{-- menu --}}
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="ti-angle-up"></i></button>
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{route('home')}}"> <img src="{{ asset('client/img/logo (2).png') }}" width="170px"
                                alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('home')}}">Trang chủ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('product-list')}}">Sản phẩm</a>
                                </li>
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Shop
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="category.html"> shop category</a>
                                        <a class="dropdown-item" href="single-product.html">product details</a>

                                    </div>
                                </li> --}}

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('contact-form')}}">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                        {{-- phần bên phải menu --}}
                        {{-- phần login --}}
                        <div class="hearer_icon d-flex">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <div class="dropdown user">
                                <a class="btn btn-dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user" id="log"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @guest
                                    @if (Route::has('login'))
                                            <a class="dropdown-item" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                                    @endif
                                    @if (Route::has('register'))
                                            <a class="dropdown-item" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                    @endif
                                @else
                                        <a class="dropdown-item" href="{{route('tracking')}}">
                                            {{ Auth::user()->name }}
                                        </a>
                                        @if (Auth::user()->role_as === 1)
                                            <a href="{{route('dashboard')}}" class="dropdown-item">Vào dashboard</a>
                                        @endif
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                @endguest
                                </div>
                            </div>
                            {{-- end login --}}
{{-- cart --}}
                            <div class="dropdown cart">
                                <a class="dropdown-toggle" href="{{route('cart')}}" id="navbarDropdown3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cart-plus"></i><span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width:20rem; right:0 !important">
                                    <div class="single_product" style="padding: 10px">
                                        <div class="row total-header-section">
                                            @php $total = 0 @endphp
                                            @foreach((array) session('cart') as $id => $details)
                                                @php $total += $details['price'] * $details['quantity'] @endphp
                                            @endforeach
                                            <div class="col-lg-12 col-sm-12 col-12 total-section text-left">
                                                <p>Tổng tiền: <span class="text-info"> {{ number_format($total) }} VNĐ</span></p>
                                            </div>
                                        </div>
                                        @if(session('cart'))
                                            @foreach(session('cart') as $id => $details)
                                                <div class="row cart-detail">
                                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                        <img src="{{url('images/products/'.$details['image'])}}" />
                                                    </div>
                                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                        <p>{{ $details['name'] }}</p>
                                                        <span class="price text-info"> {{ number_format($details['price']) }}VNĐ</span>
                                                        <p><span class="count"> Số lượng:{{ $details['quantity'] }}</span></p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                                <a href="{{ route('cart') }}" class="btn btn-block">Xem giỏ hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- end phần bên phải --}}
                    </nav>
                </div>
            </div>
        </div>
        {{-- form search ẩn --}}
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Tìm kiếm tại đây ...">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
                <div id="product_list_search"></div>
            </div>
        </div>
    </header>
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="breadcrumb_iner">
                <div class="breadcrumb_iner_item">
                  <h2>@yield('title')</h2>
                  <p>Trang chủ <span>-</span> @yield('title')</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    @yield('content')
    @include('include_cli._footer')
</body>
@include('include_cli._script')
{{-- <script src="{{ asset('client/js/jquery-1.12.1.min.js') }}"></script>
<script src="{{ asset('client/js/popper.min.js') }}"></script>
<script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('client/js/swiper.min.js') }}"></script>
<script src="{{ asset('client/js/masonry.pkgd.js') }}"></script>
<script src="{{ asset('client/js/lightslider.min.js') }}"></script>
<script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('client/js/slick.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('client/js/waypoints.min.js') }}"></script>
<script src="{{ asset('client/js/contact.js') }}"></script>
<script src="{{ asset('client/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.form.js') }}"></script>
<script src="{{ asset('client/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('client/js/mail-script.js') }}"></script>
<script src="{{ asset('client/js/stellar.js') }}"></script>
<script src="{{ asset('client/js/price_rangs.js') }}"></script>
<script src="{{ asset('client/js/theme.js') }}"></script>
<script src="{{ asset('client/js/custom.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('summernote/summernote.min.js')}}"></script>
{{-- ========================= --}}
{{-- <script type="text/javascript">
    $(document).ready(function(){
        $('#search_input').on('keyup',function () {
            var query = $(this).val();
            $.ajax({
                url:'{{ route('search') }}',
                type:'GET',
                data:{'name':query},
                success:function (data) {
                    $('#product_list_search').html(data);
                }
            })
        });
        $(document).on('click', 'li', function(){
            var value = $(this).text();
            $('#search_input').val(value);
            $('#product_list_search').html("");
        });
    });
</script> --}}
{{-- <script type="text/javascript">
    var link = document.createElement("link");
    link.setAttribute("rel","stylesheet");
    link.setAttribute("href","{{asset('client/css/search.css')}}");
    var head = document.getElementsByTagName("head")[0];
    head.appendChild(link);
  </script>
  <script>
    var mybutton = document.getElementById("myBtn");
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
    </script> --}}
@yield('script')
</html>
