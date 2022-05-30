<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginSV
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
        if (get_data_user('sinhvien','id') == null) {
            # code...
            return redirect()->route('sv.get.login');
        }
        
        return $next($request);
    }
}
