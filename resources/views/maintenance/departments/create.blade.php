@extends('layouts.layout')
@section('content')
    <form action="{{route('admin.departments.store')}}" method="POST">
        @csrf
        @include('maintenance.departments.form')
        <div class="form-group">
            <button type="submit"  class="btn btn-primary font-weight-bold">حفظ </button>
        </div>
    </form>
    <script src="{{asset('')}}assets/jquery-3.0.0.js"></script>
    <script src="{{asset('')}}assets/pages/scripts/jobs-datatable.js"></script>
@endsection

