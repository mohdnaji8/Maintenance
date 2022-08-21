@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet light portlet-fit bordered">
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <!-- Button trigger modal-->
                                   <a class="btn green" href="{{ route('orders.create') }}"> اضافة جديد    <i class="fa fa-plus"></i> </a>



                        </div>
                    </div>

                </div>
            </div>
            <div class="dataTables_wrapper no-footer" id="sample_editable_1_wrapper">

                <div class="table">
                    <table aria-describedby="sample_editable_1_info" role="grid"
                           class="table table-striped table-hover table-bordered dataTable no-footer"
                           id="sample_editable_1">
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
                                الجهة الطالبة للصيانة
                            </th>
                            <th aria-label=" Full Name : activate to sort column ascending" style="width: 120px;"
                                colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0"
                                class="sorting">
                                اسم طالب الصيانة
                            </th>
                            <th aria-label=" Points : activate to sort column ascending" style="width: 100px;"
                                colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0"
                                class="sorting">
                                تاريخ طلب الصيانة
                            </th>
                            <th aria-label=" Points : activate to sort column ascending" style="width: 100px;"
                                colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0"
                                class="sorting">
                                المبنى
                            </th>
                            <th aria-label=" Points : activate to sort column ascending" style="width: 100px;"
                                colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0"
                                class="sorting">
                                الطابق
                            </th>
                            <th aria-label=" Points : activate to sort column ascending" style="width: 100px;"
                                colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0"
                                class="sorting">
                                رقم الغرفة
                            </th>
                            <th aria-label=" Points : activate to sort column ascending" style="width: 100px;"
                                colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0"
                                class="sorting">
                                نوع الصيانة
                            </th>
                            <th aria-label=" Points : activate to sort column ascending" style="width: 100px;"
                                colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0"
                                class="sorting">
                                الهاتف
                            </th>
                            <th aria-label=" Points : activate to sort column ascending" style="width: 100px;"
                                colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0"
                                class="sorting">
                                حالة الطلب
                            </th>
                            <th id="edit_th" aria-label=" Edit : activate to sort column ascending"
                                style="width: 81px;" colspan="1" rowspan="1" aria-controls="sample_editable_1"
                                tabindex="0" class="sorting"> تعديل
                            </th>
                            <th id="delete_th" aria-label=" Delete : activate to sort column ascending"
                                style="width: 113px;" colspan="1" rowspan="1"
                                aria-controls="sample_editable_1" tabindex="0" class="sorting"> حذف
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @foreach ($departments as $department )
                                        @if($department->id ==$order->requester_id)
                                            {{$department->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $order->employee }}</td>
                                <td>{{ $order->date }}</td>
                                <td>{{ $order->building }}</td>
                                <td>{{ $order->floor_number }}</td>
                                <td>{{ $order->room_number }}</td>
                                <td>{{ $order->maintenance_type }}</td>
                                <td>{{ $order->phone }}</td>
                                <td> @if($order->active == 1)
                                        <span class="badge py-2 px-2 fs-7 badge-success " >فعال</span>
                                    @else
                                        <span class="badge py-2 px-2 fs-7 badge-danger">غير فعال</span>
                                    @endif
                                </td>
                                <td><a class="btn green">عرض</a></td>
                                <td><a class="btn btn-danger">حذف</a></td>
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
