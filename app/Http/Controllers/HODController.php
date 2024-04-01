<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HODController extends Controller
{
    //
    public function list()
    {
        $users = User::userType4()->paginate(5);
        return view('HOD.student.list', ['users' => $users]);
    }

    public function create()
    {
        return view('HOD.staff.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'staff_no' => 'required|string|unique:users,staff_no',
            'password' => 'required|string|min:8',
        ]);

        $save = new User;
        $save->first_name = trim($validatedData['first_name']);
        $save->last_name = trim($validatedData['last_name']);
        $save->name = $save->first_name . ' ' . $save->last_name;
        $save->email = trim($validatedData['email']);
        $save->staff_no = trim($validatedData['staff_no']); // Assuming staff_no is equivalent to reg_no
        $save->password = Hash::make($validatedData['password']);
        $save->user_type = 3; // Set the user_type to 3 for staff members
        $save->remember_token = Str::random(40);
        $save->save();

        return redirect()->route('staff-members.list')->with('success', 'Staff member added successfully.');
    }
    public function view()
    {
        return view('HOD.staff.view');
    }

    public function stafflist()
    {
        // Retrieve staff members with user type 3
        $staffMembers = User::where('user_type', 3)->paginate(5);

        // Pass the retrieved staff members to the view
        return view('HOD.staff.list', ['staffMembers' => $staffMembers]);
    }
}
