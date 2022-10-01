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
              <h3 class="mb-4 text-center">Bạn chưa có tài khoản ? <a href="{{ route('register') }}">Đăng kí ngay</a></h3>
              <form method="POST" action="{{ route('login') }}" class="signin-form">
                @csrf
                  <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

              <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3">Đăng nhập</button>
            </div>
            <div class="form-group">
                <a href="{{route('loginGoogle')}}" class="form-control btn btn-primary px-3">Đăng nhập bằng google</a>
            </div>
            <div class="form-group d-md-flex">
                <div class="w-50">
                    {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                    <label class="form-check-label checkbox-wrap checkbox-primary" for="remember">
                        {{ __('Remember Me') }}
                    </label> --}}
                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                  <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} checked>
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="#" style="color: #fff">Quên mật khẩu</a>
                            </div>
            </div>
          </form>
          </div>
            </div>
        </div>
    </div>
</section>
@endsection
