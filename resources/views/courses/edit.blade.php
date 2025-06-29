@extends('layouts.master')

@section('title', 'تعديل الكورس')
@section('page_title', 'تعديل بيانات الكورس')
@section('breadcrumb', 'تعديل الكورس')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="{{ route('courses.update', $course->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="name" class="form-label">اسم الكورس</label>
            <input type="text" name="name" id="name" value="{{ $course->name }}" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="status" class="form-label">الحالة</label>
            <select name="status" id="status" class="form-control">
              <option value="1" {{ $course->status ? 'selected' : '' }}>مفعل</option>
              <option value="0" {{ !$course->status ? 'selected' : '' }}>غير مفعل</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">💾 تحديث</button>
          <a href="{{ route('courses.index') }}" class="btn btn-secondary">↩️ رجوع</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
