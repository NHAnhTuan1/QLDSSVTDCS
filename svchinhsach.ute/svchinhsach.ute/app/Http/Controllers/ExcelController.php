<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExcelController extends Controller
{
    //danh sách sv thuộc diện chính sách
    public function viewExcel()
    {
        $excel = DB::table('sv_dt_hk')
        ->join('sinhvien', 'sv_dt_hk.sinhvien_id', '=', 'sinhvien.id')
        ->join('lop','lop.id', '=', 'sinhvien.lop_id')
        ->join('doituong', 'sv_dt_hk.doituong_id', '=', 'doituong.id')
        ->join('hocki', 'sv_dt_hk.hk_id', '=', 'hocki.id')
        ->where('sv_dt_hk.tinhtrang', 1)
        ->select('*','sv_dt_hk.id as chinhsach_id')
        ->get();

        
        return view('ctsv.excel', compact('excel'));
    }
}
