<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index()
    {

        $doituong = DB::table('doituong')->get();

        $thongbao = DB::table('thongbao')
        ->join('ctsv', 'thongbao.ctsv_id', '=', 'ctsv.id')
        ->select('thongbao.*', 'ctsv.ctsv_ten')
        ->orderByDesc('thongbao.id')
        ->get();

        $khoa = DB::table('khoa')->get();

        return view('index', compact('doituong', 'thongbao', 'khoa'));
    }
}
