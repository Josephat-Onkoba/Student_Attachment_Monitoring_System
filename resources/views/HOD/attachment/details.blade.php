@extends('layouts.app')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Attachment Details for {{ $user->first_name }} {{ $user->last_name }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>Attachment Details:</h3>
                            @if ($attachments->isEmpty())
                                <p>No attachment details found for this user.</p>
                            @else
                                <!-- Company Information Table -->
                                <h4>Company Information:</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Company Name</th>
                                                <th>Company Type</th>
                                                <th>Location</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($attachments as $attachment)
                                                <tr>
                                                    <td>{{ $attachment->company_name }}</td>
                                                    <td>{{ $attachment->company_type }}</td>
                                                    <td>{{ $attachment->location }}</td>
                                                    <td>{{ $attachment->company_contacts }}</td>
                                                    <td>{{ $attachment->company_email }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Role/Position Information Table -->
                                <h4>Role/Position Information:</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Role/Position</th>
                                                <th>Duration Start</th>
                                                <th>Duration End</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($attachments as $attachment)
                                                <tr>
                                                    <td>{{ $attachment->role }}</td>
                                                    <td>{{ $attachment->duration_start }}</td>
                                                    <td>{{ $attachment->duration_end }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Supervisor Information Table -->
                                <h4>Supervisor Information:</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Supervisor First Name</th>
                                                <th>Supervisor Last Name</th>
                                                <th>Supervisor Phone</th>
                                                <th>Supervisor Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($attachments as $attachment)
                                                <tr>
                                                    <td>{{ $attachment->supervisor_fname }}</td>
                                                    <td>{{ $attachment->supervisor_lname }}</td>
                                                    <td>{{ $attachment->supervisor_phone }}</td>
                                                    <td>{{ $attachment->supervisor_email }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                        <div class="card-footer">
                            <a href="{{url('/HOD/unassigned-staff')}}" class="btn btn-primary">Assign Supervisor</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
