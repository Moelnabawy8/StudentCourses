{{-- resources/views/professors/index.blade.php --}}
@extends('layouts.master')

@section('title', 'قائمة المعلمين')
@section('page_title', 'قائمة المعلمين')
@section('breadcrumb', 'قائمة المعلمين')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">👨‍🎓 أسماء المعلمين</h3>
                    <a href="{{ route('professors.create') }}" class="btn btn-success">➕ إضافة معلم</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>اسم المعلم</th>
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
                            @forelse($professors as $index => $professor)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $professor->name }}</td>
                                    <td>
                                        @if ($professor->status)
                                            <span class="badge bg-success">مفعل</span>
                                        @else
                                            <span class="badge bg-danger">غير مفعل</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($professor->image)
                                            <img src="{{ asset('admin/' . $professor->image) }}" alt="صورة الطالب"
                                                class="img-thumbnail" style="width: 50px; height: 50px;">
                                        @else
                                            <span class="text-muted">لا توجد صورة</span>
                                        @endif
                                    </td>
                                    <td>{{ $professor->country }}</td>
                                    <td>{{ $professor->phone }}</td>
                                    <td>{{ $professor->address }}</td>
                                    <td>{{ $professor->notes }}</td>
                                    <td>{{ $professor->created_at }}</td>
                                    <td>{{ $professor->updated_at }}</td>
                                    <td>
                                        @if ($professor->courses->count())
                                            <ul class="list-unstyled m-0">
                                                @foreach ($professor->courses as $course)
                                                    <li>{{ $course->name }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-muted">لا يوجد كورسات</span>
                                        @endif
                                    </td>



                                    <td>
                                        <a href="{{ route('professors.show', $professor->id) }}" class="btn btn-sm btn-info">👁
                                            عرض</a>
                                        <a href="{{ route('professors.edit', $professor->id) }}"
                                            class="btn btn-sm btn-primary">✏️ تعديل</a>
                                        <form action="{{ route('professors.destroy', $professor->id) }}" method="POST"
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
