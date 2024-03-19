<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Attachment Monitoring System</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css')}}">
  
  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
  
  <script>
    $(document).ready(function() {
      // Automatically remove error messages after 5 seconds
      setTimeout(function() {
        $('.alert').fadeOut('slow');
      }, 5000);
    });
  </script>
</head>

<body class="hold-transition login-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="#"><b>Sign up Below</b></a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        @include('_messages')
        <form action="{{ url('/register') }}" method="post">
          {{ csrf_field() }}
          <div class="input-group mb-3">
            <input type="text" class="form-control" required placeholder="First name" name="first_name" value="{{old('first_name')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('first_name'))
              <div class="alert alert-danger">{{ $errors->first('first_name') }}</div>
          @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" required placeholder="Last name" name="last_name" value="{{old('last_name')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('last_name'))
              <div class="alert alert-danger">{{ $errors->first('last_name') }}</div>
          @endif
          <div class="input-group mb-3">
            <input type="email" class="form-control" required placeholder="Email" name="email" value="{{old('email')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>         
          </div>
          @if ($errors->has('email'))
              <div class="alert alert-danger">{{ $errors->first('email') }}</div>
          @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" required placeholder="Registration Number" name="reg_no" value="{{old('reg_no')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-card"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('reg_no'))
              <div class="alert alert-danger">{{ $errors->first('reg_no') }}</div>
          @endif
          <div class="input-group mb-3">
            <input type="password" class="form-control" required placeholder="Password" name="password" value="{{old('password')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('password'))
              <div class="alert alert-danger">{{ $errors->first('password') }}</div>
          @endif
          <div class="input-group mb-3">
            <input type="password" class="form-control" required placeholder="Retype password" name="password_confirmation" value="{{old('password_confirmation')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('password_confirmation'))
              <div class="alert alert-danger">{{ $errors->first('password_confirmation') }}</div>
          @endif
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                <label for="agreeTerms">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <a href="{{('/login')}}" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>

  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>
