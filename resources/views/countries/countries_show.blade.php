<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>تفاصيل الرحلة</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      padding: 30px;
    }
    .details-box {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 25px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      max-width: 600px;
      margin: auto;
    }
    .label {
      font-weight: bold;
      color: #333;
    }
    .value {
      margin-bottom: 15px;
      font-size: 16px;
    }
    .status-active {
      color: green;
      font-weight: bold;
    }
    .status-inactive {
      color: red;
      font-weight: bold;
    }
    .btn-back {
      background-color: #04AA6D;
      color: white;
      border: none;
    }
    .btn-back:hover {
      background-color: #03945f;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="details-box">
    <h3 class="mb-4 text-center">📄 تفاصيل الرحلة رقم {{ $country->id }}</h3>

    <div class="value"><span class="label">✈️ اسم الرحلة:</span> {{ $country->country_name }}</div>

    <div class="value">
      <span class="label">📌 حالة الرحلة:</span>
      @if($country->status)
        <span class="status-active">نشطة ✅</span>
      @else
        <span class="status-inactive">غير نشطة ❌</span>
      @endif
    </div>

    <div class="value"><span class="label">🕒 تاريخ الإنشاء:</span> {{ $country->created_at }}</div>
    <div class="value"><span class="label">🔄 آخر تعديل:</span> {{ $country->updated_at }}</div>

    <a href="{{ route('countries.index') }}" class="btn btn-back mt-4 w-100">⬅️ العودة إلى قائمة الرحلات</a>
  </div>
</div>

</body>
</html>
