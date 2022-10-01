@extends('admin.layout.master')
@section('title')
    Quản lí
@endsection
@section('content-title')
    Lời nhắn của người dùng
@endsection
@section('content')
    <style>
        #exTab2 ul li a {
            text-decoration: none !important;
            padding: 10px 20px;
            color: black;
            font-size: 16px;
            display: block;
            position: relative;
        }
        #tab{
            border: none;
        }
        .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{
            cursor: default;
            border: 1px solid #c8c8c8;
            border-bottom-color: transparent;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px
        }

        /* remove border radius for the tab */

        /* change border radius for the tab , apply corners on top*/
    </style>

    <div id="exTab2" class="container">
        <ul class="nav nav-tabs" id="tab">
            <li class="active">
                <a href="#1" data-toggle="tab">Liên hệ</a>
            </li>
            <li>
                <a href="#2" data-toggle="tab">Đăng kí</a>
            </li>
        </ul>

        <div class="tab-content ">
            <div class="tab-pane active" id="1">
                <table class="table table">
                    <tr>
                        <td>ID</td>
                        <td>Tên</td>
                        <td>Email</td>
                        <td>Lời nhắn</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($contact as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->message }}</td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $contact->links() }}
            </div>
            <div class="tab-pane" id="2">
                <table class="table table">
                    <tr>
                        <td>ID</td>

                        <td>Email</td>

                        <td>Action</td>
                    </tr>
                    @foreach ($subscribe as $item)
                        <tr>
                            <td>{{ $item->id }}</td>

                            <td>{{ $item->email }}</td>

                            <td>

                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>

    <hr>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection
