@extends('layouts.client')
@section('title','Bạn đã đặt hàng thành công')
@section('content')
<section class="confirmation_part padding_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="confirmation_tittle">
            <span>Bạn đã đặt hàng thành công</span>
          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>Thông tin đơn hàng</h4>
            <ul>
              <li>
                <p>Mã đơn hàng</p><span>: {{$input->trans_code}}</span>
              </li>
              <li>
                <p>Đặt hàng ngày</p><span>: {{$input->created_at}}</span>
              </li>
              <li>
                <p>Tổng tiền</p><span>: {{$input->total_price}}</span>
              </li>
              <li>
                <p>Phương thức thanh toán</p><span>: Check payments</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>Địa chỉ giao hàng</h4>
            <ul>
             <span>{{$input->address}}</span>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>Địa chỉ gửi hàng</h4>
            <ul>
              <li>
                <p>Đường</p><span>: Trịnh Văn Bô</span>
              </li>
              <li>
                <p>Quận</p><span>: Nam Từ Liêm</span>
              </li>
              <li>
                <p>Thành Phố</p><span>: Hà Nội</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="order_details_iner">
            <h3>Chi tiết đơn hàng</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">Sản phẩm</th>
                  <th scope="col">Số lượng</th>
                  <th scope="col">Đơn giá</th>
                </tr>
              </thead>
              <tbody>
                {{-- @if (session('cart'))

                @foreach (session('cart') as $id => $item)

                <tr>
                  <th colspan="2"><span>{{$item['name']}}</span></th>
                  <th>{{$item['quantity']}}</th>
                  <th> <span>{{number_format($item['price'])}}VNĐ</span></th>
                </tr>
                @endforeach
                {{session()->forget('cart')}}
                @endif --}}
                @foreach ($input->orders as $order)
                <tr>
                    <th colspan="2"><span>{{$order->products->name}}</span></th>
                    <th>{{$order->quantity}}</th>
                    <th> <span>{{number_format($order->products->price)}}VNĐ</span></th>
                  </tr>
                @endforeach
                {{-- <tr>
                  <th colspan="2"><span>Pixelstore fresh Blackberry</span></th>
                  <th>x02</th>
                  <th> <span>$720.00</span></th>
                </tr>
                <tr> --}}
                  {{-- <th colspan="2"><span>{{$}}</span></th>
                  <th>x02</th>
                  <th> <span>$720.00</span></th>
                </tr> --}}
            </tbody>
            <tfoot>
                  <tr>
                    <th colspan="3">Tổng tiền</th>
                    <th> <span>{{number_format($input->total_price)}}VNĐ</span></th>
                  </tr>
                  <tr>
                    <th colspan="3">shipping</th>
                    <th><span>flat rate: $50.00</span></th>
                  </tr>

              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
