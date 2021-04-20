@extends('backend.layout.app')

@section('content')
    <h2>Manage Users</h2> <a href="{{url('/admin/add-user')}}"class="btn btn-outline-primary">Add User</a>
</br>
</br>

  

<table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">DOB</th>
            <th scope="col">Department</th>
            <th scope="col">Created at</th>
            <th scope="col">Profile Image</th>
            <th scope="col">Role </th>
            <th scope="col"> </th>
            <th scope="col">Action</th>
           
          </tr>
        </thead>
        <tbody>
          @php
            ($count=1)
          @endphp
       @foreach ($result as $data )
         
       
          <tr>
            <td scope="col">{{$count++}}</td>
            <td scope="col">{{$data->name}}</td>
            <td scope="col">{{$data->email}} </td>
            <td scope="col">{{$data->dob}} </td>
            <td scope="col">{{$data->department}} </td>
            <td scope="col">{{$data->created_at->diffForHumans()}} </td>
            <td scope="col">
              <img src="{{asset('css/'.$data->profile_img)}}" class="img-thumbnail "  width="100" height="100"/>
             </td>
            <td scope="col">{{$data->role_id}}<td>
            <td scope="col">
              <a href="{{'user-profile/'.encrypt($data->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp &nbsp
              <a href="{{'delete/'.encrypt($data->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp &nbsp
              <a href="{{'edit-user/'.encrypt($data->id)}}"><i class="fa fa-pencil-square-o " aria-hidden="true"></i></a>
            </td>
          </tr>
          @endforeach
        
        </tbody>
      </table>
      
@endsection