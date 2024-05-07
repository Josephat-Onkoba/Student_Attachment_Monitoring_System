@extends('layouts.app')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Staff List</h1>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary">
            <a href="{{ url('/HOD/staff-members/create') }}" style="color: white; text-decoration: none;">
                <i class="fas fa-plus-circle"> Add staff</i>
            </a>
        </button>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    @include('_messages')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Staff Information</b></h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-4">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Staff Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($staffMembers as $staff)
                                        <tr>
                                            <td>{{ $staff->first_name }}</td>
                                            <td>{{ $staff->last_name }}</td>
                                            <td>{{ $staff->email }}</td>
                                            <td>{{ $staff->staff_no }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <div class="float-left">
                                <p class="text-muted">
                                    Showing {{ $staffMembers->firstItem() }} to {{ $staffMembers->lastItem() }} of {{ $staffMembers->total() }} entries
                                </p>
                            </div>
                            <div class="float-right">
                                {{ $staffMembers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
