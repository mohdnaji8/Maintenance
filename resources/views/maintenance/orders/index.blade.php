@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet light portlet-fit bordered">
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <!-- Button trigger modal-->
                            <a class="btn green" href="{{ route('admin.orders.create') }}"> اضافة جديد <i
                                    class="fa fa-plus"></i>
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
                                <th aria-label=" Full Name : activate to sort column ascending" style="width: 120px;"
                                    colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0"
                                    class="sorting">
                                    اسم طالب الصيانة
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
                                {{-- <th aria-label=" Points : activate to sort column ascending" style="width: 100px;"
                                    colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0"
                                    class="sorting">
                                    فني الصيانة
                                </th> --}}
                                <th aria-label=" Points : activate to sort column ascending" style="width: 100px;"
                                    colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0"
                                    class="sorting">
                                    الهاتف
                                </th>
                                <th aria-label=" Points : activate to sort column ascending" style="width: 100px;"
                                    colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0"
                                    class="sorting">
                                    الوصف
                                </th>
                                <th aria-label=" Points : activate to sort column ascending" style="width: 100px;"
                                    colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0"
                                    class="sorting">
                                    حالة الطلب
                                </th>
                                <th aria-label=" Points : activate to sort column ascending" style="width: 100px;"
                                    colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0"
                                    class="sorting">
                                    تاريخ طلب الصيانة
                                </th>
                                <th id="edit_th" aria-label=" Edit : activate to sort column ascending"
                                    style="width: 81px;" colspan="1" rowspan="1" aria-controls="sample_editable_1"
                                    tabindex="0" class="sorting"> العمليات
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        {{ $order->department->name }}
                                    </td>
                                    <td>{{ $order->employee }}</td>
                                    <td>{{ $order->building }}</td>
                                    <td>{{ $order->floor_number }}</td>
                                    <td>{{ $order->room_number }}</td>
                                    <td hidden>{{ $order->id }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->description }}</td>
                                    <td>
                                        @if ($order->active == 1)
                                            <span class="badge py-2 px-2 fs-7 badge-success ">تم الانجاز</span>
                                        @else

                                            <span class="badge py-2 px-2 fs-7 badge-warning">قيد التنفيذ </span>

                                        @endif
                                    </td>
                                    <td>{{ $order->date }}</td>
                                    <td hidden>{{ $order->id }}</td>

                                    <td style="width: 400px">
                                        <button data-toggle="modal" data-target="#editModal"
                                            class="btn editingTRbutton btn btn-success btn-circle btn-sm ">
                                            <i class="fa fa-edit">عرض </i>
                                        </button>
                                        <a class="btn btn-warning btn-circle btn-sm  "
                                            href="{{ route('admin.replies.create', $order->id) }}">
                                              <i class="fa fa-arrow-left">
                                                رد
                                            </i>
                                        </a>
                                        <a class="btn btn-danger btn-circle btn-sm  "
                                            href="{{  route('admin.orders.archive', $order->id) }}">
                                              <i class="fa fa-arrow-left">
                                                  أرشفة
                                            </i>
                                        </a>
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
                    <div class="modal-body" style="margin-bottom:320px">
                        <div class="form-group">
                            <label class="col-md-3 control-label">القسم:</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="department" id="department" class="form-control"
                                    placeholder="Enter text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">الموظف:</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="employee" id="employee" class="form-control"
                                    placeholder="Enter text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">المبنى:</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="building" id="building" class="form-control"
                                    placeholder="Enter text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">الطابق:</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="floor_number" id="floor_number"
                                    class="form-control" placeholder="Enter text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">الغرفة:</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="room_number" id="room_number" class="form-control"
                                    placeholder="Enter text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">الهاتف:</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="phone" id="phone" class="form-control"
                                    placeholder="Enter text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">نوع الصيانة:</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="maintenance_type" id="maintenance_type"
                                    class="form-control" placeholder="Enter text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">تاريخ الصيانة: </label>
                            <div class="col-md-9">
                                <input type="text" disabled name="date" id="date" class="form-control"
                                    placeholder="Enter text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">الوصف: </label>
                            <div class="col-md-9">
                                <textarea cols="50" rows="3" type="text" name="description" disabled id="description"
                                    class="form-control" placeholder="Enter text"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <a href="" type="submit" id="edit_oder" class="btn btn-primary  font-weight-bold">تعديل
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end view Modal-->
    <!--end view Modal-->
    <input id="base_url" type="text" hidden value="{{ asset('') }}">
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


                var department = tr.cells[1].textContent.replace(/\s+/g, '');
                alert("aa");
                var employee = tr.cells[2].textContent.replace(/\s+/g, '');
                var building = tr.cells[3].textContent.replace(/\s+/g, '');
                var floor_number = tr.cells[4].textContent.replace(/\s+/g, '');
                var room_number = tr.cells[5].textContent.replace(/\s+/g, '');
                var maintenance_type = tr.cells[6].textContent.replace(/\s+/g, '');
                var phone = tr.cells[7].textContent.replace(/\s+/g, '');
                var description = tr.cells[8].textContent.replace(/\s+/g, '');
                var date = tr.cells[10].textContent.replace(/\s+/g, '');
                var id = tr.cells[11].textContent.replace(/\s+/g, '');
                alert(department);
                alert(employee);
                var url = $('#base_url').val();

                $('#department').val(department);
                $('#employee').val(employee);
                $('#building').val(building);
                $('#floor_number').val(floor_number);
                $('#room_number').val(room_number);
                $('#phone').val(phone);
                $('#maintenance_type').val(maintenance_type);
                $('#description').val(description);
                $('#date').val(date);

                //If you need to update the form data and change the button link
                $("a#edit_oder").attr('href', url + 'admin/orders/' + id + '/edit/');
                //$("a#saveModalButton").attr('href', window.location.href+'/update/'+id);
            });
        });
    </script>
@endsection
@extends('layouts.layout')
