@extends('layouts.master')

@section('title', 'عرض الكورس')
@section('page_title', 'تفاصيل الكورس')
@section('breadcrumb', 'عرض الكورس')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-body">
        <h5><strong>اسم الكورس:</strong> {{ $course->name }}</h5>
        <h5><strong>الحالة:</strong>
          @if($course->status)
            <span class="badge bg-success">مفعل</span>
          @else
            <span class="badge bg-danger">غير مفعل</span>
          @endif
        </h5>

        <hr>

        <a href="{{ route('courses.index') }}" class="btn btn-secondary">↩️ رجوع</a>
        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">✏️ تعديل</a>
      </div>
    </div>
  </div>
</div>
@endsection
