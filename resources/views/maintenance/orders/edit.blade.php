@extends('layouts.layout')
@section('content')
    <form action="{{route('admin.orders.update',$order->id)}}" method="POST">
        @method('PUT')
        @csrf
        @include('maintenance.orders.form')
    </form>
    <script src="{{asset('')}}assets/jquery-3.0.0.js"></script>
    <script src="{{asset('')}}assets/pages/scripts/jobs-datatable.js"></script>
@endsection

