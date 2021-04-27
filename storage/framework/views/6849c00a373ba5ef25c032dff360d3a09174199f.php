<?php echo $__env->make('frontend.layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<h1 align="center">Team Leader's Data</h1>
<table class="table table-hover">
	<thead class="thead-dark">
	    <tr>
			<th>SNo.</th>
			<th>ID</th>
			<th>Name</th>
			<th>Time In</th>
			<th>Time Out</th>
			<th>Working Hours</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
  	</thead>
  	<?php ($count=0); ?>
	<?php $__currentLoopData = $Attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php ($count++); ?>
	<tr>
		<?php if($attendance->user->role_id==2): ?>
		<td><?php echo e($count); ?></td>
		<td><?php echo e($attendance->id); ?></td>
		<td><?php echo e($attendance->user->name); ?></td>
		<td><?php echo e($attendance->time_in); ?></td>
		<td><?php echo e($attendance->time_out); ?></td>
		<td><?php echo e($attendance->working_hours); ?></td>
		<td><?php echo e($attendance->attendance_status); ?></td>
		<td><a href="<?php echo e('update/'.encrypt($attendance->id)); ?>" class="btn btn-primary btn-sm"> Edit</a></td>
		<?php endif; ?>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php /**PATH C:\xampp\htdocs\laravel\resources\views/frontend/tl_data.blade.php ENDPATH**/ ?>