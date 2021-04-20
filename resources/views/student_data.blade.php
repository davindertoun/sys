<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Student Data</h2>
  <p>Student Data details</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="text-center">S No.</th>
        <th class="text-center">Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Phone number</th>
        <th class="text-center">Department</th>
        <th class="text-center">Branch</th>
        <th class="text-center">URL</th>
        <th class="text-center">Action</th>
        <th class="text-center">Image</th>
      </tr>
    </thead>
    <tbody>
      @php ($count=0)
      @foreach($result as $data)
      @php($count++)
      <tr>
        <td>{{$count}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->email}}</td>
        <td>{{$data->mobile_no}}</td>
        <td>{{$data->department}}</td>
        <td>{{$data->branch}}</td>
        <td>{{$data->url}}</td>
        <td class="text-center">
          <a href="{{'delete/'.encrypt($data->id)}}" class=" btn btn-sm btn-danger">Delete</a>&nbsp;&nbsp;
          <a href="{{'edit/'.encrypt($data->id)}}" class=" btn btn-sm btn-primary">Edit</a>&nbsp;&nbsp;
          <a href="{{'view/'.encrypt($data->id)}}" class="btn btn-sm btn-primary">View</a>
        </td>
        <td>{{asset($data->image)}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a href="save" class="btn btn-sm btn-danger"> Add User</a>
</div>
</body>
</html>