@extends('layouts.master')

@section('title', 'عرض الطالب')
@section('page_title', 'تفاصيل الطالب')
@section('breadcrumb', 'عرض الطالب')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-body">
        <h5><strong>اسم الطالب:</strong> {{ $student->name }}</h5>
        <h5><strong>الحالة:</strong>
          @if($student->status)
            <span class="badge bg-success">مفعل</span>
          @else
            <span class="badge bg-danger">غير مفعل</span>
          @endif
        </h5>

        <hr>
        <h5><strong>صورة الطالب:</strong></h5>
        @if($student->image)
          <img src="{{ asset('admin/' . $student->image) }}" alt="صورة الطالب" class="img-thumbnail" style="width: 100px; height: 100px;">

        @else
          <p class="text-muted">لا توجد صورة حالياً</p>
        @endif
        <hr>
        <h5><strong>الدولة:</strong> {{ $student->country }}</h5>
        <h5><strong>رقم الهاتف:</strong> {{ $student->phone }}</h5>
        <h5><strong>العنوان:</strong> {{ $student->address }}</h5>
        <h5><strong>ملاحظات:</strong> {{ $student->notes }}</h5>
        <h5><strong>تاريخ الإضافة:</strong> {{ $student->created_at }}</h5>
        <h5><strong>تاريخ التحديث:</strong> {{ $student->updated_at }}</h5>
        <hr>

        <a href="{{ route('students.index') }}" class="btn btn-secondary">↩️ رجوع</a>
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">✏️ تعديل</a>
      </div>
    </div>
  </div>
</div>
@endsection
