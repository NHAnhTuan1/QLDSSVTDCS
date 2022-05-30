<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //======================== Sinh viên ===========================
    public function getLoginSV()
    {
        return view('auth.login');
    }

    public function postLoginSV(Request $request)
    {


        $request->validate(
            [
                'email'=>'required',
                'password'=>'required'
            ],
            [
                'email.required'=>'Bạn chưa nhập email.',
                'password.required'=>'Bạn chưa nhập mật khẩu.'
            ]
        );

        //---xử lí login như sau
        $email = $request->input('email');
        $password = $request->input('password');
        
        if (Auth::guard('sinhvien')->attempt(['sv_email' => $email, 'password' => $password,])) {

            return redirect()->route('home')->with('success', 'Đăng nhập thành công');
        }

        else{
            return back()->with('err', 'Email hoặc Mật khẩu không đúng. Vui lòng kiểm tra lại!');
        }
    }

    public function getLogoutSV()
    {
        Auth::guard('sinhvien')->logout();
        return redirect()->route('home');
    }

    //============================= CTSV =========================

    public function getLoginCTSV()
    {
        # code...
        return view('ctsv.login');
    }

    public function postLoginCTSV(Request $request)
    {


        $request->validate(
            [
                'email'=>'required',
                'password'=>'required'
            ],
            [
                'email.required'=>'Bạn chưa nhập email.',
                'password.required'=>'Bạn chưa nhập mật khẩu.'
            ]
        );

        //---xử lí login như sau
        $email = $request->input('email');
        $password = $request->input('password');
        
        if (Auth::guard('ctsv')->attempt(['ctsv_email' => $email, 'password' => $password,])) {

            return redirect()->route('ctsv.dashboard'); 
        }

        else{
            return back()->with('err', 'Email hoặc Mật khẩu không đúng. Vui lòng kiểm tra lại!');
        }
    }

    #logout
    public function getLogoutCTSV()
    {
        Auth::guard('ctsv')->logout();
        return redirect()->route('home');
    }
}
