<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('summernote/summernote.min.css')}}">
  <link rel="stylesheet" href="{{asset('bootstrap-toggle-master/css/bootstrap-toggle.min.css')}}">

</head>
<body>

    @include('admin.layout.navbar')

    <div class="container-fluid page-body-wrapper">

        @include('admin.layout.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h1>@yield('title')</h1>

                    </div>
                    <div class="card-body">

                        @yield('content')
                    </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Bài làm của: <a href="https://www.fb.com/dukeondab" target="_blank">Minhductham@duck.com </a>2022</span>

            </div>
        </footer>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{asset('admin/vendors/base/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('admin/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/js/template.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('admin/js/dashboard.js')}}"></script>
<script src="{{asset('admin/js/data-table.js')}}"></script>
<script src="{{asset('admin/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/js/dataTables.bootstrap4.js')}}"></script>
<!-- End custom js for this page-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('admin/js/jquery.cookie.js')}}" type="text/javascript"></script>
<script src="{{asset('auth/js/jquery.min.js')}}"></script>
<script src="{{asset('summernote/summernote.min.js')}}"></script>
{{-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}
<script src="{{asset('bootstrap-toggle-master/js/bootstrap-toggle.js')}}"></script>

@yield('script')
</body>

</html>

