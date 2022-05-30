<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function getLogin()
    {
        return view('admin::auth.login');
    }

    public function postLogin(Request $request)
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
        
        if (Auth::guard('admins')->attempt(['email' => $email, 'password' => $password,])) {

            return redirect()->route('admin.dashboard');
        }

        else{
            return back()->with('err', 'Email hoặc Mật khẩu không đúng. Vui lòng kiểm tra lại!');
        }

    }

    //Xử lí logout
    public function logOut()
    {
        Auth::guard('admins')->logout();
        return redirect()->route('admin.get.login');
    }
}
