<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="container">
  <div class="col-md-4">
    <h2>Add Student Data</h2>
    <form action="{{'form'}}" method="Post" enctype="multipart/form-data">
    	@csrf
      <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" type="text" id="name" name="name" placeholder="Enter Your Name">
        <span style="color: red">@if($errors->has('name'))
        <div class="error">{{ $errors->first('name') }}</div>
        @endif </span>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" type="email" id="email" name="email" placeholder="Enter Your Email">
        <span style="color: red">@if($errors->has('email'))
        <div class="error">{{ $errors->first('email') }}</div>
        @endif </span>
      </div>
      <div class="form-group">
        <label for="number">Mobile no.:</label>
        <input class="form-control" type="text" id="number" name="mobile_no" placeholder="Enter Your Mobile no.">
        <span style="color: red">@if($errors->has('mobile_no'))
        <div class="error">{{ $errors->first('mobile_no') }}</div>
        @endif </span>
      </div>
      <div class="form-group">
        <label for="department">Department:</label>
        <input class="form-control" type="department" id="department" name="department" placeholder="Enter Your Department">
        <span style="color: red">@if($errors->has('department'))
        <div class="error">{{ $errors->first('department') }}</div>
        @endif </span>
      </div>
      <div class="form-group">
        <label for="image">Image:</label>
        <input class="form-control" type="file" id="image" name="image" placeholder="image">
        <span style="color: red">@if($errors->has('image'))
        <div class="error">{{ $errors->first('image') }}</div>
        @endif </span>
      </div>
      <div class="form-group">
        <label for="branch">Branch:</label>
        <input class="form-control" type="branch" id="branch" name="branch" placeholder="Enter Your Branch">
        <span style="color: red">@if($errors->has('branch'))
        <div class="error">{{ $errors->first('branch') }}</div>
        @endif </span>
      </div>
      <div class="form-group">
        <label for="branch">URL:</label>
        <input class="form-control" type="text" id="url" name="url" placeholder="url">
        <span style="color: red">@if($errors->has('url'))
        <div class="error">{{ $errors->first('url') }}</div>
        @endif </span>
      </div>
      <input type="submit" name="submit" value="Submit" class=" btn btn-lg btn-primary">
      <a href="{{url('/student-data')}}" class=" btn btn-lg btn-primary">Student data here</a>
    </form>
</div>
</body>
</html>
