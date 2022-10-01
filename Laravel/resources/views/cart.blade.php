@extends('layouts.client')
@section('title','Giỏ hàng')
@section('content')
<section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Đơn giá</th>
              </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="media">
                                <div class="d-flex">
                                  <img src="{{url('images/products/'.$details['image'])}}" width="200px" alt="" />
                                </div>
                                <div class="media-body" style="width: 250px">
                                  <p>{{ $details['name'] }}</p>
                                </div>
                              </div>
                        </td>
                        <td data-th="Price">{{ number_format($details['price']) }}
                        <span class="text-danger">VNĐ</span></td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" style="width: 60px;" />
                              {{-- <input class="input-number" type="text" value="{{ $details['quantity'] }}" min="0" max="10"> --}}
                        </td>



                        <td data-th="Subtotal" class="text-right">{{ number_format($details['price'] * $details['quantity']) }} <span class="text-danger">VNĐ</span></td>
                        <td class="actions" data-th="">
                            <button class="btn btn-sm remove-from-cart">x</button>
                        </td>
                    </tr>
                @endforeach
            @endif
              <tr class="bottom_button">
                <td>
                  <a class="btn_1" href="#">Update Cart</a>
                </td>
                <td></td>
                <td></td>
                <td>
                  <div class="cupon_text float-right">
                    <a class="btn_1" href="#">Close Coupon</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Tổng hóa đơn:</h5>
                </td>
                <td class="text-right">
                  <h5>{{ number_format($total) }} <span class="text-danger">VNĐ</span></h5>
                </td>
              </tr>
              <tr class="shipping_area">
                <td></td>
                <td></td>
                <td>
                  <h5>Shipping</h5>
                </td>
                <td>

                </td>
              </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="{{route('product-list')}}">Tiếp tục mua hàng</a>
            @if (Auth::check())

            <a class="btn_1 checkout_btn_1" href="{{route('checkout')}}">Xác nhận đơn hàng</a>
            @else
            <a class="btn_1 checkout_btn_1" href="{{route('login')}}">Bạn cần đăng nhập để đặt hàng</a>
            @endif
          </div>
        </div>
      </div>
  </section>
@endsection
@section('script')
  <script>
      $(".update-cart").change(function (e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Bỏ sản phẩm này ra khỏi giỏ hàng?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

  </script>
@endsection
