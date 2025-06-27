<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>جدول الرحلات</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      padding: 30px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .btn-custom {
      font-size: 14px;
      padding: 6px 12px;
      margin: 2px;
    }
    .table-container {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<div class="container">
  <h1 class="mb-4 text-center">جدول الرحلات ✈️</h1>

  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('flights.create') }}" class="btn btn-success">➕ إضافة رحلة</a>
  </div>

  <div class="table-container">
    <table class="table table-striped table-hover table-bordered text-center">
      <thead class="table-success">
        <tr>
          <th>#</th>
          <th>اسم الرحلة</th>
          <th>الإجراءات</th>
        </tr>
      </thead>
      <tbody>
        @if($flights)
          @foreach ($flights as $index => $flight)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $flight->flight_name }}</td>
              <td>
                <a href="{{ route('flights.show', $flight->id) }}" class="btn btn-info btn-custom">👁 عرض</a>

                <a href="{{ route('flights.edit', $flight->id) }}" class="btn btn-primary btn-custom">✏️ تعديل</a>

                <form action="{{ route('flights.destroy', $flight->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-custom">🗑️ حذف</button>
                </form>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="3">لا توجد رحلات متاحة حالياً</td>
          </tr>
        @endif
      </tbody>
    </table>
    
  </div>
</div>

</body>
</html>
