<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimKiemController extends Controller
{
    //
    public function index()
    {
        return view('timkiem.index');
    }

    public function xuli(Request $request)
    {
        // dd($request->all());
        $type = $request->input('type');
        $tukhoa = $request->input('q');
        if ($type == 'chinhsach') {

            $data = DB::table('doituong')
            ->where('dt_ten', 'like', "%".$tukhoa."%")
            ->get();

            return view('timkiem.ketquachinhsach', compact('data', 'tukhoa'));

        }else if ($type == 'thongbao') {

            $data = DB::table('thongbao')
            ->where('tb_tieude', 'like', "%".$tukhoa."%")
            ->get();

            return view('timkiem.ketquathongbao', compact('data', 'tukhoa'));
        }
        
        return view('errors.404');
    }

    #Ajax search loại chính sách
    public function searchAjax(Request $request)
    {
        if ($request->ajax()) {
            $keyword = $request->keyword;
            
            $loaichinhsach = DB::table('doituong')->where('dt_ten', 'like', '%'.$keyword.'%')->get();
            $html = view('ajax.resultSearch', compact('loaichinhsach'))->render();

            $soluong = $loaichinhsach->count();

            return response(['html'=> $html, 'total'=>$soluong]);
        }
        return view(404);
    }
}
