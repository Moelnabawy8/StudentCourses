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
    <form action="{{ route('flights.update', $flight->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="name" class="form-label">اسم الرحلة</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $flight['name'] }}" placeholder="اكتب اسم الرحلة">
      </div>

      <button type="submit" class="btn btn-primary w-100">💾 حفظ التعديلات</button>
    </form>
  </div>
</div>

</body>
</html>
