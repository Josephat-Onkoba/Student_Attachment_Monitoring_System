<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use App\Rules\ZetechEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
Use App\Mail\RegisterMail;



class AuthController extends Controller
{
    public function register()
    {

      return view('auth.register');
    }

    public function create_user(Request $request)
    {
        request()->validate([
            'first_name'=> 'required|string|max:255',
            'last_name'=> 'required|string|max:255',
            'email' => ['required','email','string','max:255','unique:users', new ZetechEmail],
            'reg_no' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $save = new User;
        $save->first_name = trim($request->first_name);
        $save->last_name = trim($request->last_name);
        $name = $save->first_name . ' ' . $save->last_name;
        $save->name = $name;
        $save->email = trim($request->email);
        $save->reg_no = trim($request->reg_no);
        $save->password = Hash::make($request->password);
        $save->user_type = 4; // Set the default user_type to be 4
        $save->remember_token = Str::random(40);
        $save->save();
        
        Mail::to($save->email)->send(new RegisterMail($save));

        return redirect('/register/emailverification');
    }

    public function emailverify()
    {
        return view('emails.emailverify');
    }

    public function verify($token)
    {
        $user = User::where('remember_token','=', $token)->first();
        if(!empty($user))
        {
            $user->email_verified_at = now();
            $user->remember_token = Str::random(40);
            $user->save();
            return redirect('login')->with('success', "Your account has been successfully verified");

        }
        else
        {
            abort(404);
        }
    }



    public function login()
    {
        //dd(Hash::make(123456));
        if (!empty(Auth::check())) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            } else if (Auth::user()->user_type == 2) {
                return redirect('HOD/dashboard');
            } else if (Auth::user()->user_type == 3) {
                return redirect('staff/dashboard');
            } else if (Auth::user()->user_type == 4) {
                return redirect('student/dashboard');
            }
        }
        return view('auth.login');
    }

    public function Authlogin(Request $request)
    {

        $remember = !empty($request->remember) ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            } else if (Auth::user()->user_type == 2) {
                return redirect('HOD/dashboard');
            } else if (Auth::user()->user_type == 3) {
                return redirect('staff/dashboard');
            } else if (Auth::user()->user_type == 4) {
                return redirect('student/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter currect email and password');
        }
    }


    public function forgotpassword()
    {
        return view('auth.forgot');
    }

    public function PostForgotPassword(Request $request)
    {
        $user = User::getEmailSingle($request->email);
        if (!empty($user)) {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', 'Please check your email and reset your password');
        } else {
            return redirect()->back()->with('error', 'Email not found in the system');
        }
    }

    public function reset($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if (!empty($user)) {
            $data['user'] = $user;
            return view('auth.reset', $data);
        } else {
            abort(404);
        }
    }

    public function Postreset($remember_token, Request $request)
    {
        $user = User::getTokenSingle($remember_token);

        if (!$user) {
            abort(404); // User with the provided token not found
        }

        if ($request->password == $request->cpassword) {
            // Update the user's password
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect(url('login'))->with('success', 'Password successfully updated');
        } else {
            return redirect()->back()->with('error', 'Password and Confirm Password do not match');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect(url('login'));
    }
}
