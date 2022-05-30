<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //============check thường
        if (get_data_user('admins','id') == null) {
            # code...
            return redirect()->route('admin.get.login');
        } 

        // ==============CHECK ACTIVE CỦA ADMIN ĐÓ========
        //nếu id ng đăng nhập == null hoặc active của ng đăng nhập ==0 thì ko cho vào admin
        // if (get_data_user('admins','id') == null || get_data_user('admins','active') == 0) {
        //     # code...
        //     return redirect()->route('admin.get.login');
        // } 

        return $next($request);
    }
}
