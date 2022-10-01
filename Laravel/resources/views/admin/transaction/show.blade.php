@extends('admin.layout.master')
@section('title')Đơn hàng : {{$transaction->trans_code}}@endsection
@section('content')
<table class="table table-borderless">
    <thead>
      <tr>
        <th scope="col" colspan="2">Tên người nhận</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Tổng đơn hàng</th>
        <th scope="col">Ngày mua</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="2"><span>{{$transaction->fullname}}</span></td>
        <td>{{$transaction->email}}</td>
        <td>{{$transaction->phone}}</td>
        <td>{{$transaction->address}}</td>
        <td>{{$transaction->total_price}}</td>
        <td>{{$transaction->created_at}}</td>
      </tr>
    </tbody>
  </table>
  <table class="table table-borderless">
    <thead>
      <tr>
        <th scope="col" colspan="2">Tên sản phẩm</th>
        <th scope="col" colspan="2">Ảnh</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Đơn giá</th>
      </tr>
    </thead>
    <tbody>
        @if (count($transaction->orders))

        @foreach ($transaction->orders as $order)
            <tr>
              <th colspan="2"><span>{{$order->products->name}}</span></th>
              <th colspan="2"> <img src="{{url('images/products/'.$order->products->image)}}" width="100px" height="100px" alt=""></th>
              <th>{{$order->quantity}}</th>
              <th> <span>{{number_format($order->products->price * $order->quantity)}}</span></th>
            </tr>
        @endforeach
        @endif
    </tbody>
  </table>
  <h3>Trạng thái đơn hàng</h3>
  <form action="{{route('change_trans')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$transaction->id}}">
  <div class="form-group">
    <select name="status" id="" class="form-select" multiple aria-label="multiple select example">
        <option value="1" {{$transaction->status === 1 ? 'selected':''}} class="text-warning">Đang xử lí</option>
        <option value="2" {{$transaction->status === 2 ? 'selected':''}} class="text-primary">Đang giao hàng</option>
        <option value="3"{{$transaction->status === 3 ? 'selected':''}} class="text-success">Đã giao hàng thành công</option>
        <option value="0"{{$transaction->status === 0 ? 'selected':''}} class="text-danger">Hủy đơn hàng</option>
    </select>
    <button class="btn btn-success">Lưu</button>
  </div></form>
@endsection
