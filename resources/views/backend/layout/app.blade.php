<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.layout.head')
    <title>Welcome {{Auth::User()->name}}</title>
    
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('backend.layout.header')
  <!-- Main Sidebar Container -->
 @include('backend.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
       
        @yield('content')
        @section('scrpits')
        @section('custom')
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  @include('backend.layout.footer')
</div>
<!-- ./wrapper -->
</body>
</html>
