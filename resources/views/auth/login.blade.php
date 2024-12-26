@extends('layouts.auth')

@section('content')
<div class="container rtl">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">داشبورد</h4>
                  <p class="card-description">ورود به حساب کاربری</p>
                  <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                      <label for="exampleInputEmail1">ایمیل</label>
                      <input id="email" type="email" class="form-control" id="exampleInputEmail1" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">کلمه عبور</label>
                      <input id="password" type="password" class="form-control" id="exampleInputPassword1" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary ml-2">ورود</button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">رمز عبور خود را فراموش کرده اید؟</a>
                    @endif
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
