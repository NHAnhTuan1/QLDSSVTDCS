<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminKhoaController extends Controller
{
    //kích hoạt sidebar đang thao tác
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'khoa']);

            return $next($request);
        });
    }
    //end kích hoạt

    //xem
    public function index()
    {
        $khoa = DB::table('khoa')->paginate(5);
        return view('admin::khoa.index', compact('khoa'));
    }

    //thêm
    public function create()
    {
        return view('admin::khoa.create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'k_ten'=>'required|unique:khoa,k_ten|max:100',
                'k_ma'=>'required|unique:khoa,k_ma'
            ],
            [
                'k_ten.required'=>'Bạn chưa nhập tên khoa',
                'k_ten.unique'=>'Tên khoa đã tồn tại',
                'k_ma.unique'=>'Mã khoa đã tồn tại',
                'k_ma.required'=>'Bạn chưa nhập mã khoa',
                'k_ten.max'=>'Tên khoa quá dài, tối đa 100 từ',
                
            ]
        );
        
        $data = array(
            'k_ten' => $request->input('k_ten'), 
            'k_ma' => $request->input('k_ma'), 
        );


        if (DB::table('khoa')->insert($data)) {
            return redirect()->back()->with('status', 'Thêm thành công.');
        }
    }
    //sửa
    public function edit($id)
    {
        $khoa = DB::table('khoa')->where('id', $id)->get();
        return view('admin::khoa.edit', compact('khoa'));
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                'k_ten'=>'required|max:100',
            ],
            [
                'k_ten.required'=>'Bạn chưa nhập tên khoa',
                'k_ten.unique'=>'Tên khoa đã tồn tại',
                'k_ten.max'=>'Tên khoa quá dài, tối đa 100 từ',
                
            ]
        );
        $data = array(
            'k_ten' => $request->input('k_ten'), 
            'k_ma' => $request->input('k_ma'), 
        );

        if ($data) {
            # code...
            DB::table('khoa')->where('id', $request->input('id'))->update($data);
            return redirect()->route('admin.khoa.index')->with('status', 'Cập nhật thành công.');
        }
        
    }

    //xóa
    public function delete($id)
    {
        $checkChildrent = DB::table('khoa')
        ->join('lop', 'khoa.id', '=', 'lop.khoa_id')
        ->where('khoa.id', $id)
        ->get();
        // dd($checkChildrent);
        $checkChildrent = json_decode($checkChildrent);

        if ($checkChildrent == null) {
            if (DB::table('khoa')->where('id', $id)->delete()) {
                return redirect()->route('admin.khoa.index')->with('status', 'Xóa thành công.');
            }
        }else{
            return redirect()->route('admin.khoa.index')->with('err', 'Không thể xóa do có lớp thuộc Khoa này.');
        }

        
    }

}
