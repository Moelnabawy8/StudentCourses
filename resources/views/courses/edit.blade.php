@extends('layouts.master')

@section('title', 'تعديل الكورس')
@section('page_title', 'تعديل بيانات الكورس')
@section('breadcrumb', 'تعديل الكورس')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card card-warning shadow-sm">
      <div class="card-header">
        <h5 class="mb-0">✏️ تعديل الكورس</h5>
      </div>
      <div class="card-body">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('courses.update', $course->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="form-group mb-3">
            <label for="name">اسم الكورس</label>
            <input type="text" name="name" id="name" value="{{ old('name', $course->name) }}" class="form-control" required>
          </div>

          <div class="form-group mb-4">
            <label for="status">الحالة</label>
            <select name="status" id="status" class="form-control">
              <option value="1" {{ $course->status == 1 ? 'selected' : '' }}>مفعل</option>
              <option value="0" {{ $course->status == 0 ? 'selected' : '' }}>غير مفعل</option>
            </select>
          </div>

          <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">
              💾 تحديث
            </button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">
              ↩️ رجوع
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
