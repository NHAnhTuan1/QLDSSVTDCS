<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongBaoDetailController extends Controller
{
    //
    public function getDetail(Request $request, $id)
    {
        # code...
        $thongbao = DB::table('thongbao')->where('id', $id)->get();
        return view('thongbao_detail.index', compact('thongbao'));
    }
}
