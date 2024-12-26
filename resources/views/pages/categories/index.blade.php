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
                              <li class="breadcrumb-item active" aria-current="page"> دسته بندی ها </li>
                            </ol>
                        </nav>
                    </div>
                    @can("create-category")
                    <div class="col-xl-4 text-left">
                        <button data-toggle="modal" data-target="#addModal" class="btn btn-primary">افزودن دسته بندی جدید</button>

                        <div id="addModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{route('categories.store')}}" method="POST">
                                        @csrf
                                        @method("POST")

                                        <div class="modal-header">
                                            <h4 class="modal-title">افزودن دسته بندی جدید</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">عنوان <span class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" required name="name" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-ltr">
                                            <button type="submit" class="btn btn-primary">انتشار</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
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

            <div class="card mb-4">
                <h4 class="card-title p-4">دسته بندی</h4>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table custom-table text-dark">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    @canany(['edit-category','delete-category'])
                                    <th>عملیات</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $category)
                                <tr>
                                    <td style="width:100px">{{ $loop->index+1}}</td>
                                    <td>{{$category->name}}</td>
                                    @canany(['edit-category','delete-category'])
                                        <td style="width: 100px">
                                            <div class="dropdown">
                                                <span class="p-2 btn" id="action{{$loop->index}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-dots-vertical"></i> </span>
                                                <div class="dropdown-menu text-right" aria-labelledby="action{{$loop->index}}" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                                    @can('edit-category')
                                                    <a class="dropdown-item" data-toggle="modal" href="#editModal{{$loop->index}}"><i class="mdi mdi-lead-pencil"></i> ویرایش</a>
                                                    @endcan
                                                    @can('delete-category')
                                                    <a class="dropdown-item" href="#" onclick="deleteItem({{ $category->id }})"><i class="mdi mdi-trash-can-outline"></i> حذف</a>
                                                    @endcan
                                                </div>
                                            </div>

                                            @can('delete-category')
                                            <form id="delete-form-{{ $category->id }}" action="{{ route('categories.destroy',$category->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            @endcan

                                            @can('edit-category')
                                            <div id="editModal{{$loop->index}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{route('categories.update', $category->id)}}" method="POST">
                                                            @csrf
                                                            @method("PUT")

                                                            <div class="modal-header">
                                                                <h4 class="modal-title">ویرایش دسته بندی</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">عنوان <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" value="{{$category->name}}" required name="name" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer d-ltr">
                                                                <button type="submit" class="btn btn-primary">اعمال تغییرات</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endcan
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
