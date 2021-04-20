<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('frontend.layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
  <?php echo $__env->make('frontend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
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
<?php /**PATH C:\xampp\htdocs\laravel\resources\views/frontend/app.blade.php ENDPATH**/ ?>