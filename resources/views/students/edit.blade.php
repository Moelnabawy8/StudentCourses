@extends('layouts.master')

@section('title', 'تعديل الطالب')
@section('page_title', 'تعديل بيانات الطالب')
@section('breadcrumb', 'تعديل الطالب')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="name" class="form-label">اسم الطالب</label>
            <input type="text" name="name" id="name" value="{{ $student->name }}" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="status" class="form-label">الحالة</label>
            <select name="status" id="status" class="form-control">
              <option value="1" {{ $student->status ? 'selected' : '' }}>مفعل</option>
              <option value="0" {{ !$student->status ? 'selected' : '' }}>غير مفعل</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="image" class="form-label">صورة الطالب</label>
            <input type="file" name="image" id="image" class="form-control">
            
            @if($student->image)
              <img src="{{ asset("admin/". $student->image) }}" alt="صورة الطالب" class="img-thumbnail mt-2" style="width: 100px; height: 100px;">
            @else
              <p class="text-muted mt-2">لا توجد صورة حالياً</p>
            @endif
          </div>
          <div class="mb-3">
            <label for="country" class="form-label">الدولة</label>
            <input type="text" name="country" id="country" value="{{ $student->country }}" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">رقم الهاتف</label>
            <input type="text" name="phone" id="phone" value="{{ $student->phone }}" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">العنوان</label>
            <input type="text" name="address" id="address" value="{{ $student->address }}" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="notes" class="form-label">ملاحظات</label>
            <textarea name="notes" id="notes" class="form-control" rows="3">{{ $student->notes }}</textarea>
          </div>


          <button type="submit" class="btn btn-primary">💾 تحديث</button>
          <a href="{{ route('students.index') }}" class="btn btn-secondary">↩️ رجوع</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
