{{-- resources/views/courses/index.blade.php --}}
@extends('layouts.master')

@section('title', 'جدول الكورسات')
@section('page_title', 'إدارة الكورسات')
@section('breadcrumb', 'جدول الكورسات')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">📚 قائمة الكورسات</h3>
        <a href="{{ route('courses.create') }}" class="btn btn-success">➕ إضافة كورس</a>
      </div>

      <div class="card-body">
        <table class="table table-bordered table-hover text-center">
          <thead class="table-success">
            <tr>
              <th>#</th>
              <th>اسم الكورس</th>
              <th>الحالة</th>
              <th>الإجراءات</th>
            </tr>
          </thead>
          <tbody>
            @forelse($courses as $index => $course)
              <tr>
                <td>{{ $index + 1 }}</td>
                
                <td>{{ $course->name }}</td>
                 <td>
                  @if($course->status)
                    <span class="badge bg-success">مفعل</span>
                  @else
                    <span class="badge bg-danger">غير مفعل</span>
                  @endif
                </td>
                <td>
                  <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info">👁 عرض</a>
                  <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-primary">✏️ تعديل</a>
                  <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">🗑️ حذف</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="3">لا توجد كورسات متاحة حالياً</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
