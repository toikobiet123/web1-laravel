@extends('admin.layout.master')
@section('title') Quản lí người dùng @endsection
@section('content-title') <h2>List users</h2> @endsection
@section('content')

<a href="{{ route('user.create') }}" class="btn btn-success float-end">Thêm</a>
    <table class="table table">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Role</td>
            <td>Action</td>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{$user->role_as==1?'Admin':'User'}}</td>
                <td>
                    @if ($user->role_as == 0)
                        <a href="{{route('changeRole',$user->id)}}"class="btn btn-success">Cấp quyền admin</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection
