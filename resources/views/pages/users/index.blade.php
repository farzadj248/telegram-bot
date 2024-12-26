@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper pb-0">
            <div class="page-header">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> کاربران </li>
                  </ol>
                </nav>
            </div>

            <div class="card mb-4">
                <h4 class="card-title p-4">کاربران عضو شده در ربات تلگرام</h4>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table custom-table text-dark">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>پروفایل</th>
                                <th>شناسه کاربری</th>
                                <th>نام و نام خانوادگی</th>
                                <th>نام کاربری</th>
                                <th>شماره موبایل</th>
                                <th>ربات</th>
                                <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                <tr>
                                    <td>{{ $loop->index+1}}</td>
                                    <td class="py-1">
                                        <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                                    </td>
                                    <td>{{$user->user_id}}</td>
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ $user->is_bot ? 'بله' : 'خیر' }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <span class="p-2 btn" id="action{{$loop->index}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-dots-vertical"></i> </span>
                                            <div class="dropdown-menu text-right" aria-labelledby="action{{$loop->index}}" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                              <a class="dropdown-item" href="٫"><i class="mdi mdi-message-text-outline"></i> ارسال پیام</a>
                                              <a class="dropdown-item" href="#"><i class="mdi mdi-trash-can-outline"></i> حذف</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                @if ($data->count()==0)
                                    <tr>
                                        <td colspan="9" class="text-center p-4">موردی برای نمایش وجود ندارد.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination mt-4">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
