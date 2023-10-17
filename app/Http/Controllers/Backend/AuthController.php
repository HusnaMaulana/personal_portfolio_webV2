<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;

use App\Models\User;
use Auth;
use Session;
use Mail;
use App\Mail\ForgotPasswordMail;

class AuthController extends Controller
{
    public function login(Request $request) 
    {
        // $password = "123456789";
        // $dd = Hash::make($password);
        // dd($dd);
        return view('backend.auth.login');
    }
    public function forgot(Request $request) 
    {
        return view('backend.auth.forgot');
    }
    public function forgot_admin(Request $request)
    {
        $rendome_password = rand(111111111, 999999999);
        $user = User::where('email', '=', $request->email)->first();
        if (!empty($user)) {
            $user->password = Hash::make($rendome_password);
            $user->save();

            $user->password_rendome = $rendome_password;

            Mail::to($user->email())->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Password Successfull Send to Your Email Box. Please Check Email Box');
        } else {
            return redirect()->back()->with('error', 'Email ID Not Found!');
        }
    }
    public function login_admin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (!empty(Auth::user()->status)) {
                if (Auth::user()->is_role == '1') {
                    return redirect()->intended('admin/dashboard');
                } else {
                    return redirect('login')->with('error', 'Not Admin!');
                }
            } else {
                $user_id = Auth::user()->id;
                Auth::logout();
                $user = User::find($user_id);
                return redirect('login')->with('sucess', 'This email is not verified yet!');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter the correct credentials');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect(url('login'));
    }
}
