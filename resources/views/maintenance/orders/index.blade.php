@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet light portlet-fit bordered">
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <!-- Button trigger modal-->
                            <a class="btn green" href="{{ route('orders.create') }}"> اضافة جديد <i class="fa fa-plus"></i>
                            </a>



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
                                    الجهة الطالبة للصيانة
                                </th>
                                <th aria-label=" Username : activate to sort column descending" aria-sort="ascending"
                                    style="width: 120px;" colspan="1" rowspan="1" aria-controls="sample_editable_1"
                                    tabindex="0" class="sorting_asc">
                                    الدائرة
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
                                <th hidden aria-label=" Points : activate to sort column ascending" style="width: 100px;"
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
                                        {{-- @foreach ($departments as $department)
                                            @if ($department->id == $order->requester_id)
                                                {{ $department->name }}
                                            @endif
                                        @endforeach --}}
                                        {{ $order->department->name }}
                                    </td>
                                    <td>

                                        {{ $order->circle->name }}
                                    </td>
                                    <td>{{ $order->employee }}</td>
                                    <td>{{ $order->date }}</td>
                                    <td>{{ $order->building }}</td>
                                    <td>{{ $order->floor_number }}</td>
                                    <td>{{ $order->room_number }}</td>
                                    <td>{{ $order->maintenance_type }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td hidden>{{ $order->description }}</td>
                                    <td>
                                        @if ($order->active == 1)
                                            <span class="badge py-2 px-2 fs-7 badge-success ">فعال</span>
                                        @else
                                            <span class="badge py-2 px-2 fs-7 badge-danger">غير فعال</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#editModal"
                                            class="btn editingTRbutton btn-circle green btn-sm ">
                                            <i class="fa fa-edit"></i> عرض </button>
                                    </td>
                                    <td><a class="btn btn-danger btn-circle btn-sm "> <i class="fa fa-trash"></i> حذف</a>
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
    <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل حرفة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="" method="post" id="updat_modal">
                    <div class="modal-body" style="margin-bottom:150px">
                        <div class="form-group">
                            <label class="col-md-3 control-label">اسم الحرفة</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="job_name" id="job_name" class="form-control"
                                    placeholder="Enter text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">الضريبة السنوية</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="annual_tax" id="annual_tax" class="form-control"
                                    placeholder="Enter text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">ضريبة النظافة</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="cleaningFees" id="cleaningFees"
                                    class="form-control" placeholder="Enter text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">الوصف </label>
                            <div class="col-md-9">
                                <textarea cols="50" rows="3" type="text" name="description" disabled id="description"
                                    class="form-control" placeholder="Enter text"></textarea>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button type="submit" id="add_job" class="btn btn-primary  font-weight-bold">تعديل </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end view Modal-->
    <!--end view Modal-->

    <!-- END EXAMPLE TABLE PORTLET-->
    <script src="{{ asset('') }}assets/jquery-3.0.0.js"></script>
    <script src="{{ asset('') }}assets/pages/scripts/jobs-datatable.js"></script>
    <script>
        /*-- ------------------                 Modal                    ------------------ */
        $(function() {
            //Take the data from the TR during the event button
            $('table').on('click', 'button.editingTRbutton', function(ele) {
                //the <tr> variable is use to set the parentNode from "ele
                var tr = ele.target.parentNode.parentNode;

                //I get the value from the cells (td) using the parentNode (var tr)

                var job_name = tr.cells[1].textContent;
                var annual_tax = tr.cells[2].textContent;
                var cleaningFees = tr.cells[3].textContent;
                var id = tr.cells[4].textContent;
                var description = tr.cells[10].textContent;
                var url = $('#base_url').val();
                //$('#updat_modal').attr('action').val(url);
                //Prefill the fields with the gathered information
                $('#job_name').val(job_name);
                $('#annual_tax').val(annual_tax);
                $('#cleaningFees').val(cleaningFees);
                $('#description').val(description);

                //If you need to update the form data and change the button link
                $("form#updat_modal").attr('action', url + 'update_job/' + id);
                //$("a#saveModalButton").attr('href', window.location.href+'/update/'+id);
            });
        });
    </script>
@endsection
@extends('layouts.layout')
