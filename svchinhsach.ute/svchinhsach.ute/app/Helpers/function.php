<?php

use Illuminate\Support\Facades\Auth;

//kiêm tra đăng nhập 
if (!function_exists('get_data_user')) {
        # code...
        //mạc định filed = id, sau ni muốn lấy j thì thay vào (name, id, email)
        function get_data_user($type, $field ='id')
        {
            //toán tử 3 ngôi
            return Auth::guard($type)->user()? Auth::guard($type)->user()->$field : '';
        }
    }


?>