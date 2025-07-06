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
                        @if ($course->status)
                            <span class="badge bg-success">مفعل</span>
                        @else
                            <span class="badge bg-danger">غير مفعل</span>
                        @endif
                    </h5>

                    <hr>
                    <hr>
                    <h5 class="mt-4">الطلاب المسجلين في الكورس:</h5>

                    @if ($course->students->count())
                        <table class="table table-bordered table-hover mt-3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الإلكتروني</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($course->students as $index => $student)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-muted">لا يوجد طلاب مسجلين في هذا الكورس.</p>
                    @endif


                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">↩️ رجوع</a>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">✏️ تعديل</a>
                </div>
            </div>
        </div>
    </div>
@endsection
