@section('content')
    <form action="" method="post">
        <div class="row" >
            <div class="form-group">
                <label class="col-md-3 control-label">اسم الحرفة</label>
                <div class="col-md-3">
                    <input type="text" name="job_name" class="form-control" placeholder="Enter text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">الضريبة السنوية</label>
                <div class="col-md-3">
                    <input type="text" name="annual_tax" class="form-control" placeholder="Enter text">
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="form-group">
                <label class="col-md-3 control-label">اسم الحرفة</label>
                <div class="col-md-3">
                    <input type="text" name="job_name" class="form-control" placeholder="Enter text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">الضريبة السنوية</label>
                <div class="col-md-3">
                    <input type="text" name="annual_tax" class="form-control" placeholder="Enter text">
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" id="add_job" class="btn btn-primary font-weight-bold">حفظ </button>
        </div>
    </form>
    <script src="{{asset('')}}assets/jquery-3.0.0.js"></script>
    <script src="{{asset('')}}assets/pages/scripts/jobs-datatable.js"></script>
@endsection
@extends('layouts.layout')
