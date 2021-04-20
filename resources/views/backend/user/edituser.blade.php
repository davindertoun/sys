@extends('backend.layout.app')

@section('content')

<div class="col-md-4">
    <h2>Update Info</h2>
    
    <form action="{{url('admin/edit-user')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" class="form-control" placeholder="Enter name" name="id" value={{$data->id}}>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter name" name="name" value={{$data->name}}>
            <span style="color:rgb(190, 7, 7)">@if($errors->has('name'))<div class="error">{{$errors->first('name')}}</div>@endif</span>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control"  placeholder="Enter Email" name="email"value={{$data->email}}>
            <span style="color:rgb(190, 7, 7)">@if($errors->has('email'))<div class="error">{{$errors->first('email')}}</div>@endif</span>
        </div>
        <div class="form-group">
            <label for="mobile">Department</label>
            <input type="text" class="form-control"  placeholder="Enter Department" name="mobile" value={{$data->department}}>
            <span style="color:rgb(190, 7, 7)">@if($errors->has('mobile'))<div class="error">{{$errors->first('mobile')}}</div>@endif</span>
        </div>
        <div class="form-group">
            <label for="department">DOB:</label>
            <input type="date" class="form-control"  placeholder="Enter DOB" name="department" value={{$data->dob}}>
            <span style="color:rgb(190, 7, 7)">@if($errors->has('department'))<div class="error">{{$errors->first('department')}}</div>@endif</span>
        </div>
        <div class="col-md-4">
            <div class="form-group"> <label for="form_lastname">Profile Image</label> 
              <input id="imgInp" type="file" onchange="previewFile(this)" name="pro_img" value={{$data->dob}} class="form-control" required="required" data-error="Lastname is required."> 
              <img id="blah" alt="image" style="max-width:100px; margin-top:20px; "/>
              <img src="{{asset('css/'.$data->profile_img)}}" class="img-thumbnail img-fluid" />
            </div>
        </div>
       <button type="submit" name="submit" value="Submit" class="btn btn-primary">update</button>
    </form>
</br>
    
    </div>
</div>
@endsection