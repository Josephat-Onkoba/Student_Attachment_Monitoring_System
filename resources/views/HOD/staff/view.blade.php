@extends('layouts.app')

@section('content')

@include('_messages')
<div class="content-wrapper" style="margin-top: 50px; background-color:white;">
@include('_messages')
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add new staff</h5>
                    <p class="card-text">Adding a new supervisor into the system</p>
                    <a href="{{url('/HOD/staff-members/create')}}" class="btn btn-primary">Add</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">A list of staff</h5>
                    <p class="card-text">View a list of staff or supervisors available</p>
                    <a href="{{url('/HOD/staff/list')}}" class="btn btn-primary">view</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">View Staff Allocation</h5>
                    <p class="card-text">Check staff and know staff who have been allocated students to supervise</p>
                    <a href="{{url('/HOD/attachment/supervisor/allocation')}}" class="btn btn-primary">Check</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Supervisor Reports and Evaluations</h5>
                    <p class="card-text">Supervisor write reports about how the supervision is progressing so far.</p>
                    <a href="#" class="btn btn-primary">Reports</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection