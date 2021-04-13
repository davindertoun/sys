@extends('frontend.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
    </section>
    <!-- Main content -->
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                src="{{ auth()->user()->profile_img }}"
                alt="User profile picture">
              </div>
              <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
              <p class="text-muted text-center">{{ auth()->user()->role->name }}</p>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>DOB</b>
                  <p class="float-right">{{ auth()->user()->dob }}</p>
                </li>
                <li class="list-group-item">
                  <b>Department</b>
                  <p class="float-right">{{ auth()->user()->department}}</p>
                </li>
                <li class="list-group-item">
                  <b>Email</b>
                  <p class="float-right">{{ auth()->user()->email }}</p>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-birthday-cake"></i> Upcoming Birthday</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Attendance</a></li>

                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Leave List</a></li>
                  
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Leave</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ URL('logout') }}">Logout</a></li>
                </ul>
                @if(empty($today))
                <button name="timein" class="btn btn-success float-right" getId="{{auth()->user()->id}}" id="timeIn">Time In</button>
                @else
                <button name="timeout" class="btn btn-success float-right" getId="{{auth()->user()->id}}"  id="timeOut" >Time Out</button>
                @endif
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <table class="table">
                      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                      <tr>
                        <th>S NO.</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Working Hours</th>
                        <th>Status</th>
                      </tr>
                      <tbody>

                        @php ($count=0)
                        @foreach ($attendance as $att)
                        @php($count++)
                        <tr>
                        <td>{{$count}}</td>
                        <td>{{$att->time_in}}</td>
                        <td>{{$att->time_out}}</td> 
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <table class="table">
                      <tr>
                        <th>S No.</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                      </tr>
                      <tbody>
                        @php ($count=0)
                        @foreach ($result as $data)
                        @php($count++)
                        <tr>
                        <td>{{$count}}</td>
                        <td>{{$data->start_date}}</td>
                        <td>{{$data->end_date}}</td>
                        <td>{{$data->description}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                     <form action="{{url('leave')}}"  class="form-horizontal" autocomplete="off" method="post">
                      @csrf
                      <div class="form-group row">
                        <!-- <label  for="inputName" class="col-sm-2 col-form-label">User Id</label> -->
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-10">
                          <input name="user_id" type="hidden" class="form-control"  value="{{auth::user()->id}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                          <input name="start_date" type="date" class="form-control" id="my_date_picker1" placeholder="Start Date">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">End Date</label>
                        <div class="col-sm-10">
                          <input name="end_date" type="date" class="form-control" id="my_date_picker2" placeholder="End Date">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Reason</label>
                        <div class="col-sm-10">
                          <textarea name="reason" class="form-control" id="inputExperience" placeholder="Reason"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button  value="submit" name="submit" type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                      </div>    
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      <!-- /.container-fluid -->    
    <!-- /.content -->
  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
<script>
  $("#timeIn").on("click",function(){
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
    var date = new Date();
    var amOrpm= date.getHours() <12 ? "AM":"PM";
    var hour = (date.getHours()<12)? date.getHours() : date.getHours() -12;
    if (hour == 0) {
        hour = 12;
    }
    var minute = date.getMinutes() ;
    if (minute<10){
        minute = "0"+minute;
    }
    var timein = hour + ":" + minute + " " + amOrpm;
    yr      = date.getFullYear(),
    month   =(date.getMonth()+1) < 10 ? '0' + (date.getMonth()+1) : (date.getMonth()+1),
    day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),
    newDate = yr + '-' + month + '-' + day  ;
    var id = $(this).attr('getId');
      $.ajax({ 
            url:"{{url('timein')}}",
            type: 'POST',
            data: { timein, id,newDate },
            success: function(dataResult){
              console.log(dataResult);
              $("#ajax-tr").html(dataResult);
              $("#timeOut").show();
              $("#timeIn").hide();
        }
        });
     return false;
  });
  $("#timeOut").on("click",function(){
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
    var dt = new Date();
    var amOrpm= dt.getHours() <12 ? "AM":"PM";
    var hour = (dt.getHours()<12)? dt.getHours() : dt.getHours() -12;
    if (hour == 0) {
        hour = 12;
    }
    var minute = dt.getMinutes() ;
    if (minute<10){
        minute = "0"+minute;
    }
    var timeout = hour + ":" + minute +" " + amOrpm; 
    yr      = dt.getFullYear(),
    month   =(dt.getMonth()+1) < 10 ? '0' + (dt.getMonth()+1) : (dt.getMonth()+1),
    day     = dt.getDate()  < 10 ? '0' + dt.getDate()  : dt.getDate(),
    newdt = yr + '-' + month + '-' + day  ;
    var user_id = $(this).attr('getId');
    $.ajax({
            url:"timeout",
            type: 'POST',
            data: { timeout ,user_id,newdt},
            success: function(data){
              console.log(data)
              $("#timeOut").show();
              $("#timeIn").hide();
              var data = JSON.parse(data);
              $("#ajax-tr").html(data.html);
    $("#timeOut").html("Total Working Time: "+data.total);
        }
    });
  });
</script>
@endsection