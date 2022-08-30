@extends('layouts.layout')
@section('content')
    <div class="portlet light portlet-fit bordered">
        <div class="portlet-body">
            <form action="{{route('admin.replies.store')}}" method="POST">
                @csrf
                @include('maintenance.replies.form')
            </form>
        </div>
    </div>
    <script src="{{asset('')}}assets/jquery-3.0.0.js"></script>
    <script src="{{asset('')}}assets/pages/scripts/jobs-datatable.js"></script>
@endsection

