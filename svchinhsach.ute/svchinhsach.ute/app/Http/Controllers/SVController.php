<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SVController extends Controller
{
    //thông tin cá nhân sv
    public function getInfoSV()
    {
        // dd(Auth::guard('sinhvien')->id());
        $sinhvien = DB::table('sinhvien')
        ->join('lop', 'sinhvien.lop_id', '=', 'lop.id')
        ->join('khoa', 'khoa.id', '=', 'lop.khoa_id')
        ->where('sinhvien.id', Auth::guard('sinhvien')->id())
        ->select('sinhvien.*', 'lop.l_ten', 'khoa.k_ten')
        ->get();
        // dd($sinhvien);
        return view('sinhvien.info', compact('sinhvien'));
    }

    //lưu thông tin cá nhân
    public function postInfoSV(Request $request)
    {
        $request->validate(
            [
                'sdt'=>'required',
                'ngaysinh'=>'required',
                'diachi'=>'required',
                'cmnd'=>'required',
            ],
            [
                'sdt.required'=>'Số điện thoại không để trống',
                'ngaysinh.required'=>'Ngày sinh không để trống',
                'diachi.required'=>'Địa chỉ không để trống',
                'cmnd.required'=>'Số CMND không để trống',
            ]
        );

        $data = array(
            'sv_sdt' =>$request->input('sdt') , 
            'sv_ngaysinh' =>$request->input('ngaysinh') , 
            'sv_diachi' =>$request->input('diachi') , 
            'sv_cmnd' =>$request->input('cmnd') , 
        );

        if ($data) {
            # code...
            DB::table('sinhvien')->where('id', get_data_user('sinhvien', 'id'))->update($data);
            return redirect()->back()->with('success', 'Đã cập nhật thông tin thành công.');
        }
    }

    //lấy form đổi mk
    public function getChangePass()
    {
        return view('sinhvien.changePass');
    }
    public function postChangePass(Request $request)
    {
        $request->validate(
            [
                'password_old'=>'required',
                'password_new'=>'required| confirmed',
                'password_new_confirmation'=>'required|',
            ],
            [
                'required'=>':attribute không được để trống.',
                'confirmed'=>'Xác nhận mật khẩu không đúng.'
            ],
            [
                'password_old'=>'Mật khẩu cũ',
                'password_new'=>'Mật khẩu mới',
                'password_new_confirmation'=>'Xác nhận mật khẩu mới',
            ]
        );

        #--Check thêm mật khẩu cũ nhập có đúng k
        
        if ( Hash::check($request->input("password_old"), get_data_user("sinhvien", "password"))) {

            $data = array(
                'password' => bcrypt($request->input("password_new")),
            );
            // dd('đúng');
            if ($data) {
                # code...

                DB::table('sinhvien')->where('id', get_data_user('sinhvien', 'id'))->update($data);
                return redirect()->back()->with('success', 'Cập nhật thành công');
            }
            

        }else{
            return redirect()->back()->with('err', ' Mật khẩu cũ không đúng. Vui lòng kiểm tra lại!');
        }
    }


    //===========Chi tiết đối tượng
    public function detailDoiTuong(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);
        $id = array_pop($url);
        
        if ($id) {
            $detail = DB::table('doituong')->where('id', $id)->get();
            return view('doituong.detail', compact('detail'));
        }

    }

    //Xem tất cả đối tượng đã đăng ký
    public function listDangKi()
    {
        $list = DB::table('sv_dt_hk')
        ->join('sinhvien', 'sv_dt_hk.sinhvien_id', '=', 'sinhvien.id')
        ->join('lop','lop.id', '=', 'sinhvien.lop_id')
        ->join('doituong', 'sv_dt_hk.doituong_id', '=', 'doituong.id')
        ->join('hocki', 'sv_dt_hk.hk_id', '=', 'hocki.id')
        ->where('sv_dt_hk.sinhvien_id', get_data_user('sinhvien', 'id'))
        ->select('*','sv_dt_hk.id as chinhsach_id', 'sv_dt_hk.created_at as ngaydangki', 'sv_dt_hk.updated_at as ngayduyet')
        ->get();

        return view('sinhvien.dsDangKi', compact('list'));
    }


}
