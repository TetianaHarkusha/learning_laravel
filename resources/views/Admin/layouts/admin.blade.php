<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Адмін.панель-@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/Admin/dist/css/adminlte.min.css">
  <!-- Custom style -->
  <link rel="stylesheet" href="/Admin/css/admin.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('Admin.includes.navbar')
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @include('Admin.includes.logo')
    <!-- Sidebar -->
    @include('Admin.includes.sidebar.index')
  </aside>
  <div class="content-wrapper">
    @include('Admin.includes.content')
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('Admin.includes.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/Admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/Admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/Admin/dist/js/adminlte.min.js"></script>
<script src="/Admin/js/admin.js"></script>
</body>
</html>
