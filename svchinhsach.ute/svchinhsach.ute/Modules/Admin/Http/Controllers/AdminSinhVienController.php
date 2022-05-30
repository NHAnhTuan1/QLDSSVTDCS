<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminSinhVienController extends Controller
{
    //kích hoạt sidebar đang thao tác
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'sv']);

            return $next($request);
        });
    }
    //end kích hoạt



    //--xem
    public function index(Request $request)
    {
        if ($request->q) {
            $keyword = $request->q;

            $sinhvien = DB::table('sinhvien')
            ->join('lop', 'sinhvien.lop_id', '=', 'lop.id')
            ->select('sinhvien.*', 'lop.l_ten')
            ->where('sinhvien.sv_ten', 'like', '%'.$keyword.'%')
            ->paginate(5);

        }
        else

        $sinhvien = DB::table('sinhvien')
        ->join('lop', 'sinhvien.lop_id', '=', 'lop.id')
        ->select('sinhvien.*', 'lop.l_ten')
        ->paginate(5);

        return view('admin::sinhvien.index', compact('sinhvien'));
    }



    //--thêm
    public function create()
    {
        $lop = DB::table('lop')->get();
        return view('admin::sinhvien.create', compact('lop'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'sv_ten'=>'required',
                'sv_email'=>'required',
                'sv_ngaysinh'=>'required',
                'sv_cmnd'=>'required',
                'sv_ma'=>'required|min:13',
            ],
            [
                'sv_ten.required'=>'Bạn chưa nhập tên sinh viên',
                'sv_email.required'=>'Bạn chưa nhập email',
                'sv_ngaysinh.required'=>'Bạn chưa nhập ngày sinh',
                'sv_cmnd.required'=>'Bạn chưa nhập CMND',
                'sv_ma.required'=>'Bạn chưa nhập mã sinh viên',
                'sv_ma.min'=>'Mã sinh viên ít nhất 13 kí tự',
            ]
        );

        $data = array(
            'sv_ten' => $request->input('sv_ten'), 
            'sv_ma' => $request->input('sv_ma'), 
            'lop_id' => $request->input('sv_lop'), 
            'sv_diachi' => $request->input('sv_diachi'), 
            'sv_ngaysinh' => $request->input('sv_ngaysinh'), 
            'sv_email' => $request->input('sv_email'), 
            'password' => bcrypt($request->input('sv_password')), 
            'sv_cmnd' => $request->input('sv_cmnd'), 
            'sv_gioitinh' => $request->input('sv_gioitinh'), 
            'sv_sdt' => $request->input('sv_sdt'), 
        );

        // dd($request->all());
        if (DB::table('sinhvien')->insert($data)) {
            # code...
            return redirect()->back()->with('status', 'Đã thêm thành công');
        }
    }




    //--sửa
    public function edit($id)
    {
        $lop = DB::table('lop')->get();
        $sv = DB::table('sinhvien')->where('id', $id)->get();
        return view('admin::sinhvien.edit', compact('sv', 'lop'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'sv_ten'=>'required',
                'sv_email'=>'required',
                'sv_ngaysinh'=>'required',
                'sv_cmnd'=>'required',
            ],
            [
                'sv_ten.required'=>'Bạn chưa nhập tên sinh viên',
                'sv_email.required'=>'Bạn chưa nhập email',
                'sv_ngaysinh.required'=>'Bạn chưa nhập ngày sinh',
                'sv_cmnd.required'=>'Bạn chưa nhập CMND',
            ]
        );

        $data = array(
            'sv_ten' => $request->input('sv_ten'), 
            'lop_id' => $request->input('sv_lop'), 
            'sv_diachi' => $request->input('sv_diachi'), 
            'sv_ngaysinh' => $request->input('sv_ngaysinh'),
            'sv_cmnd' => $request->input('sv_cmnd'), 
            'sv_gioitinh' => $request->input('sv_gioitinh'), 
            'sv_sdt' => $request->input('sv_sdt'), 
        );

        if ($data) {
            DB::table('sinhvien')->where('id', $request->input('sv_id'))->update($data);
            return redirect()->route('admin.sv.index')->with('status', 'Cập nhật thành công');
        }
    }



    //--xóa
    public function delete($id)
    {
        if ($id) {
            # code...
            DB::table('sinhvien')->where('id', $id)->delete();
            return redirect()->back()->with('status', 'Đã xóa thành công');
        }
        
    }
}
