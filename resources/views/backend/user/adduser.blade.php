@extends('backend.layout.app')
@section('content')
<br><br><br>


@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<form id="contact-form" enctype="multipart/form-data" role="form" method="post" action="">
  @csrf
  <div class="controls">
      <div class="row">
          <div class="col-md-4">
              <div class="form-group"> <label for="form_name">Name *</label> <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required."> </div>
              <span style="color:rgb(190, 7, 7)">@if($errors->has('name'))<div class="error">{{$errors->first('name')}}</div>@endif</span>
            </div>
          <div class="col-md-4">
              <div class="form-group"> <label for="form_lastname">Email *</label> <input id="form_lastname" type="email" name="email" class="form-control" placeholder="Please enter email *" required="required" data-error="Lastname is required."> </div>
          </div>
          <div class="col-md-4">
            <div class="form-group"> <label for="form_lastname">Date of Birth *</label> <input id="form_lastname" type="date" name="dob" class="form-control" placeholder="Please enter Date of Birth*" required="required" data-error="Lastname is required."> </div>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-4">
            <div class="form-group"> <label for="form_pwd">Password *</label> <input id="form_pwd" type="password" name="pwd" class="form-control" placeholder="Please enter Password *" required="required" data-error="Valid email is required."> </div>
        </div>
        <div class="col-md-4">
          <div class="form-group"> <label for="form_lastname">Department *</label> <input id="form_lastname" type="text" name="department" class="form-control" placeholder="Please enter Department *" required="required" data-error="Lastname is required."> </div>
      </div>
      <div class="col-md-4">
        <div class="form-group"> <label for="form_lastname">Profile Image</label> 
          <input id="imgInp" type="file" onchange="previewFile(this)" name="pro_img" class="form-control" required="required" data-error="Lastname is required."> 
          <img id="blah" alt="image" style="max-width:100px; margin-top:20px; "/>
        </div>
    </div>
    </div>
      
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group"> <label for="form_need">Please specify your need *</label> <select id="form_need" name="role_id" class="form-control" required="required" data-error="Please specify your need.">
                  <option value="" selected disabled>--Select Your Issue--</option>
                  <option>admin</option>
                  <option>tl</option>
                  <option>user</option>
                  <option>manager</option>
              </select> 
            </div>
      </div></br>
    </br></br>
      <div class="col-md-4"> <input type="submit" class="btn btn-success btn-send btn-block pt-2 " value="Add user"> </div>
          
      </div>
  </div>
</form>


<button id="timeIn">hello</button>
<br><br><br>
@include('backend.layout.jsfiles') 
<script>
  $("#timeIn").on("click",function(){
    
    alert({{csrf_token()}})
    
    });
  
</script>
<script>
  function readURL(input) {
 if (input.files && input.files[0]) {
   var reader = new FileReader();
   
   reader.onload = function(e) {
     $('#blah').attr('src', e.target.result);
   }
   
   reader.readAsDataURL(input.files[0]); // convert to base64 string
 }
}

$("#imgInp").change(function() {
 readURL(this);
});
</script>

@endsection


