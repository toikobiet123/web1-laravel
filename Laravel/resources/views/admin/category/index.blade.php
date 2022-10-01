@extends('admin.layout.master')
@section('title','Quản lí danh nục')
@section('content-title','Quản lí danh mục')
@section('content')
<table class="table table">
    <tr>
        <td>ID</td>
        <td>Tên danh mục</td>
        <td>Action</td>
    </tr>
    @foreach ($cate as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>

            </td>
        </tr>
    @endforeach
</table>
@endsection
