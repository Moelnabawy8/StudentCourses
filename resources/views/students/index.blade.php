{{-- resources/views/students/index.blade.php --}}
@extends('layouts.master')

@section('title', 'قائمة الطلاب')
@section('page_title', 'قائمة الطلاب')
@section('breadcrumb', 'قائمة الطلاب')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">👨‍🎓 أسماء الطلاب</h3>
                    <a href="{{ route('students.create') }}" class="btn btn-success">➕ إضافة طالب</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>اسم الطالب</th>
                                <th>الحالة</th>
                                <th>الصورة</th>

                                <th>الدولة</th>
                                <th>رقم الهاتف</th>
                                <th>العنوان</th>
                                <th>ملاحظات</th>
                                <th>الاضافة</th>
                                <th>التحديث</th>
                                <th>الكورسات</th>

                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $index => $student)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>
                                        @if ($student->status)
                                            <span class="badge bg-success">مفعل</span>
                                        @else
                                            <span class="badge bg-danger">غير مفعل</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($student->image)
                                            <img src="{{ asset('admin/' . $student->image) }}" alt="صورة الطالب"
                                                class="img-thumbnail" style="width: 50px; height: 50px;">
                                        @else
                                            <span class="text-muted">لا توجد صورة</span>
                                        @endif
                                    </td>
                                    <td>{{ $student->country }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->notes }}</td>
                                    <td>{{ $student->created_at }}</td>
                                    <td>{{ $student->updated_at }}</td>
                                    <td>
                                        @if ($student->courses->count())
                                            <ul class="list-unstyled m-0">
                                                @foreach ($student->courses as $course)
                                                    <li>{{ $course->name }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-muted">لا يوجد كورسات</span>
                                        @endif
                                    </td>



                                    <td>
                                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-info">👁
                                            عرض</a>
                                        <a href="{{ route('students.edit', $student->id) }}"
                                            class="btn btn-sm btn-primary">✏️ تعديل</a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">🗑️ حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">لا يوجد طلاب حالياً</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
