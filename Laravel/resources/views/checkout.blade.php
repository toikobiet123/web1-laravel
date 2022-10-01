@extends('layouts.client')
@section('title','Xác nhận đặt hàng')
@section('content')
<section class="checkout_area padding_top">
    <div class="container">
      {{-- <div class="cupon_area">
        <div class="check_title">
          <h2>
            Bạn có mã giảm giấ?
            <a href="#">Nhập mã giảm giá tại đây</a>
          </h2>
        </div>
        <input type="text" placeholder="Enter coupon code" />
        <a class="tp_btn" href="#">Áp dụng mã giảm giá</a>
      </div> --}}
      <div class="billing_details">
          <form class="row contact_form" action="{{route('addTransaction')}}" method="post">
              @csrf
        <div class="row">
          <div class="col-lg-6">
            <h3>Chi tiết đơn hàng</h3>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="first" name="fullname" placeholder="Tên" />

              </div>
              {{-- <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="last" name="fullname" />
                <span class="placeholder" placeholder="Họ"></span>
              </div> --}}
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="number" name="phone" placeholder="Số điện thoại"/>

              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="email" name="email" placeholder="Địa chỉ Email"/>

              </div>
              {{-- <div class="col-md-12 form-group p_star">
                <select class="country_select">
                  <option value="1">Country</option>
                  <option value="2">Country</option>
                  <option value="4">Country</option>
                </select>
              </div> --}}
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="add1" name="address" placeholder="Địa chỉ của bạn"/>

              </div>
              {{-- <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="add2" name="add2" />
                <span class="placeholder" data-placeholder="Address line 02"></span>
              </div> --}}
              {{-- <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="city" name="city" />
                <span class="placeholder" data-placeholder="Town/City"></span>
              </div> --}}
              {{-- <div class="col-md-12 form-group p_star">
                <select class="country_select">
                  <option value="1">District</option>
                  <option value="2">District</option>
                  <option value="4">District</option>
                </select>
              </div> --}}
              {{-- <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP" />
              </div> --}}
              {{-- <div class="col-md-12 form-group">
                <div class="creat_account">
                  <input type="checkbox" id="f-option2" name="selector" />
                  <label for="f-option2">Create an account?</label>
                </div>
              </div> --}}
              <div class="col-md-12 form-group">
                {{-- <div class="creat_account">
                  <h3>Shipping Details</h3>
                  <input type="checkbox" id="f-option3" name="selector" />
                  <label for="f-option3">Ship to a different address?</label>
                </div> --}}
                <textarea class="form-control" name="message" id="message" rows="1"
                  placeholder="Order Notes"></textarea>
              </div>


          </div>
          <div class="col-lg-6">
            <div class="order_box">
              <h2>Sản phẩm bạn đã đặt</h2>
              <ul class="list">
                <li>
                  <a>Sản phẩm

                    <span class="">Giá</span>

                  </a>
                </li>
                @php
                    $total = 0
                @endphp
                @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <li>
                  <a> {!!Str::limit($details['name'],25)!!}
                    <span class="middle">x {{$details['quantity']}}</span>
                    <span class="last">{{ number_format($details['price'] * $details['quantity']) }}VNĐ</span>
                  </a>
                </li>

                @endforeach
                @endif
                <ul class="list list_2">
                    <li>
                        <a href="#">Tổng giá sản phẩm
                            <span>{{ number_format($total) }}  <span class="text-danger"> VNĐ</span></span>
                  </a>
                </li>
                <li>
                  <a href="#">Phí ship
                    <span>Flat rate: $50.00</span>
                  </a>
                </li>
                <li>
                  <a href="#">Tổng
                    <span>$2210.00</span>
                  </a>
                </li>
              </ul>

              <input type="text" hidden value="{{$total}}" name="total_price">
              <button class="btn_3">Xác nhận đặt hàng</button>
            </div>
          </div>
        </div>
         </form>
      </div>
    </div>
  </section>
@endsection
