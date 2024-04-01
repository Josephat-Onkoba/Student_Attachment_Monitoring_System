@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header - (Page-header)--->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Staff Member</h1>
                </div>
            </div>
        </div><!--/.container-fluid--->
    </section>
    <!---Main-content .-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!--left-column--->
                <div class="col-md-12">
                    <div class="card card-primary">
                        @include('_messages')
                        <form method="post" action="{{ route('staff-members.store') }}">
                            {{@csrf_field()}}
                            <div class="card-body">
                                <h3>Staff Member Information</h3>
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                </div>
                                @if ($errors->has('first_name'))
                                <div class="alert alert-danger">{{ $errors->first('first_name') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                                </div>
                                @if ($errors->has('last_name'))
                                <div class="alert alert-danger">{{ $errors->first('last_name') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="staff_no">Staff Number</label>
                                    <input type="text" class="form-control" id="staff_no" name="staff_no" value="{{ old('staff_no') }}" required>
                                </div>
                                @if ($errors->has('staff_no'))
                                <div class="alert alert-danger">{{ $errors->first('staff_no') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Staff Member</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/.col (left) -->
            </div>
            <!--/.row -->
        </div><!--/.container-fluid -->
    </section>
    <!--/.content -->
</div>
<script>
    $(document).ready(function() {
      // Automatically remove error messages after 5 seconds
      setTimeout(function() {
        $('.alert').fadeOut('slow');
      }, 5000);
    });
  </script>
@endsection