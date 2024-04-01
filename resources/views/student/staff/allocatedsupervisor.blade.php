@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Allocated Supervisor</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Supervisor Name</th>
                                    <th>Staff Number</th>
                                    <th>Email</th>
                                    <th>Allocation Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $allocatedSupervisor->supervisor->name }}</td>
                                    <td>{{ $allocatedSupervisor->supervisor->staff_no }}</td>
                                    <td>{{ $allocatedSupervisor->supervisor->email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($allocatedSupervisor->allocation_date)->toDateString() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
