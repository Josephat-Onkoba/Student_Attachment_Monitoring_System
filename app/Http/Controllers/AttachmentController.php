<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttachmentModel;
use Illuminate\Support\Facades\Auth;

class AttachmentController extends Controller
{
    public function info()
    {
        $user = auth()->user();
        $getRecord = AttachmentModel::where('user_id', $user->id)->get();
        return view('student.attachment.info',compact('getRecord'));
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
        $save->duration_start= trim($request->startduration);
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
        if (!empty($data['getRecord']))
        {
        return view('student.attachment.edit', $data);
        }
        else
        {
        abort (404);
        }
    }
    public function update($id,Request $request)
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
        $save->duration_start= trim($request->startduration);
        $save->duration_end = trim($request->endduration);
        $save->supervisor_fname = trim($request->firstname);
        $save->supervisor_lname = trim($request->lastname);
        $save->supervisor_phone = trim($request->supervisorcontact);
        $save->supervisor_email = trim($request->supervisoremail);

        $save->save();

        return redirect('/student/attachment/info')->with('success', 'Successfully updated your attachment details');
    }
}
