@extends('layouts.master')

@section('title', 'تواصل معنا')
@section('page_title', 'نموذج التواصل')
@section('breadcrumb', 'تواصل معنا')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">راسلنا</h3>
            </div>

            <form method="POST" action="{{ route('contact.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="message">الرسالة</label>
                        <textarea name="message" class="form-control" rows="5" required>{{ old('message') }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">إرسال</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
