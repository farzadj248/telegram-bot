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
                              <li class="breadcrumb-item active" aria-current="page"> سوالات </li>
                            </ol>
                          </nav>
                    </div>
                    @can("create-question")
                    <div class="col-xl-4 text-left">
                        <a href="{{ route('questions.create') }}" class="btn btn-primary">افزودن سوال جدید</a>
                    </div>
                    @endcan
                </div>
            </div>

            <div class="card mb-4">
                <h4 class="card-title p-4">سوالات</h4>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table custom-table text-dark">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>دسته بندی</th>
                                    <th>سوال</th>
                                    <th>پاسخ درست</th>
                                    <th>پاسخ های غلط</th>
                                    <th>امتیاز</th>
                                    <th>کاربر</th>
                                    @canany(['edit-question','delete-question'])
                                    <th>عملیات</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $question)
                                <tr>
                                    <td style="width:100px">{{ $loop->index+1}}</td>
                                    <td>{{$question->category->name}}</td>
                                    <td>{{ $question->question }}</td>
                                    <td>{{ $question->answer }}</td>
                                    <td>
                                        <ul class="p-0">
                                            @empty(!$question->mis1)
                                            <li>{{$question->mis1}}</li>
                                            @endempty

                                            @empty(!$question->mis2)
                                            <li>{{$question->mis2}}</li>
                                            @endempty

                                            @empty(!$question->mis3)
                                            <li>{{$question->mis3}}</li>
                                            @endempty

                                            @empty(!$question->mis4)
                                            <li>{{$question->mis4}}</li>
                                            @endempty

                                            @empty(!$question->mis5)
                                            <li>{{$question->mis5}}</li>
                                            @endempty

                                            @empty(!$question->mis6)
                                            <li>{{$question->mis6}}</li>
                                            @endempty
                                        </ul>
                                    </td>
                                    <td>{{ $question->score }}</td>
                                    <td>
                                        {{ $question->user->name }}<br>
                                        {{ $question->user->email }}
                                    </td>
                                    @canany(['edit-question','delete-question'])
                                    <td style="width:100px">
                                        <div class="dropdown">
                                            <span class="p-2 btn" id="action{{$loop->index}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-dots-vertical"></i> </span>
                                            <div class="dropdown-menu text-right" aria-labelledby="action{{$loop->index}}" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                                @can("edit-question")
                                                <a class="dropdown-item" href="{{ route('questions.edit', $question->id) }}"><i class="mdi mdi-lead-pencil"></i> ویرایش</a>
                                                @endcan
                                                @can("delete-question")
                                                <a class="dropdown-item" href="#" onclick="deleteItem({{ $question->id }})"><i class="mdi mdi-trash-can-outline"></i> حذف</a>
                                                @endcan
                                            </div>
                                        </div>

                                        @can("delete-question")
                                        <form id="delete-form-{{ $question->id }}" action="{{ route('questions.destroy',$question->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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
