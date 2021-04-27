@include('frontend.layout.head')
<h1 align="center">Employee's Data</h1>
<table class="table table-hover">
	<thead class="thead-dark">
	    <tr>
			<th>SNo.</th>
			<th>Name</th>
			<th>Time In</th>
			<th>Time Out</th>
			<th>Working Hours</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
  	</thead>
  	@php ($count=0)
	@foreach($Attendance as $attendance)
		@if($attendance->user->role_id==1)
			@php($count++)
			<tr>
			<td>{{$count}}</td>
			<td>{{$attendance->user->name}}</td>
			<td>{{$attendance->time_in}}</td>
			<td>{{$attendance->time_out}}</td>
			<td>{{$attendance->working_hours}}</td>
			<td>{{$attendance->attendance_status}}</td>
			<td><a href="{{'edit/'.encrypt($attendance->id) }}" class="btn btn-primary btn-sm"> Edit</a></td>
		@endif
			</tr>
	@endforeach
</table>
