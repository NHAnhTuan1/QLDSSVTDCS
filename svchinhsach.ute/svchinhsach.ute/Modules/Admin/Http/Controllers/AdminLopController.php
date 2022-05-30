<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminLopController extends Controller
{
    //kích hoạt sidebar đang thao tác
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'lop']);

            return $next($request);
        });
    }
    //end kích hoạt

    //--xem
    public function index()
    {
        $lop = DB::table('lop')
        ->join('khoa', 'lop.khoa_id', '=', 'khoa.id')
        ->select('lop.*', 'khoa.k_ten')
        ->paginate(5);
        return view('admin::lop.index', compact('lop'));
    }

    //--thêm
    public function create()
    {
        $khoa = DB::table('khoa')->get();
        return view('admin::lop.create', compact('khoa'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'l_ten'=>'required|unique:lop,l_ten|max:100',
                'l_ma'=>'required|unique:lop,l_ma|max:100',
            ],
            [
                'l_ten.required'=>'Bạn chưa nhập tên lớp',
                'l_ma.required'=>'Bạn chưa nhập mã lớp',
                'l_ten.unique'=>'Tên lớp đã tồn tại',
                'l_ma.unique'=>'Mã lớp đã tồn tại',
                'l_ten.max'=>'Tên lớp quá dài, tối đa 100 từ',
                
            ]
        );


        $data = array(
            'l_ten' => $request->input('l_ten'), 
            'l_ma' => $request->input('l_ma'), 
            'khoa_id' => $request->input('khoa_id'), 
        );

        if (DB::table('lop')->insert($data)) {
            return redirect()->back()->with('status', 'Thêm thành công.');
        }
    }

    //sửa
    public function edit($id)
    {
        $khoa = DB::table('khoa')->get();
        $lop = DB::table('lop')->where('id', $id)->get();

        return view('admin::lop.edit', compact('lop', 'khoa'));
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                'l_ten'=>'required|max:100',
                'l_ma'=>'required|max:100',
            ],
            [
                'l_ten.required'=>'Bạn chưa nhập tên lớp',
                'l_ten.unique'=>'Tên lớp đã tồn tại',
                'l_ten.max'=>'Tên lớp quá dài, tối đa 100 từ',
                
            ]
        );


        $data = array(
            'id'=>$request->input('id'),
            'l_ten' => $request->input('l_ten'), 
            'l_ma' => $request->input('l_ma'), 
            'khoa_id' => $request->input('khoa_id'), 
        );

        if ($data) {
            # code...
            DB::table('lop')->where('id', $request->input('id'))->update($data);
            return redirect()->route('admin.lop.index')->with('status', 'Cập nhật thành công.');
        }
        

    }

    //xóa
    public function delete($id)
    {
        if (DB::table('lop')->where("id", $id)->delete()) {
            return redirect()->route('admin.lop.index')->with('status', 'Xóa thành công.');
        }
    }

}
