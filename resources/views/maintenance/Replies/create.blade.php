@extends('layouts.layout')
@section('content')
    <div class="portlet light portlet-fit ">
        <div class="portlet-body">
            @include('maintenance.replies.form')
        </div>
    </div>
    <script src="{{asset('')}}assets/jquery-3.0.0.js"></script>
    <script src="{{asset('')}}assets/pages/scripts/jobs-datatable.js"></script>
@endsection

