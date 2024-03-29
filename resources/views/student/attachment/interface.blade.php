@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="row mt-5">
        <div class="col-sm-6 mb-4 mb-sm-0">
            <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title"><h3><b>Add Your Attachment Details</b></h3></h5>
                <p class="card-text">Add details about your attachment here</p>
                @php
                    // Get the currently authenticated user
                    $user = auth()->user();
                    
                    // Check if the user already has a record
                    $existingRecord = \App\Models\AttachmentModel::where('user_id', $user->id)->first();
                @endphp

                @if ($existingRecord)
                    <p ><h4><b style="color: red;">You already have a record.</b></h4></p>
                @else
                    <a href="{{ url('/student/attachment/add')}}" class="btn btn-primary">Add</a>
                @endif
            </div>

            </div>
        </div>
        <div class="col-sm-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title"><h3><b>View Your Attachment</b></h3></h5>
                    <p class="card-text">View your added attachment details <br> Edit and update</p>
                    <a href="{{ url('/student/attachment/info')}}" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection