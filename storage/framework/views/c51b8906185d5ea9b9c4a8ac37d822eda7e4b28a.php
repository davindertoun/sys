
<?php $__env->startSection('content'); ?>
<h1 align="center">Attendance of <?php echo e($data->user->name); ?></h1>

<div class="row">
    <div class="col-md-4">
        <form action="<?php echo e(url('tl_attendance')); ?>" enctype="multipart/form-data" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
            <!-- <div class="form-group">
              <label >Name</label>
              <input class="form-control" name='name' id="name" value="<?php echo e($data->user->name); ?>" >
            </div> -->
            <div class="form-group">
                <label>Time In</label>
                <input type="text" class="form-control" name='time_in' id="time_in" value="<?php echo e($data->time_in); ?>"  >
            </div>
            <div class="form-group">
                <label>Time Out</label>
                <input type="text" class="form-control" name='time_out' id="time_out" value="<?php echo e($data->time_out); ?>">
            </div>
            <div class="form-group">
                <label>Working Hours</label>
                <input type="text" class="form-control" name='working_hours' id="working_hours" value="<?php echo e($data->working_hours); ?>">
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" class="form-control" name='status' id="status" value="<?php echo e($data->status); ?>" required="required">
            </div>
            <div class="form-group">
                <label>Reason</label>
                <textarea name="reason" class="form-control" id="reason" placeholder="Reason" required="required"></textarea>
            </div>
            <button type="submit" name="submit" value="Submit" class="btn btn-primary">update</button>
          </form>

    </div>
   

</div>


  <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/frontend/update_attendance.blade.php ENDPATH**/ ?>