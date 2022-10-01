<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('products.index')}}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Sản phẩm</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('user.list')}}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">User</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('transaction.list')}}">

          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Đơn hàng</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.contact')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Liên hệ và đăng kí</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('category')}}">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Danh mục</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('size')}}">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Size</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#contact" aria-expanded="false" aria-controls="auth">
            <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Liên hệ và đăng kí</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="contact">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.contact')}}"> Liên hệ </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Đăng kí nhận tin tức </a></li>
          </ul>
        </div>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" href="pages/icons/mdi.html">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Icons</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="documentation/documentation.html">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Trang chủ</span>
        </a>
      </li>
    </ul>
  </nav>
