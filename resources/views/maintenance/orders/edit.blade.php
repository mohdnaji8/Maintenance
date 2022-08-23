@extends('layouts.layout')
@section('content')
    <form action="{{route('orders.update',$order->id)}}" method="POST">
        @csrf
        @include('maintenance.orders.form')
        <div class="form-group">
            <button type="submit"  class="btn btn-large btn-lg btn-primary font-weight-bold">حفظ </button>
        </div>
    </form>
    <script src="{{asset('')}}assets/jquery-3.0.0.js"></script>
    <script src="{{asset('')}}assets/pages/scripts/jobs-datatable.js"></script>
@endsection

