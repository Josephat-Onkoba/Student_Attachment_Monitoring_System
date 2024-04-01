<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffStudent;

class StaffController extends Controller
{
    //

    public function viewAllocatedStudents()
{
    $userId = auth()->user()->id;

    // Query to retrieve allocated students for the authenticated staff member
    $allocatedStudents = StaffStudent::where('staff_id', $userId)
        ->with('student')
        ->get();

    return view('staff.student.assignedstudent', ['allocatedStudents' => $allocatedStudents]);
}

}
