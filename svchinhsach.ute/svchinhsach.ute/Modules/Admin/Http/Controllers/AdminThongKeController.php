<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminThongKeController extends Controller
{
    //kích hoạt sidebar đang thao tác
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'thongke']);
            return $next($request);
        });
    }
    //end kích hoạt


   //Thống kê theo Khoa
   public function thongkekhoa()
   {
        $thongkekhoa = DB::table('sv_dt_hk')
        ->join('hocki', 'sv_dt_hk.hk_id', '=', 'hocki.id')
        ->join('sinhvien', 'sv_dt_hk.sinhvien_id', '=', 'sinhvien.id')
        ->join('lop', 'sinhvien.lop_id', '=', 'lop.id')
        ->join('khoa', 'lop.khoa_id', '=', 'khoa.id')
        ->select('k_ma','k_ten', DB::raw('count(*) as soluong'))
        ->where('tinhtrang', 1)
        ->groupBy('k_ma','k_ten')
        ->get();

        $chartData ="";
        foreach ($thongkekhoa as $value) {
            $chartData.="['".$value->k_ten."',   ".$value->soluong."],";
        }
        $chartData = rtrim($chartData,",");

        return view('admin::thongke.khoa', compact('chartData', 'thongkekhoa'));
    }
}
