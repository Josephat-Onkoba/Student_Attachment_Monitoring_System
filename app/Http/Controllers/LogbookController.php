<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttachmentModel;

class LogbookController extends Controller
{
    //
    public function __construct()
    {
        // Apply the 'auth' middleware to all methods in this controller
        $this->middleware('auth');
    }

    public function logbook()
    {
        $user = auth()->user();
         // Check if the user has filled out the attachment details
         $attachment = AttachmentModel::where('user_id', $user->id)->first();
         if ($attachment) {
            // If attachment details are filled out, allow access to the logbook view
            return view('student.logbook.logbook');
        } else {
            // If attachment details are not filled out, redirect the user to fill out the attachment details
            return redirect('/student/logbook/download/error')->with('status', 'Please fill out the attachment details.');
        }
    }
    public function logbookerror()
    {
        return view('student.logbook.error');
    }
}
