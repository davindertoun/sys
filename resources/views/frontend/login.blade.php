<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layout.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      @if($errors->any())
      <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </div>
      @endif
      <form action="{{'login'}}" method="post">
      @csrf 
        <div class="input-group mb-3"><br>
          <input type="email" class="form-control" name="email" placeholder="Email" value="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" value="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" value="login" class="btn btn-primary btn-block">login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <!-- <p class="mb-1">
        <a href="{{url('register')}}">Register New Employee</a>
      </p> -->     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</body>
</html>