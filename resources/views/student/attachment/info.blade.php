@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Attachment Information</h1>
                </div>
                @foreach($getRecord as $value)
                <div class="col-sm-6 text-sm-right">
                    <a href="{{ url('/student/attachment/edit/' . $value->id) }}" class="btn btn-primary">Edit attachment Information</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('_messages')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Company Information</b></h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-4">
                                    <thead>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Company Type</th>
                                            <th>Company Location</th>
                                            <th>Company Contact</th>
                                            <th>Company Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->company_name }}</td>
                                            <td>{{ $value->company_type }}</td>
                                            <td>{{ $value->location }}</td>
                                            <td>{{ $value->company_contacts }}</td>
                                            <td>{{ $value->company_email }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Attachment Info -->
                        <div class="card-body p-0">
                        <h3 class="card-title ml-3"><b>Attachment Information</b></h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mt-4 mb-4">
                                    <thead>
                                        <tr>
                                            <th>Role/Position</th>
                                            <th>Duration Start</th>
                                            <th>Duration End</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->role }}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->duration_start)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->duration_end)) }}</td>
                                            <td>
                                                @if($value->status == 0)
                                                active
                                                @else
                                                inactive
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Company Supervisor -->
                        <div class="card-body p-0">
                            <h3 class="card-title ml-3"><b>Company Supervisor Information</b></h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mt-4 mb-4">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->supervisor_fname}}</td>
                                            <td>{{ $value->supervisor_lname}}</td>
                                            <td>{{ $value->supervisor_phone}}</td>
                                            <td>{{ $value->supervisor_email}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
