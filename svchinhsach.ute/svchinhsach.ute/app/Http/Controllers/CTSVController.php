<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CTSVController extends Controller
{
    //
    //trang dashboard
    public function index()
    {
        $tongsvDK = DB::table('sv_dt_hk')->select('*')->count('id');
        $chuaduyet = DB::table('sv_dt_hk')
        ->select('*')
        ->where('tinhtrang', 0)
        ->count('id');
        $huy = DB::table('sv_dt_hk')
        ->select('*')
        ->where('tinhtrang', 2)
        ->count('id');
        return view('ctsv.dashboard.dashboard', compact('tongsvDK', 'chuaduyet', 'huy'));
    }

    //thông tin cá nhân
    public function infoCTSV()
    {
        $ctsv = DB::table('ctsv')->where('id', get_data_user('ctsv', 'id'))->get();
        return view('ctsv.info', compact('ctsv'));
    }

    //update thông tin cá nhân
    public function updateinfoCTSV(Request $request)
    {
        # code...
        // dd($request->all());

        $data = array(
            'ctsv_ten' => $request->input('ten'), 
            'ctsv_diachi' => $request->input('diachi'), 
            'ctsv_sdt' => $request->input('sdt'), 
        );

        if ($data) {
            DB::table('ctsv')->where('id', $request->input('id'))->update($data);
            return redirect()->back()->with('success', 'Cập nhật thành công.');
        }
    }

    //danh sách chờ duyệt
    public function getChoDuyet(Request $request)
    {
        //LỌC, Nếu k có lọc thì query ra thường
        if ($request->ten) {
            # code...
            $ten = $request->ten;

            $cs = DB::table('sv_dt_hk')
            ->join('sinhvien', 'sv_dt_hk.sinhvien_id', '=', 'sinhvien.id')
            ->join('lop','lop.id', '=', 'sinhvien.lop_id')
            ->join('doituong', 'sv_dt_hk.doituong_id', '=', 'doituong.id')
            ->join('hocki', 'sv_dt_hk.hk_id', '=', 'hocki.id')
            ->where('sinhvien.sv_ten', 'like', '%'.$ten.'%')
            ->select('*','sv_dt_hk.id as chinhsach_id')
            ->orderByDesc('sv_dt_hk.id')
            ->paginate(10);
        }
        else

        if ($request->hk) {
            # code...
            $hk = $request->hk;

            $cs = DB::table('sv_dt_hk')
            ->join('sinhvien', 'sv_dt_hk.sinhvien_id', '=', 'sinhvien.id')
            ->join('lop','lop.id', '=', 'sinhvien.lop_id')
            ->join('doituong', 'sv_dt_hk.doituong_id', '=', 'doituong.id')
            ->join('hocki', 'sv_dt_hk.hk_id', '=', 'hocki.id')
            ->where('sv_dt_hk.hk_id', '=', $hk)
            ->select('*','sv_dt_hk.id as chinhsach_id')
            ->orderByDesc('sv_dt_hk.id')
            ->paginate(10);
        }
        else
        if ($request->hk && $request->ten) {
            # code...
            $hk = $request->hk;
            $ten = $request->ten;

            $cs = DB::table('sv_dt_hk')
            ->join('sinhvien', 'sv_dt_hk.sinhvien_id', '=', 'sinhvien.id')
            ->join('lop','lop.id', '=', 'sinhvien.lop_id')
            ->join('doituong', 'sv_dt_hk.doituong_id', '=', 'doituong.id')
            ->join('hocki', 'sv_dt_hk.hk_id', '=', 'hocki.id')
            ->where('sv_dt_hk.hk_id', '=', $hk)
            ->where('sinhvien.sv_ten', 'like', '%'.$ten.'%')
            ->select('*','sv_dt_hk.id as chinhsach_id')
            ->orderByDesc('sv_dt_hk.id')
            ->paginate(10);
        }
        else
        {
            $cs = DB::table('sv_dt_hk')
            ->join('sinhvien', 'sv_dt_hk.sinhvien_id', '=', 'sinhvien.id')
            ->join('lop','lop.id', '=', 'sinhvien.lop_id')
            ->join('doituong', 'sv_dt_hk.doituong_id', '=', 'doituong.id')
            ->join('hocki', 'sv_dt_hk.hk_id', '=', 'hocki.id')
            ->select('*','sv_dt_hk.id as chinhsach_id')
            ->orderByDesc('sv_dt_hk.id')
            ->paginate(10);
        }
        
        $hocki = DB::table('hocki')
        ->orderByDesc('id')
        ->get();
        

        return view('ctsv.choduyet', compact('cs', 'hocki'));
    }

    #xem chi tiết đăng ký
    public function ChiTiet(Request $request)
    {
        //lấy ID của bản đăng ký từ url trên web
        $idChiTiet = $request->segment(4);
        // dd($idChiTiet);
        $chitiet = DB::table('sv_dt_hk')
        ->join('sinhvien', 'sv_dt_hk.sinhvien_id', '=', 'sinhvien.id')
        ->join('lop','lop.id', '=', 'sinhvien.lop_id')
        ->join('khoa','khoa.id', '=', 'lop.khoa_id')
        ->join('doituong', 'sv_dt_hk.doituong_id', '=', 'doituong.id')
        ->join('hocki', 'sv_dt_hk.hk_id', '=', 'hocki.id')
        ->where('sv_dt_hk.id',$idChiTiet)
        ->select('*','sv_dt_hk.id as chinhsach_id')
        ->get();

        $minhchung = DB::table('minh_chung')->where('sv_dt_hk_id', $idChiTiet)->get();
        return view('ctsv.chitiet', compact('chitiet', 'minhchung'));

    }
    //Duyệt chi tiết đăng ký
    public function postDuyet(Request $request)
    {
        
        $tinhtrang = $request->input('tinhtrang');
        $id = $request->input('chinhsach_id');

        $data = array(
            'tinhtrang' => $tinhtrang,
            'updated_at'=> Carbon::now('Asia/Ho_Chi_Minh')
            
        );
        if ($id) {
            DB::table('sv_dt_hk')->where('id', $id)->update($data);
            return redirect()->route('ctsv.get.duyet')->with('success', 'Đã duyệt thành công!');
        }
    }

    //thông báo
    public function thongBao()
    {
        $thongbao = DB::table('thongbao')
        ->join('ctsv', 'thongbao.ctsv_id', '=', 'ctsv.id')
        ->select('thongbao.*', 'ctsv.ctsv_ten')
        ->orderByDesc('id')
        ->paginate(10);
        return view('ctsv.thongbao', compact('thongbao'));
    }

    //==========================THÔNG BÁO=================================
    public function getthongbao()
    {
        # code...
        return view('ctsv.themthongbao');
    }
    public function postthongbao(Request $request)
    {
        $request->validate(
            [
                'tb_tieude'=>'required',
                'tb_noidung'=>'required',
            ],
            [
                'tb_tieude.required'=>'Tiêu đề không được để trống',
                'tb_noidung.required'=>'Nội dung không được để trống',
            ]
        );

        // dd(Auth::guard('ctsv')->id());
        // dd(get_data_user('ctsv','id'));

        $data = array(
            'tb_tieude' => $request->input('tb_tieude'), 
            'tb_noidung' => $request->input('tb_noidung'),
            'ctsv_id' => Auth::guard('ctsv')->id(),
            'created_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
        );

        if ($data) {
            DB::table('thongbao')->insert($data);
            return redirect()->back()->with('success', 'Đã thêm thông báo thành công');
        }
    }





    #============================= Thống kê =====================================
    public function thongke()
    {

        $thongkekhoa = DB::table('sv_dt_hk')
        ->join('hocki', 'sv_dt_hk.hk_id', '=', 'hocki.id')
        ->join('sinhvien', 'sv_dt_hk.sinhvien_id', '=', 'sinhvien.id')
        ->join('lop', 'sinhvien.lop_id', '=', 'lop.id')
        ->join('khoa', 'lop.khoa_id', '=', 'khoa.id')
        ->select('k_ma','k_ten', DB::raw('count(*) as soluong'))
        ->where('tinhtrang', 1)
        ->groupBy('k_ma','k_ten')
        ->get();

        $chartData ="";
        foreach ($thongkekhoa as $value) {
            $chartData.="['".$value->k_ten."',   ".$value->soluong."],";
        }
        
        $chartData = rtrim($chartData,",");
        return view('ctsv.thongke', compact('thongkekhoa', 'chartData'));
    }
    public function thongke2()
    {
        $thongkehocki = DB::table('sv_dt_hk')
        ->join('hocki', 'sv_dt_hk.hk_id', '=', 'hocki.id')
        ->select('hk_ma','hk_id', DB::raw('count(*) as soluong'))
        ->where('tinhtrang', 1)
        ->groupBy('hk_id','hk_ma')
        ->get();

        $chartData ="";
        foreach ($thongkehocki as $value) {
            $chartData.="['".$value->hk_ma."',   ".$value->soluong."],";
        }
        
        $chartData = rtrim($chartData,",");

        return view('ctsv.thongke2', compact('thongkehocki', 'chartData'));
    }

    // =============================AJAX=========================
    public function detailSVDK(Request $request, $id)
    {
        if ($request->ajax()) {

            $chitiet = DB::table('sv_dt_hk')
            ->join('sinhvien', 'sv_dt_hk.sinhvien_id', '=', 'sinhvien.id')
            ->join('lop','lop.id', '=', 'sinhvien.lop_id')
            ->join('khoa','khoa.id', '=', 'lop.khoa_id')
            ->join('doituong', 'sv_dt_hk.doituong_id', '=', 'doituong.id')
            ->join('hocki', 'sv_dt_hk.hk_id', '=', 'hocki.id')
            ->where('sv_dt_hk.id',$id)
            ->select('*','sv_dt_hk.id as chinhsach_id', 'sv_dt_hk.created_at', 'sv_dt_hk.updated_at')
            ->get();
    
            $minhchung = DB::table('minh_chung')->where('sv_dt_hk_id', $id)->get();

            $html = view('ctsv.ajax.detailDangKi', compact('chitiet', 'minhchung'))->render();
            return response($html);
        }
    }

}
