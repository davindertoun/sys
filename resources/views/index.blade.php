@extends('frontend.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee</h1>
          </div>
          <div class="col-sm-6">
            <div class="dropdown float-right">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{auth()->user()->name}}</a>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item">Action</a>
                <a href="{{ URL('logout') }}" class="dropdown-item">LogOut</a>
              </div>
            </div>
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
              <ul id="user_status"class="list-group">
                @foreach ($Birthday as $Bday)
                <li class="list-inline-item">
                  <p class="float-right"><b>{{$Bday->name}}</b></p>
                  @if($Bday->last_login > time())
                  <div class="float-left">
                    <img style=" margin-bottom:10px; float:left;width:50px;height:50px;" class="profile-user-img img-fluid img-circle border-success"src="{{$Bday->profile_img }}"alt="User profile picture">
                  </div>
                  @else
                  <div class="float-left">
                    <img style=" margin-bottom:10px; float:left;width:50px;height:50px;" class="profile-user-img img-fluid img-circle border-danger"src="{{$Bday->profile_img }}"alt="User profile picture">
                  </div>
                  @endif
                </li>
                @endforeach
              </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{session('success')}}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Attendance</a></li>
                  
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Leave List</a></li>
                  
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Leave</a></li>
                </ul>
                @if(empty($today))
                <button name="timein" class="btn btn-success float-right" getId="{{auth()->user()->id}}" id="timeIn">Time In</button>
                @endif
                @if(!empty($data))
                <button name="timeout" class="btn btn-success float-right" getId="{{auth()->user()->id}}"  id="timeOut" >Time Out</button>
                @else
                <button name="timeout" class="btn btn-success float-right" getId="{{auth()->user()->id}}" style="display: none;" id="timeOut" >Time Out</button>
                @endif
                @if(!empty($today) && empty($data))
                <button class="btn btn-success float-right" >Total Working Time : {{$today->working_hours}}</button>
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
                      <tbody id="ajax_tr">
                        @php ($count=0)
                        @foreach ($attendance as $att)
                        @php($count++)
                        <tr>
                        <td>{{$count}}</td>
                        <td>{{$att->time_in}}</td>
                        <td>{{$att->time_out}}</td>
                        <td>{{$att->working_hours}}</td>
                        @if($att->state_id==0)
                        <td class="text-warning">Pending...</td>
                        @endif
                        @if($att->state_id==1)
                        <td class="text-success">Present</td>
                        @endif
                        @if($att->state_id==2)
                        <td class="text-danger">Absent</td>
                        @endif
                        @if($att->state_id==3)
                        <td class="text-primary">Half Day</td>
                        @endif
                        @if($att->state_id==4)
                        <td class="text-secondary">Short Leave</td>
                        @endif
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
                        @if($data->state_id==1)
                        <td class="text-warning">Pending...</td>
                        @endif
                        @if($data->state_id==2)
                        <td class="text-success">Approved</td>
                        @endif
                        @if($data->state_id==3)
                        <td class="text-danger">Rejected</td>
                        @endif
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
                          <input name="start_date" type="text" class="form-control" id="my_date_picker1" required="required">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">End Date</label>
                        <div class="col-sm-10">
                          <input name="end_date" type="text" class="form-control" id="my_date_picker2" required="required" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Reason</label>
                        <div class="col-sm-10">
                          <textarea name="description" class="form-control" id="inputExperience" placeholder="Reason" required="required"></textarea>
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
  $(document).ready(function() { 
  $(function() { 
                    $("#my_date_picker1").datepicker({dateFormat: 'dd/mm/yy', minDate:'today'}); 
                }); 
  
                $(function() { 
                    $("#my_date_picker2").datepicker({dateFormat: 'dd/mm/yy'}); 
                }); 
  
                $('#my_date_picker1').change(function() { 
                    startDate = $(this).datepicker('getDate'); 
                    $("#my_date_picker2").datepicker("option", "minDate", startDate); 
                }) 
  
                $('#my_date_picker2').change(function() { 
                    endDate = $(this).datepicker('getDate'); 
                    $("#my_date_picker1").datepicker("option", "maxDate", endDate); 
                }) 
            }) 
</script>
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
              $("#ajax_tr").html(dataResult);
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
            url:"{{url('timeout')}}",
            type: 'POST',
            data: { timeout ,user_id,newdt},
            success: function(data){


              console.log(data);
              $("#timeOut").show();
              $("#timeIn").hide();
              var data = JSON.parse(data);
              $("#ajax_tr").html(data.html);
    $("#timeOut").html("Total Working Time: "+data.total);
    }
    });
  });
</script>
<script>
function updateUserstatus(){
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
      $.ajax({
        url:"{{url('update_user_status')}}",
        type: 'POST',
        success:function()
        {
        }
        });
  }
function getUserstatus(){
  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
    $.ajax({
        url:"{{url('get_user_status')}}",
        type: 'POST',
        success:function(get){
        console.log(get);
        $('#user_status').html(get);
}
});
}
          setInterval(function(){
            updateUserstatus();
          },3000);
          setInterval(function(){
            getUserstatus();
          },5000);
</script>
@endsection