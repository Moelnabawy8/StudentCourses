@foreach ($countries as $c)
    <p>{{ $c->country_name }} - deleted_at: {{ $c->deleted_at }}</p>
@endforeach


<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>الرحلات المحذوفة</title>
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
  <h1 class="mb-4 text-center">الرحلات المحذوفة مؤقتًا 🗑️</h1>

  <div class="mb-3 text-end">
    <a href="{{ route('countries.index') }}" class="btn btn-secondary">⬅️ الرجوع لجدول الرحلات</a>
  </div>

  <div class="table-container">
    <table class="table table-striped table-hover table-bordered text-center">
      <thead class="table-danger">
        <tr>
          <th>#</th>
          <th>اسم الرحلة</th>
          <th>الحالة</th>
          <th>الإجراءات</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($countries as $index => $country)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $country->country_name }}</td>
            <td>{{ $country->status }}</td>
            <td>
              <!-- استرجاع -->
              <form action="{{ route('countries.restore', $country->id) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-success btn-custom">♻️ استرجاع</button>
              </form>

              <!-- حذف نهائي -->
              <form action="{{ route('countries.destroy', $country->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل تريد حذف الرحلة نهائيًا؟')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-custom">🚫 حذف نهائي</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4">لا توجد رحلات محذوفة مؤقتًا حالياً</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
