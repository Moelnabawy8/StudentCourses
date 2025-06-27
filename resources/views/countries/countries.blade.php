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
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="mb-4 text-center">جدول الرحلات ✈️</h1>

        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('countries.trashed') }}" class="btn btn-outline-danger">🗑️ عرض الرحلات المحذوفة</a>
            <a href="{{ route('countries.create') }}" class="btn btn-success">➕ إضافة رحلة</a>
        </div>


        <div class="table-container">
            <table class="table table-striped table-hover table-bordered text-center">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>اسم الرحلة</th>
                        <th>الوجهة</th>
                        <th>الحالة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($countries)
                        @foreach ($countries as $index => $country)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $country->country_name }}</td>
                                <td>{{ $country->destination->name }}</td>
                                <td>
                                    @if ($country->status)
                                        <span class="text-success fw-bold">نشطة ✅</span>
                                    @else
                                        <span class="text-danger fw-bold">غير نشطة ❌</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('countries.show', $country->id) }}"
                                        class="btn btn-info btn-custom">👁 عرض</a>

                                    <a href="{{ route('countries.edit', $country->id) }}"
                                        class="btn btn-primary btn-custom">✏️ تعديل</a>

                                    <form action="{{ route('countries.destroy', $country->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-custom">🗑️ حذف نهائي</button>
                                    </form>

                                    <form action="{{ route('countries.softDelete', $country->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف الجزئي؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning btn-custom">🗑️ حذف جزئي</button>
                                    </form>
                                    @if ($country->deleted_at)
                                        <form action="{{ route('countries.restore', $country->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('هل أنت متأكد من الاستعادة؟')">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-custom">🔄 استعادة</button>
                                        </form>
                                        
                                    @endif

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
