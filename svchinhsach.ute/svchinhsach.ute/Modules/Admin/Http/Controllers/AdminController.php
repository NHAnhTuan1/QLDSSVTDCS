<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //kích hoạt sidebar đang thao tác
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'dashboard']);
            return $next($request);
        });
    }
    //end kích hoạt

    
    public function index()
    {
        $tongKhoa = DB::table('khoa')->count();
        $tongLop = DB::table('lop')->count();
        $tongSV = DB::table('sinhvien')->count();
        return view('admin::index', compact('tongKhoa', 'tongLop', 'tongSV'));
    }

    
}
