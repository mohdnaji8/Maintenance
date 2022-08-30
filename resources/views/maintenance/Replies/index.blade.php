@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet light portlet-fit bordered">
        <div class="portlet-body">
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
                                    رقم الطلب
                                </th>
                                <th aria-label=" Username : activate to sort column descending" aria-sort="ascending"
                                    style="width: 120px;" colspan="1" rowspan="1" aria-controls="sample_editable_1"
                                    tabindex="0" class="sorting_asc">
                                   الملاحظات
                                </th>
                                <th aria-label=" Username : activate to sort column descending" aria-sort="ascending"
                                    style="width: 120px;" colspan="1" rowspan="1" aria-controls="sample_editable_1"
                                    tabindex="0" class="sorting_asc">
                                        حالة الطلب
                                </th>
                                <th id="delete_th" aria-label=" Delete : activate to sort column ascending"
                                    style="width: 81px;" colspan="1" rowspan="1" aria-controls="sample_editable_1"
                                    tabindex="0" class="sorting"> تعديل الرد
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($replies as $key => $reply)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        {{ $reply->order->id }}
                                    </td>
                                    <td>
                                        {{ $reply->noticies }}
                                    </td>
                                    <td>
                                        @if ($reply->done == 1)
                                            <span class="badge py-2 px-2 fs-7 badge-success ">تم الانجاز</span>
                                        @else
                                            <span class="badge py-2 px-2 fs-7 badge-danger">غير منجز</span>
                                        @endif
                                    </td>
                                    <td><a class="btn btn-primary btn-circle btn-sm "
                                           href="{{ route('admin.replies.create', $reply->order->id) }}">
                                            <i class="fa fa-edit"></i> تعديل الرد</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!--Start view Modal-->
    <!--Start view Modal-->

    <!--end view Modal-->
    <!--end view Modal-->
    <input id="base_url" type="text" hidden value="{{ asset('') }}">
    <!-- END EXAMPLE TABLE PORTLET-->
    <script src="{{ asset('') }}assets/jquery-3.0.0.js"></script>
    <script src="{{ asset('') }}assets/pages/scripts/jobs-datatable.js"></script>
@endsection
@extends('layouts.layout')
