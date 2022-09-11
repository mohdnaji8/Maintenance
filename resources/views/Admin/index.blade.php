@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet light portlet-fit bordered">
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <!-- Button trigger modal-->
                                 <a  class="btn green" href="{{ route('admin.circles.create') }}">
                                     <i class="fa fa-plus"></i>
                                     اضافة مستخدم جديد</a>


                        </div>
                    </div>

                </div>
            </div>
            <div class="dataTables_wrapper no-footer" id="sample_editable_1_wrapper">

                <div class="table">
                    <table aria-describedby="sample_editable_1_info" role="grid"
                        class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_editable_1">
                        <thead>
                            <tr role="row">
                                <th aria-label=" Username : activate to sort column descending" aria-sort="ascending"
                                    style="width: 120px;" colspan="1" rowspan="1" aria-controls="sample_editable_1"
                                    id="seq" tabindex="0" class="sorting_asc">
                                    المتسلسل
                                </th>
                                <th aria-label=" Username : activate to sort column descending" aria-sort="ascending"
                                    style="width: 120px;" colspan="1" rowspan="1" aria-controls="sample_editable_1"
                                    tabindex="0" class="sorting_asc">
                                    الاسم
                                </th>
                                <th aria-label=" Username : activate to sort column descending" aria-sort="ascending"
                                    style="width: 120px;" colspan="1" rowspan="1" aria-controls="sample_editable_1"
                                    tabindex="0" class="sorting_asc">
                                    اسم المستخدم
                                </th>
                                <th aria-label=" Username : activate to sort column descending" aria-sort="ascending"
                                    style="width: 120px;" colspan="1" rowspan="1" aria-controls="sample_editable_1"
                                    tabindex="0" class="sorting_asc">
                                    الايميل
                                </th>
                                <th aria-label=" Username : activate to sort column descending" aria-sort="ascending"
                                    style="width: 120px;" colspan="1" rowspan="1" aria-controls="sample_editable_1"
                                    tabindex="0" class="sorting_asc">
                                    الوظيفة
                                </th>
                                @if(Auth::user()->isAdmin ==1)
                                <th aria-label=" Username : activate to sort column descending" aria-sort="ascending"
                                    style="width: 120px;" colspan="1" rowspan="1" aria-controls="sample_editable_1"
                                    tabindex="0" class="sorting_asc">
                                    تعديل
                                </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->isAdmin == 1)
                                            <span class="badge py-2 px-2 fs-7 badge-success ">مسؤول</span>
                                        @else

                                            <span class="badge py-2 px-2 fs-7 badge-warning">مستخدم  </span>


                                        @endif
                                    </td>
                                    @if(Auth::user()->isAdmin ==1)
                                    <td>
                                        @if(Auth::user()->id !== $user->id)
                                        <form action="{{route('admin.users.update', $user->id )}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" value="{{ $user->isAdmin }}" name="isAdmin">
                                            <button type="submit" class="btn btn-warning">تعديل</button>
                                        </form>
                                        @endif
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
    <script src="{{ asset('') }}assets/jquery-3.0.0.js"></script>
    <script src="{{ asset('') }}assets/pages/scripts/jobs-datatable.js"></script>
@endsection
@extends('layouts.layout')
