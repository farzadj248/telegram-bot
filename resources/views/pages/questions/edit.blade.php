@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper pb-0">
            <div class="page-header">
                <div class="row w-100">
                    <div class="col-xl-8">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                              <li class="breadcrumb-item" aria-current="page"> سوالات </li>
                              <li class="breadcrumb-item active" aria-current="page"> {{$question->question}} </li>
                            </ol>
                          </nav>
                    </div>
                    <div class="col-xl-4 text-left">
                        <a href="{{ route('questions.index') }}" class="btn btn-outline-primary">بازگشت</a>
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
                    <h4 class="card-title">ویرایش سوال</h4>
                    <p class="card-description">ویرایش سوال</p>
                    <form class="forms-sample" method="POST" action="{{ route('questions.update' , $question->id) }}">
                        @csrf
                        @method("PUT")

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">سوال <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$question->question}}" required name="question" placeholder="question">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label">پاسخ <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                        <textarea class="form-control" required name="answer" rows="4">{{$question->answer}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">پاسخ غلط ۱</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{$question->mis1}}" name="mis1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">پاسخ غلط 2</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{$question->mis2}}" name="mis2">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">پاسخ غلط 3</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{$question->mis3}}" name="mis3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">پاسخ غلط 4</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{$question->mis4}}" name="mis4">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">پاسخ غلط 5</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{$question->mis5}}" name="mis5">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">پاسخ غلط 6</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{$question->mis6}}" name="mis6">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">دسته بندی <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" required name="category_id">
                                            @foreach ($category as $item )
                                                <option value="{{$item->id}}" @selected($question->category_id == $item->id)>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">امتیاز</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{$question->score}}" name="score">
                                    </div>
                                </div>
                            </div>

                        </div>


                        <button type="submit" class="btn btn-primary mr-2"> اعمال تغییرات </button>
                        <a href="{{ route('questions.create') }}" class="btn btn-light" >خالی کردن فرم</a>
                    </form>
                  </div>
            </div>
        </div>
    </div>
@endsection
