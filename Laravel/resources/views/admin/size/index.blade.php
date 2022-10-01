@extends('admin.layout.master')
@section('title','Quản lí kích cỡ')
@section('content-title','Quản lí kích cỡ')
@section('content')
<table class="table table">
    <tr>
        <td>ID</td>
        <td>Kích cỡ</td>
        <td>Action</td>
    </tr>
    @foreach ($size as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->size_name }}</td>
            <td>

            </td>
        </tr>
    @endforeach
</table>
@endsection
