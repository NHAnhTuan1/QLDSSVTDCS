<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDSSVChinhSachController extends Controller
{

    //kích hoạt sidebar đang thao tác
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'danhsachsv']);

            return $next($request);
        });
    }
    //end kích hoạt


    public function getDanhSachSVChinhSach(Request $request)
    {
        
        if ($request->q) {
            # code...
            $keyword = $request->q;

            $danhsach = DB::table('sv_dt_hk')
            ->join('sinhvien','sv_dt_hk.sinhvien_id', '=', 'sinhvien.id')
            ->join('lop', 'sinhvien.lop_id', '=', 'lop.id')
            ->join('doituong', 'sv_dt_hk.doituong_id', '=', 'doituong.id')
            ->join('hocki', 'sv_dt_hk.hk_id', '=', 'hocki.id')
            ->select('sinhvien.*','sv_dt_hk.tinhtrang', 'lop.*', 'hocki.*','doituong.*', 'sv_dt_hk.id as idSVDTHK')
            ->where('sinhvien.sv_ten', 'like', '%'.$keyword.'%')
            // ->where('sv_dt_hk.tinhtrang', '=', 1)
            ->get();
        }
        else

        $danhsach = DB::table('sv_dt_hk')
        ->join('sinhvien','sv_dt_hk.sinhvien_id', '=', 'sinhvien.id')
        ->join('lop', 'sinhvien.lop_id', '=', 'lop.id')
        ->join('doituong', 'sv_dt_hk.doituong_id', '=', 'doituong.id')
        ->join('hocki', 'sv_dt_hk.hk_id', '=', 'hocki.id')
        ->select('sinhvien.*','sv_dt_hk.tinhtrang', 'lop.*', 'hocki.*','doituong.*', 'sv_dt_hk.id as idSVDTHK')
        // ->where('sv_dt_hk.tinhtrang', '=', 1)
        ->get();

        // dd($danhsach);

        return view('admin::danhsachSVCS', compact('danhsach'));
    }





    #Xem chi tiết
    public function detailDanhSachSVChinhSach(Request $request, $id)
    {
        $chitiet = DB::table('sv_dt_hk')
        ->join('sinhvien', 'sv_dt_hk.sinhvien_id', '=', 'sinhvien.id')
        ->join('lop','lop.id', '=', 'sinhvien.lop_id')
        ->join('khoa','khoa.id', '=', 'lop.khoa_id')
        ->join('doituong', 'sv_dt_hk.doituong_id', '=', 'doituong.id')
        ->join('hocki', 'sv_dt_hk.hk_id', '=', 'hocki.id')
        ->where('sv_dt_hk.id',$id)
        ->select('*','sv_dt_hk.id as chinhsach_id')
        ->get();

        $minhchung = DB::table('minh_chung')->where('sv_dt_hk_id', $id)->get();

        return view('admin::svchinhsach_detail.index', compact('chitiet', 'minhchung'));
    }
    #post duyệt lên
    public function postDanhSachSVChinhSach(Request $request)
    {
        # code...
        $tinhtrang = $request->input('tinhtrang');
        $id = $request->input('chinhsach_id');

        $data = array(
            'tinhtrang' => $tinhtrang,
            'updated_at'=> Carbon::now('Asia/Ho_Chi_Minh')
            
        );
        if ($id) {
            DB::table('sv_dt_hk')->where('id', $id)->update($data);
            return redirect()->back()->with('success', 'Đã duyệt thành công!');
        }
    }
}
