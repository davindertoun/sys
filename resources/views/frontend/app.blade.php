<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layout.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Main Sidebar Container -->
   
  <!-- Content Wrapper.

 Contains page content -->
  <div class="wrapper">
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
  @include('frontend.layout.footer')
        @yield('content')
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
