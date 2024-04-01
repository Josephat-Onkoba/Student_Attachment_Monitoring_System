@extends('layouts.app')
@section('title', 'HOD-dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Dashboard</h1>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h5>Students</h5>

              <p>Manage and view <br>Students</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-graduation-cap"></i>
            </div>
            <a href="{{url('/HOD/student/list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h5>Staff</h5>

              <p>Manage and View <br>Staff</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-user-tie"></i>
            </div>
            <a href="{{url('/HOD/staff/view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h5>Attachments</h5>

              <p>Student Attachment<br>details </p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-briefcase"></i>
            </div>
            <a href="{{url('/HOD/attachment/list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h5>Reports</h5>

              <p>Feedback and reports<br> from Supervisors</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-chart-bar"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection