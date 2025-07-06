@extends('layouts.master')

@section('title', 'إضافة معلم')
@section('page_title', 'إضافة معلم جديد')
@section('breadcrumb', 'إضافة معلم')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('professors.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">اسم المعلم</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">اختر الكورسات</label>
                            <div class="row">
                                @foreach ($courses as $course)
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="courses[]"
                                                value="{{ $course->id }}" id="course_{{ $course->id }}">
                                            <label class="form-check-label" for="course_{{ $course->id }}">
                                                {{ $course->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">الحالة</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>مفعل</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>غير مفعل</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">صورة المعلم</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="country" class="form-label">الدولة</label>
                            <input type="text" name="country" id="country" value="{{ old('country') }}"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">رقم الهاتف</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">العنوان</label>
                            <input type="text" name="address" id="address" value="{{ old('address') }}"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">ملاحظات</label>
                            <textarea name="notes" id="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success">💾 حفظ</button>
                        <a href="{{ route('professors.index') }}" class="btn btn-secondary">↩️ رجوع</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
