<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminDoiTuongController extends Controller
{
    //kích hoạt sidebar đang thao tác
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'doituong']);

            return $next($request);
        });
    }
    //end kích hoạt

    //xem
    public function index()
    {
        $doituong = DB::table('doituong')->get();
        return view('admin::doituong.index', compact('doituong'));
    }

    //thêm
    public function create()
    {
        return view('admin::doituong.create');
    }
    public function store(Request $request)
    {
        #validate dữ liệu
        $request->validate(
            [
                'ten'=>'required|unique:doituong,dt_ten',
                'hinhthuc'=>'required',
                'mota'=>'required',
            ],
            [
                'ten.required'=>'Bạn chưa nhập tên đối tượng',
                'ten.unique'=>'Tên đối tượng đã tồn tại',
                'hinhthuc.required'=>'Bạn chưa nhập hình thức',
                'mota.required'=>'Bạn chưa nhập mô tả',
            ]
            
        );

        $data = array(
            'dt_ten' =>$request->input('ten') , 
            'dt_hinhthuc' =>$request->input('hinhthuc') , 
            'dt_mota' =>$request->input('mota') , 
        );

        if (DB::table('doituong')->insert($data)) {
            return redirect()->back()->with('status', 'Thêm thành công.');
        }

        
    }

    //sửa
    public function edit($id)
    {
        $doituong = DB::table('doituong')->where('id', $id)->get();
        return view('admin::doituong.edit', compact('doituong'));
    }
    public function update(Request $request)
    {
        #validate dữ liệu
        $request->validate(
            [
                'ten'=>'required|',
                'hinhthuc'=>'required',
                'mota'=>'required',
            ],
            [
                'ten.required'=>'Bạn chưa nhập tên đối tượng',
                'hinhthuc.required'=>'Bạn chưa nhập hình thức',
                'mota.required'=>'Bạn chưa nhập mô tả',
            ]
            
        );

        $data = array(
            'id'=> $request->input('id'),
            'dt_ten' =>$request->input('ten') , 
            'dt_hinhthuc' =>$request->input('hinhthuc') , 
            'dt_mota' =>$request->input('mota') , 
        );

        if ($data) {
            # code...
            DB::table('doituong')->where('id', $request->input('id'))->update($data);
            return redirect()->route('admin.doituong.index')->with('status', 'Cập nhật thành công.');
        }
        
    }

    //xóa
    public function delete($id)
    {
        if (DB::table('doituong')->where('id', $id)->delete()) {
            # code...
            return redirect()->route('admin.doituong.index')->with('status', 'Xóa thành công.');
        }
    }

    #Detail Ajax
    public function detailDT(Request $request, $id)
    {
        if ($request->ajax()) {
            $doituong = DB::table('doituong')->where('id', $id)->get();
            $html = view('admin::ajax.detailDT', compact('doituong'))->render();

            return response($html);
        }
    }

    
}
