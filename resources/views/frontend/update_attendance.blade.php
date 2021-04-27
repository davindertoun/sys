@extends('frontend.app')
@section('content')
<h1 align="center">Attendance of {{$data->user->name}}</h1>

<div class="row">
    <div class="col-md-4">
        <form action="{{url('tl_attendance')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <!-- <div class="form-group">
              <label >Name</label>
              <input class="form-control" name='name' id="name" value="{{$data->user->name}}" >
            </div> -->
            <div class="form-group">
                <label>Time In</label>
                <input type="text" class="form-control" name='time_in' id="time_in" value="{{$data->time_in}}"  >
            </div>
            <div class="form-group">
                <label>Time Out</label>
                <input type="text" class="form-control" name='time_out' id="time_out" value="{{$data->time_out}}">
            </div>
            <div class="form-group">
                <label>Working Hours</label>
                <input type="text" class="form-control" name='working_hours' id="working_hours" value="{{$data->working_hours}}">
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" class="form-control" name='status' id="status" value="{{$data->status}}" required="required">
            </div>
            <div class="form-group">
                <label>Reason</label>
                <textarea name="reason" class="form-control" id="reason" placeholder="Reason" required="required"></textarea>
            </div>
            <button type="submit" name="submit" value="Submit" class="btn btn-primary">update</button>
          </form>

    </div>
   

</div>


  @endsection