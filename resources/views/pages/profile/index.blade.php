@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper pb-0">
            <div class="page-header">
                <div class="row w-100">
                    <div class="col-xl-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                              <li class="breadcrumb-item active" aria-current="page"> حساب کاربری </li>
                            </ol>
                          </nav>
                    </div>
                </div>
            </div>

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            @if ($errors->any())
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">پروفایل</h4>
                    <p class="card-description">ویرایش اطلاعات</p>
                    <form class="forms-sample" method="POST" action="{{ route('admin.profile.update') }}">
                        @csrf
                        @method("PUT")

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">نام و نام خانوادگی <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$user->name}}" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">ایمیل</label>
                                    <div class="col-sm-8">
                                        <input type="email" readonly class="form-control" value="{{$user->email}}" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">کلمه عبور</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" value="{{old('password')}}" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">تکرار کلمه عبور</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" value="{{old('password_confirm')}}" name="password_confirm">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary mr-2">اعمال تغییرات</button>
                    </form>
                  </div>
            </div>
        </div>
    </div>
@endsection
