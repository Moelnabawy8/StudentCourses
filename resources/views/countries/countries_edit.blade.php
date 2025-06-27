<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>تعديل الرحلة</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      padding: 30px;
    }
    .form-container {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 25px;
      box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
      max-width: 600px;
      margin: auto;
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="text-center mb-4">✏️ تعديل بيانات الرحلة</h2>

  <div class="form-container">
    <form action="{{ route('countries.update', $country->id) }}" method="POST">
      @csrf
      @method('PUT')

      <!-- اسم الرحلة -->
      <div class="mb-3">
        <label for="name" class="form-label">اسم الرحلة</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $country->country_name }}" placeholder="اكتب اسم الرحلة">
        @error('name')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
      </div>

      <!-- الحالة -->
      <div class="mb-3">
        <label for="status" class="form-label">حالة الرحلة</label>
        <select class="form-select" id="status" name="status">
          <option value="1" {{ $country->status == 1 ? 'selected' : '' }}>نشطة ✅</option>
          <option value="0" {{ $country->status == 0 ? 'selected' : '' }}>غير نشطة ❌</option>
        </select>
        @error('status')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary w-100">💾 حفظ التعديلات</button>
    </form>
  </div>
</div>

</body>
</html>
