@extends('layouts.master')

@section('title', 'إضافة كورس')
@section('page_title', 'إضافة كورس جديد')
@section('breadcrumb', 'إضافة كورس')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="{{ route('courses.store') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label for="name" class="form-label">اسم الكورس</label>
            <input type="text" name="name" id="name" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="status" class="form-label">الحالة</label>
            <select name="status" id="status" class="form-control">
              <option value="1">مفعل</option>
              <option value="0">غير مفعل</option>
            </select>
          </div>

          <button type="submit" class="btn btn-success">💾 حفظ</button>
          <a href="{{ route('courses.index') }}" class="btn btn-secondary">↩️ رجوع</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
