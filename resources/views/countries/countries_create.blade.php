<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>إضافة رحلة</title>
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
  <h2 class="text-center mb-4">إضافة رحلة جديدة ✈️</h2>

  <div class="form-container">
    <form action="{{ route('countries.store') }}" method="POST">
      @csrf

      <!-- اسم الرحلة -->
      <div class="mb-3">
        <label for="name" class="form-label">اسم الرحلة</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="اكتب اسم الرحلة">
        @error('name')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
      </div>

      <!-- حالة الرحلة -->
      <div class="mb-3">
        <label for="status" class="form-label">حالة الرحلة</label>
        <select class="form-select" id="status" name="status">
          <option value="1" selected>نشطة ✅</option>
          <option value="0">غير نشطة ❌</option>
        </select>
        @error('status')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
      </div>

      <!-- زر الإرسال -->
      <button type="submit" class="btn btn-success w-100">➕ إضافة الرحلة</button>
    </form>
  </div>
</div>

</body>
</html>
