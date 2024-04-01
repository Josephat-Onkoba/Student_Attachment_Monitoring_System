@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Allocation Overview</h1>
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
                                    <th>Staff Name</th>
                                    <th>Staff Number</th>
                                    <th>Student Name</th>
                                    <th>Registration Number</th>
                                    <th>Allocation Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allocations as $allocation)
                                <tr>
                                    <td>{{ $allocation->supervisor->name }}</td>
                                    <td>{{ $allocation->supervisor->staff_no }}</td>
                                    <td>{{ $allocation->student->name }}</td>
                                    <td>{{ $allocation->student->reg_no }}</td>
                                    <td>{{ \Carbon\Carbon::parse($allocation->allocation_date)->toDateString() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
