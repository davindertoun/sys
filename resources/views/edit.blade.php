<!DOCTYPE html>
<html>
<head>
	<title></title>
	<head>
	  <title></title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
</head>
<body class="container">
  <div class="col-md-4">
    <h2>Update Student Details</h2>
    <form action="/edit" method="Post">
    	@csrf
    	<input type="hidden" name="id" value="{{$data->id}}">
      <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" type="text" id="name" name="name" value={{$data->name}}>
        <span style="color: red">@if($errors->has('name'))
        <div class="error">{{ $errors->first('name') }}</div>
        @endif </span>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" type="email" id="email" name="email" value={{$data->email}}>
        <span style="color: red">@if($errors->has('email'))
        <div class="error">{{ $errors->first('email') }}</div>
        @endif </span>
      </div>
      <div class="form-group">
        <label for="number">Mobile no.:</label>
        <input class="form-control" type="text" id="number" name="mobile_no" value={{$data->mobile_no}}>
        <span style="color: red">@if($errors->has('mobile_no'))
        <div class="error">{{ $errors->first('mobile_no') }}</div>
        @endif </span>
      </div>
      <div class="form-group">
        <label for="department">Department:</label>
        <input class="form-control" type="department" id="department" name="department" value={{$data->department}}>
        <span style="color: red">@if($errors->has('department'))
        <div class="error">{{ $errors->first('department') }}</div>
        @endif </span>
      </div>
      <div class="form-group">
        <label for="branch">Branch:</label>
        <input class="form-control" type="branch" id="branch" name="branch" value={{$data->branch}}>
        <span style="color: red">@if($errors->has('branch'))
        <div class="error">{{ $errors->first('branch') }}</div>
        @endif </span>
      </div>
      <div class="form-group">
        <label for="branch">URL:</label>
        <input class="form-control" type="text" id="url" name="url" placeholder="url" value={{$data->url}}>
        <span style="color: red">@if($errors->has('url'))
        <div class="error">{{ $errors->first('url') }}</div>
        @endif </span>
      </div>
      <button type="submit" name="submit" value="submit" class="btn btn-lg btn-primary">Update</button>  
    </form>
</div>
</body>
</html>