<?php echo $__env->make('frontend.layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<table class="table table-hover">
  <tr>
    <thead class="thead-dark">
      <th>#</th>
      <th>Name</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Reason</th>
      <th>Approved/Reject</th>
    </thead>
  </tr>
  <tbody>
    <?php ($count=0); ?>
    <?php $__currentLoopData = $Leave; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($leave->user->role_id==1): ?>
      <?php ($count++); ?>
      <tr>
        <td><?php echo e($count); ?></td>
        <td><?php echo e($leave->user->name); ?></td>
        <td><?php echo e($leave->start_date); ?></td>
        <td><?php echo e($leave->end_date); ?></td>
        <td><?php echo e($leave->description); ?></td>
        <td scope="col">
          <?php if($leave->state_id == 1): ?>
            <a href="<?php echo e('accept_leave/'.encrypt($leave->id)); ?>" class='btn btn-success'>Accept</a>
            <a href="<?php echo e('reject_leave/'.encrypt($leave->id)); ?>" class='btn btn-danger'>Reject</a>
          <?php endif; ?> 
          <?php if($leave->state_id == 2): ?>
            <button class="btn btn-success">Accepted</button> 
          <?php endif; ?>
          <?php if($leave->state_id == 3): ?>
            <button class="btn btn-danger">Rejected</button>
          <?php endif; ?>
        </td>
      <?php endif; ?>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
        <?php /**PATH C:\xampp\htdocs\laravel\resources\views/frontend/User_leave.blade.php ENDPATH**/ ?>