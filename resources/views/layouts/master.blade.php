<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>@yield("title", "تعلم لارفيل")</title>

  
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/fonts/SansPro/SansPro.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/bootstrap_rtl-v4.2.1/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/bootstrap_rtl-v4.2.1/custom_rtl.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/mycustomstyle.css') }}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  
  @include('layouts.navbar')

 
  @include('layouts.sidebar')

  
  <div class="content-wrapper">
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield("page_title", "صفحة البداية")</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
              <li class="breadcrumb-item active">@yield("breadcrumb", "صفحة البداية")</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

   
    <div class="content">
      <div class="container-fluid">
        @yield("content")
      </div>
    </div>
  </div>

 
  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>عنوان جانبي</h5>
      <p>محتوى الشريط الجانبي</p>
    </div>
  </aside>

 
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
      أي شيء تريده
    </div>
    
  </footer>
</div>

{{-- سكربتات الجافاسكربت --}}
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
