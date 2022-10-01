@extends('admin.layout.master')
@section('content-title')  <h2>Create user</h2> @endsection
@section('title') Thêm tài khoản @endsection
@section('content')

    <form action="{{route('user.store')}}" method="post" class="form-group">
        @csrf
        <label for="Name">
            Name:
            <input type="text" name="name" class="form-control">
        </label><br><br>
        <label for="Email">
            Email:
            <input type="text" name="email" class="form-control">
        </label><br><br>
        <label for="Password">
            Password:
            <input type="text" name="password" class="form-control">
        </label><br><br>
        <button type="submit" class="btn btn-success">Create user</button>
    </form>
@endsection
