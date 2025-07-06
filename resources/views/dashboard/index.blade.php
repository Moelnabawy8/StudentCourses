@extends('layouts.master')

@section('title', 'لوحة التحكم')
@section('page_title', 'لوحة التحكم')
@section('breadcrumb', 'Dashboard')

@section('content')
<div class="row">
    <!-- عدد الطلاب -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $studentsCount }}</h3>
                <p>عدد الطلاب</p>
            </div>
            <div class="icon"><i class="fas fa-user-graduate"></i></div>
        </div>
    </div>

    <!-- عدد الكورسات -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $coursesCount }}</h3>
                <p>عدد الكورسات</p>
            </div>
            <div class="icon"><i class="fas fa-book-open"></i></div>
        </div>
    </div>
</div>

<!-- أشهر الكورسات -->
<div class="card mt-4">
    <div class="card-header"><h5 class="card-title">أشهر الكورسات</h5></div>
    <div class="card-body p-0">
        <ul class="list-group list-group-flush">
            @foreach($topCourses as $course)
                <li class="list-group-item d-flex justify-content-between">
                    <span>{{ $course->name }}</span>
                    <span class="badge badge-primary">{{ $course->students_count }} طلاب</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<!-- أحدث الطلاب -->
<div class="card mt-4">
    <div class="card-header"><h5 class="card-title">أحدث الطلاب</h5></div>
    <div class="card-body p-0">
        <ul class="list-group list-group-flush">
            @foreach($latestStudents as $student)
                <li class="list-group-item d-flex justify-content-between">
                    <span>{{ $student->name }}</span>
                    <span class="text-muted">{{ $student->created_at->format('Y-m-d') }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
