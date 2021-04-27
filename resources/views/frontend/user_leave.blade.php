@include('frontend.layout.head')
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
    @php ($count=0)
    @foreach ($Leave as $leave)
    @if($leave->user->role_id==1)
      @php($count++)
      <tr>
        <td>{{$count}}</td>
        <td>{{$leave->user->name}}</td>
        <td>{{$leave->start_date}}</td>
        <td>{{$leave->end_date}}</td>
        <td>{{$leave->description}}</td>
        <td scope="col">
          @if ($leave->state_id == 1)
            <a href="{{'accept_leave/'.encrypt($leave->id) }}" class='btn btn-success'>Accept</a>
            <a href="{{'reject_leave/'.encrypt($leave->id) }}" class='btn btn-danger'>Reject</a>
          @endif 
          @if ($leave->state_id == 2)
            <button class="btn btn-success">Accepted</button> 
          @endif
          @if ($leave->state_id == 3)
            <button class="btn btn-danger">Rejected</button>
          @endif
        </td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
        