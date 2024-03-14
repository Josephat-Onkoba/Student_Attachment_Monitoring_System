<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function login()
    {
        //dd(Hash::make(123456));
        if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type == 2)
            {
                return redirect('HOD/dashboard');
            }
            else if(Auth::user()->user_type == 3)
            {
                return redirect('staff/dashboard');
            }
            else if(Auth::user()->user_type == 4)
            {
                return redirect('student/dashboard');
            }
        }
        return view('auth.login');
    }

    public function Authlogin(Request $request)
   {
        
        $remember =!empty($request->remember) ? true : false;

        if (Auth:: attempt (['email' => $request->email, 'password' => $request->password], $remember))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type == 2)
            {
                return redirect('HOD/dashboard');
            }
            else if(Auth::user()->user_type == 3)
            {
                return redirect('staff/dashboard');
            }
            else if(Auth::user()->user_type == 4)
            {
                return redirect('student/dashboard');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Please enter currect email and password');
        }
   }

    public function logout()
    {
        Auth::logout();
        return redirect(url('login'));
    }

}
