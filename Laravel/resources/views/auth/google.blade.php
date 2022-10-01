@extends('auth.layout')
@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Xin chào</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
              <h3 class="mb-4 text-center">Bạn đã có tài khoản ? <a href="{{ route('login') }}">Đăng nhập tại đây</a></h3>
              <form method="POST" action="{{route('SaveGoogle')}}" class="signin-form">
                @csrf
                <input type="hidden" name="name" value="{{$googleUser->getName()}}">
                <input type="hidden" name="email" value="{{$googleUser->getEmail()}}">
                <input type="hidden" name="avatar" value="{{ $googleUser->getAvatar()}}">

                  <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="Password...">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  </div>
            <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="confirm">

              <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3">Đăng kí</button>
            </div>

          </form>
          </div>
            </div>
        </div>
    </div>
</section>
@endsection
