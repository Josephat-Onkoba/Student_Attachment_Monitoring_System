@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Unassigned Staff</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        @include('_messages')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if ($unassignedStaff->isEmpty())
                    <p>No unassigned staff found.</p>
                    @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Staff No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Action</th> <!-- New column for action -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($unassignedStaff as $staff)
                                <tr>
                                    <td>{{ $staff->email }}</td>
                                    <td>{{ $staff->staff_no }}</td>
                                    <td>{{ $staff->first_name }}</td>
                                    <td>{{ $staff->last_name }}</td>
                                    <td>
                                        <!-- Button to assign supervisor -->
                                        <form action="{{ route('assign.supervisor.form', ['staffId' => $staff->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            <select name="student_id" id="student_id">
                                                @foreach ($unassignedStudents as $student)
                                                    @if ($student->attachment) <!-- Check if student has submitted attachment -->
                                                        @if (!$staff->maxStudentsReached && !$staff->supervisedStudents->contains('id', $student->id))
                                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($staff->maxStudentsReached)
                                                <span class="text-danger">Maximum number of students reached for this staff member.</span>
                                            @elseif ($staff->supervisedStudents->contains('id', $student->id))
                                                <span class="text-danger">This student is already assigned to a supervisor.</span>
                                            @else
                                                <button type="submit" class="btn btn-primary">Assign Supervisor</button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
