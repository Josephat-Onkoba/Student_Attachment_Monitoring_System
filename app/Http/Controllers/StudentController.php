<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffStudent;

class StudentController extends Controller
{
    //

    public function viewAllocatedSupervisor()
{
    $userId = auth()->user()->id;

    // Query to retrieve allocated supervisor for the authenticated student
    $allocatedSupervisor = StaffStudent::where('student_id', $userId)
        ->with('supervisor')
        ->first();

    return view('student.staff.allocatedsupervisor', ['allocatedSupervisor' => $allocatedSupervisor]);
}

}
