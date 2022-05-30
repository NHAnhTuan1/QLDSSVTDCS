<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminHocKiController extends Controller
{
    //kích hoạt sidebar đang thao tác
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'hocki']);

            return $next($request);
        });
    }
    //end kích hoạt

    //--xem
    public function index()
    {
        $hocki = DB::table('hocki')->paginate(4);
        return view('admin::hocki.index', compact('hocki'));
    }

    //--thêm
    public function create()
    {
        return view('admin::hocki.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'namhoc'=>'required',
                'hocki'=>'required',
                'mahocki'=>'required',
            ],
            [
                'namhoc.required'=>'Bạn chưa nhập năm học',
                'hocki.required'=>'Bạn chưa nhập học kỳ',
                'mahocki.required'=>'Bạn chưa nhập mã học kỳ',
            ]
        );

        $data= array(
            'hk_namhoc' => $request->input('namhoc'), 
            'hk_hocki' => $request->input('hocki'), 
            'hk_ma' => $request->input('mahocki'), 
        );

        if (DB::table('hocki')->insert($data)) {
            # code...
            return redirect()->back()->with('status', 'Thêm thành công');
        }
    }

    //--sửa
    public function edit($id)
    {
        $hocki = DB::table('hocki')->where('id', $id)->get();
        return view('admin::hocki.edit', compact('hocki'));
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                'namhoc'=>'required',
                'hocki'=>'required',
            ],
            [
                'namhoc.required'=>'Bạn chưa nhập năm học',
                'hocki.required'=>'Bạn chưa nhập học kỳ',
            ]
        );

        $data = array(
            'id'=>$request->input('id'),
            'hk_namhoc' => $request->input('namhoc'), 
            'hk_hocki' => $request->input('hocki'), 
            'hk_ma' => $request->input('mahocki'), 
        );

        if ($data) {
            # code...
            DB::table('hocki')->where('id', $request->input('id'))->update($data);
            return redirect()->route('admin.hocki.index')->with('status', 'Cập nhật thành công');
        }

        
    }

    //--xóa
    public function delete($id)
    {
        if ($id) {
            DB::table('hocki')->where('id', $id)->delete();
            return redirect()->route('admin.hocki.index')->with('status', 'Xóa thành công');
        }
    }
}
