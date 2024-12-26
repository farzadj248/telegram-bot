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
                              <li class="breadcrumb-item active" aria-current="page"> پرسنل </li>
                            </ol>
                          </nav>
                    </div>
                    @can("create-personel")
                    <div class="col-xl-4 text-left">
                        <a href="{{ route('admin.personel.create') }}" class="btn btn-primary">افزودن پرسنل جدید</a>
                    </div>
                    @endcan
                </div>
            </div>

            <div class="card mb-4">
                <h4 class="card-title p-4">پرسنل</h4>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table custom-table text-dark">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>ایمیل</th>
                                    <th>نقش</th>
                                    @canany(['edit-personel','delete-personel'])
                                    <th>عملیات</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                <tr>
                                    <td>{{ $loop->index+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles->first()->name }}</td>
                                    @canany(['edit-personel','delete-personel'])
                                    <td style="width:100px">
                                        <div class="dropdown">
                                            <span class="p-2 btn" id="action{{$loop->index}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-dots-vertical"></i> </span>
                                            <div class="dropdown-menu text-right" aria-labelledby="action{{$loop->index}}" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                                @can("edit-personel")
                                                <a class="dropdown-item" href="{{ route('admin.personel.edit',$user->id) }}"><i class="mdi mdi-lead-pencil"></i>ویرایش اطلاعات</a>
                                                @endcan
                                                @can("delete-personel")
                                                <a class="dropdown-item" href="#" onclick="deleteItem({{ $user->id }})"><i class="mdi mdi-trash-can-outline"></i> حذف</a>
                                                <form id="delete-form-{{ $user->id }}" action="{{ route('admin.personel.destroy',$user->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                @endcan
                                            </div>
                                        </div>
                                    </td>
                                    @endcanany
                                </tr>
                                @endforeach

                                @if ($data->count()==0)
                                    <tr>
                                        <td colspan="9"  class="text-center p-4">موردی برای نمایش وجود ندارد.</td>
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

@section("js")
    <script type="text/javascript">
    function deleteItem(id) {

        Swal.fire({
            title: "Do you want to delet the item?",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "حذف",
            denyButtonText: `کنسل`
        }).then((result) => {
            if (result.isConfirmed) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            }
        });
    }
</script>
@endsection
