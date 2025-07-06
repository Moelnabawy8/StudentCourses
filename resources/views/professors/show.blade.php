@extends('layouts.master')

@section('title', 'عرض المعلم')
@section('page_title', 'تفاصيل المعلم')
@section('breadcrumb', 'عرض المعلم')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-body">
        <h5><strong>اسم الطالب:</strong> {{ $professor->name }}</h5>
        <h5><strong>الحالة:</strong>
          @if($professor->status)
            <span class="badge bg-success">مفعل</span>
          @else
            <span class="badge bg-danger">غير مفعل</span>
          @endif
        </h5>

        <hr>
        <h5><strong>صورة الطالب:</strong></h5>
        @if($professor->image)
          <img src="{{ asset('admin/' . $professor->image) }}" alt="صورة الطالب" class="img-thumbnail" style="width: 100px; height: 100px;">

        @else
          <p class="text-muted">لا توجد صورة حالياً</p>
        @endif
        <hr>
        <h5><strong>الدولة:</strong> {{ $professor->country }}</h5>
        <h5><strong>رقم الهاتف:</strong> {{ $professor->phone }}</h5>
        <h5><strong>العنوان:</strong> {{ $professor->address }}</h5>
        <h5><strong>ملاحظات:</strong> {{ $professor->notes }}</h5>
        <h5><strong>تاريخ الإضافة:</strong> {{ $professor->created_at }}</h5>
        <h5><strong>تاريخ التحديث:</strong> {{ $professor->updated_at }}</h5>
        <hr>

        <a href="{{ route('professors.index') }}" class="btn btn-secondary">↩️ رجوع</a>
        <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-primary">✏️ تعديل</a>
      </div>
    </div>
  </div>
</div>
@endsection
