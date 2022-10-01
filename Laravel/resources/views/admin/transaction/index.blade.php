@extends('admin.layout.master')
@section('title', 'Quản lí vận đơn')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên người nhận</th>
                {{-- <th>Chi tiết</th> --}}
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>
                <th>Tổng giá</th>
                <th>Chi tiết đơn hàng</th>
            </tr>
        </thead>
        <tbody>
            @if ($transaction)
                @foreach ($transaction as $item)
                    <tr>

                        <td>
                            {{ $item->trans_code }}
                        </td>
                        <td>{{ $item->fullname }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            @if ($item->status == 1)
                                <span class="alert alert-warning">Đang xử lí</span>
                            @endif
                            @if ($item->status == 2)
                                <span class="alert alert-primary">Đang giao hàng</span>
                            @endif
                            @if ($item->status == 3)
                                <span class="alert alert-success">Đã giao hàng</span>
                            @endif
                            @if ($item->status == 0)
                                <span class="alert alert-danger">Đã hủy</span>
                            @endif
                        </td>
                        <td>{{ number_format($item->total_price) }}VNĐ</td>
                        <td><a href="{{ route('transaction.show', $item->id) }}">Xem chi tiết</a></td>

                    </tr>
                @endforeach
            @endif

        </tbody>

    </table>
    {{ $transaction->links() }}
@endsection
