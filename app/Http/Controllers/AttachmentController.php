<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttachmentModel;
use App\Models\StaffStudent;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AttachmentController extends Controller
{
    public function info()
    {
        $user = auth()->user();
        $getRecord = AttachmentModel::where('user_id', $user->id)->get();
        return view('student.attachment.info', compact('getRecord'));
    }

    public function interface()
    {
        return view('student.attachment.interface');
    }

    public function add()
    {
        // Get the currently authenticated user
        $user = auth()->user();

        // Check if the user already has a record
        $existingRecord = AttachmentModel::where('user_id', $user->id)->first();

        // If the user already has a record, inform them and redirect
        if ($existingRecord) {
            return redirect('/student/attachment/info')->with('status', 'You already have a record.');
        }

        // If the user doesn't have a record, allow them to add one
        return view('student.attachment.add');
    }
    public function insert(Request $request)
    {

        $user = Auth::user();
        $save = new AttachmentModel;
        $save->user_id = $user->id;
        $save->company_name = trim($request->companyname);
        $save->company_type = trim($request->companytype);
        $save->location = trim($request->companylocation);
        $save->company_contacts = trim($request->companycontact);
        $save->company_email = trim($request->companyemail);
        $save->role = trim($request->attachmentrole);
        $save->duration_start = trim($request->startduration);
        $save->duration_end = trim($request->endduration);
        $save->supervisor_fname = trim($request->firstname);
        $save->supervisor_lname = trim($request->lastname);
        $save->supervisor_phone = trim($request->supervisorcontact);
        $save->supervisor_email = trim($request->supervisoremail);

        $save->save();

        return redirect('/student/attachment/info')->with('success', 'Successfully added attachment details');
    }

    public function edit($id)
    {
        $data['getRecord'] = AttachmentModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            return view('student.attachment.edit', $data);
        } else {
            abort(404);
        }
    }
    public function update($id, Request $request)
    {
        $user = Auth::user();
        $save = AttachmentModel::getSingle($id);
        $save->user_id = $user->id;
        $save->company_name = trim($request->companyname);
        $save->company_type = trim($request->companytype);
        $save->location = trim($request->companylocation);
        $save->company_contacts = trim($request->companycontact);
        $save->company_email = trim($request->companyemail);
        $save->role = trim($request->attachmentrole);
        $save->duration_start = trim($request->startduration);
        $save->duration_end = trim($request->endduration);
        $save->supervisor_fname = trim($request->firstname);
        $save->supervisor_lname = trim($request->lastname);
        $save->supervisor_phone = trim($request->supervisorcontact);
        $save->supervisor_email = trim($request->supervisoremail);

        $save->save();

        return redirect('/student/attachment/info')->with('success', 'Successfully updated your attachment details');
    }

    public function attachmentlist()
    {
        $users = User::whereHas('attachments')->paginate(10); // Retrieve users with attachments
        return view('HOD.attachment.list', compact('users'));
    }

    public function viewattachmentdetails($userId)
    {
        $user = User::findOrFail($userId);
        $attachments = $user->attachments;
        return view('HOD.attachment.details', compact('user', 'attachments'));
    }

    //assign supervisor
    // In your controller method
    // In your controller method
    public function showUnassignedStaff()
    {
        // Get staff who have not been assigned any students for supervision
        $unassignedStaff = User::whereDoesntHave('supervisedStudents')->where('user_type', 3)->get();
        $unassignedStudents = User::whereDoesntHave('supervisingStaff')->where('user_type', 4)->get();

        // Calculate maxStudentsReached for each staff member
        $staffsWithMaxStudents = collect();
        foreach ($unassignedStaff as $staff) {
            $staffId = $staff->id;
            $studentCount = DB::table('staff_student')
                ->where('staff_id', $staffId)
                ->count();
            $maxStudentsReached = $studentCount >= 5;
            $staff->maxStudentsReached = $maxStudentsReached;
            if ($maxStudentsReached) {
                $staffsWithMaxStudents->push($staff);
            }
        }

        // Pass the unassigned staff and other necessary data to the view
        return view('HOD.attachment.assign', [
            'unassignedStaff' => $unassignedStaff,
            'unassignedStudents' => $unassignedStudents,
            'staffsWithMaxStudents' => $staffsWithMaxStudents,
        ]);
    }





    public function assignSupervisor(Request $request, $staffId)
    {
        // Retrieve the supervisor and student IDs from the request
        $supervisorId = $staffId;
        $studentId = $request->input('student_id');

        // Find the supervisor and student
        $supervisor = User::findOrFail($supervisorId);
        $student = User::findOrFail($studentId);

        // Check if the supervisor has reached the maximum number of students
        if ($supervisor->supervisingStaff()->count() > 5) {
            return redirect()->back()->with('error', 'Supervisor cannot take more students.');
        }

        // Check if the student already has a supervisor
        if ($student->supervisingStaff()->exists()) {
            return redirect()->back()->with('error', 'Student already has a supervisor.');
        }

        // Assign the supervisor to the student
        $student->supervisingStaff()->attach($supervisorId);
        $student->save();

        return redirect()->back()->with('success', 'Supervisor assigned successfully.');
    }


    public function supervisorallocation()
    {
        // Retrieve data from the staff_student table
        $allocations = StaffStudent::with(['student', 'supervisor'])->get();

        // Pass the data to the view
        return view('HOD.attachment.allocation', ['allocations' => $allocations]);
    }
}
