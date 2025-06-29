{{-- resources/views/layouts/navbar.blade.php --}}
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  {{-- روابط اليسار --}}
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ url('/home') }}" class="nav-link">الرئيسية</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">تواصل معنا</a>
    </li>
  </ul>

  {{-- نموذج البحث --}}
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="بحث" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  {{-- روابط اليمين --}}
  <ul class="navbar-nav ml-auto">
    {{-- رسائل --}}
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#"><i class="far fa-comments"></i><span class="badge badge-danger navbar-badge">3</span></a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        {{-- الرسائل هنا --}}
        <a href="#" class="dropdown-item">لا توجد رسائل حالياً</a>
      </div>
    </li>

    {{-- إشعارات --}}
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#"><i class="far fa-bell"></i><span class="badge badge-warning navbar-badge">0</span></a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-header">0 إشعار</span>
      </div>
    </li>

    {{-- زر التحكم الجانبي --}}
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fas fa-th-large"></i></a>
    </li>
  </ul>
</nav>
