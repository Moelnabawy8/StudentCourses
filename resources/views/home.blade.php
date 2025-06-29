@extends('layouts.master')

@section('title', 'الصفحة الرئيسية')
@section('navbar')
@section('sidebar' )

@section('content')
<div class="row">
  <div class="col-12">
    <div style="
      height: 600px;
      width: 100%;
      background-image: url('{{ asset('admin/background-home.jpg') }}');
      background-size: cover;
      background-position: center;
      border-radius: 10px;
    ">
    </div>
  </div>
</div>
@endsection
