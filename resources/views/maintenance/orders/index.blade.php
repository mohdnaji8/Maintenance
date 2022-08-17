@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet light portlet-fit bordered">
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <!-- Button trigger modal-->
                            <button type="button"  class="btn green" data-toggle="modal" data-target="#exampleModalLong">
                                <i class="fa fa-plus"></i>
                                اضافة جديد
                            </button>
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

                            <th aria-label=" Username : activate to sort column descending"
                                aria-sort="ascending" style="width: 120px;" colspan="1"
                                rowspan="1"
                                aria-controls="sample_editable_1" id="seq" tabindex="0"
                                class="sorting_asc">
                                المتسلسل
                            </th>
                            <th aria-label=" Username : activate to sort column descending"
                                aria-sort="ascending" style="width: 120px;" colspan="1"
                                rowspan="1"
                                aria-controls="sample_editable_1" tabindex="0"
                                class="sorting_asc">
                                اسم الحرفة
                            </th>
                            <th aria-label=" Full Name : activate to sort column ascending"
                                style="width: 120px;" colspan="1" rowspan="1"
                                aria-controls="sample_editable_1"
                                tabindex="0" class="sorting">
                                الضريبة السنوية
                            </th>
                            <th aria-label=" Points : activate to sort column ascending"
                                style="width: 100px;"
                                colspan="1" rowspan="1"
                                aria-controls="sample_editable_1" tabindex="0"
                                class="sorting">
                                ضريبة النظافة
                            </th>
                            <th id="edit_th"
                                aria-label=" Edit : activate to sort column ascending"
                                style="width: 81px;"
                                colspan="1" rowspan="1"
                                aria-controls="sample_editable_1" tabindex="0"
                                class="sorting"> تعديل
                            </th>
                            <th id="delete_th"
                                aria-label=" Delete : activate to sort column ascending"
                                style="width: 113px;"
                                colspan="1" rowspan="1"
                                aria-controls="sample_editable_1" tabindex="0"
                                class="sorting"> حذف
                            </th>
                            <th id="delete_th"
                                aria-label=" Delete : activate to sort column ascending"
                                style="width: 113px;"
                                colspan="1" rowspan="1"
                                aria-controls="sample_editable_1" tabindex="0"
                                class="sorting" hidden> حذف
                            </th>

                        </tr>
                        </thead>
                        <tbody id="table_data">
                        <?php
                        $i=1; if(isset($jobsName)) foreach ($jobsName as $row) { ?>
                        <tr role="row" class="">

                            <td> <?php echo $i;?> </td>
                            <td class=""> <?php echo $row->job_name;?> </td>
                            <td>                   <?php echo $row->annual_tax; ?> </td>
                            <td class="">  <?php echo $row->cleaningFees; ?> </td>
                            <td hidden><?=$row->id?></td>
                            <td>
                                <input id="id<?=$i ?>" type="hidden" value="<?=$row->id ?>">
                                <button  data-toggle="modal" data-target="#editModal" class="btn btn-outline editingTRbutton btn-circle green btn-sm purple">
                                    <i class="fa fa-edit"></i> تعديل </button >
                            </td>
                            <td>
                                <a href="<?=base_url()?>index.php/jobs_c/delete_job/<?=$row->id?>"  class="btn btn-outline btn-circle dark btn-sm black">
                                    <i class="fa fa-trash-o"></i> حذف </a>
                            </td>
                        </tr>
                        <?php $i++; }?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
    <script src="{{asset('')}}assets/jquery-3.0.0.js"></script>
    <script src="{{asset('')}}assets/pages/scripts/jobs-datatable.js"></script>
@endsection
@extends('layouts.layout')
