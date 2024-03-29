@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="card text-center">
        <div class="card-header">
            <h4 class="mb-0">Error</h4>
        </div>
        <div class="card-body">
            <h5 style="text-align: center; color:red;">Attachment Details Required</h5>
            <p class="card-text">Please fill out your attachment details to access your Logbook.</p>
            <a href="{{url('/student/attachment/interface')}}" class="btn btn-primary">Let's Go</a>
        </div>
        <div class="card-footer text-muted">
            Logbook
        </div>
    </div>
</div>

@endsection
