@extends('layouts.auth')

@section('content')
<div class="container rtl">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">داشبورد</h4>
                  <p class="card-description">بازیابی کلمه عبور</p>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">ایمیل</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary ml-2">ارسال لینک بازیابی کلمه عبور</button>
                    <a href="/login" class="btn btn-link">بازگشت</a>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
