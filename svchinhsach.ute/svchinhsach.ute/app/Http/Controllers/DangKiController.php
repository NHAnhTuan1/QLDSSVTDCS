<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DangKiController extends Controller
{
    //get đăng kí
    public function getDangKi(Request $request)
    {
        $idDoiTuong = $request->segment(2);
        
        $doituong = DB::table('doituong')
        ->where('id', $idDoiTuong)
        ->get();

        $sinhvien = DB::table('sinhvien')
        ->join('lop', 'sinhvien.lop_id', '=', 'lop.id')
        ->join('khoa', 'khoa.id', '=', 'lop.khoa_id')
        ->where('sinhvien.id', get_data_user('sinhvien', 'id'))
        ->select('sinhvien.*', 'lop.l_ten', 'khoa.k_ten')
        ->get();

        $hocki = DB::table('hocki')
        ->orderByDesc('id')
        ->limit(2)
        ->get();

        return view('sinhvien.dangki', compact('hocki', 'sinhvien', 'doituong'));
    }

    //post đăng kí
    public function postDangKi(Request $request)
    {
        // dd($request->minhchung); mảng tí duyệt
       

        // dd($request->minhchung);

        $data = array(
            'sinhvien_id' => get_data_user('sinhvien', 'id'),
            'doituong_id'=>$request->input('doituong'),
            'hk_id'=>$request->input('hocki'),
            'tinhtrang'=>0,
            'created_at'=> Carbon::now('Asia/Ho_Chi_Minh')
        );

        $sv_dt_hk_ID = DB::table('sv_dt_hk')->insertGetId($data);


        //--nếu có thì mới insert
        if ($request->hasFile('minhchung')) {
            
            $duongdan = 'public/files';
            $file = $request->minhchung;

            foreach ($file as $key =>$value) {
                # code...
                
                $photo = Str::random(4)."_".$value->getClientOriginalName();
                $value->move($duongdan, $photo);
                $image = url('public/files')."/".$photo;

                DB::table('minh_chung')->insert(
                    [
                        'sv_dt_hk_id'=>$sv_dt_hk_ID,
                        'mc_file'=>$image,
                        'created_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
                        'updated_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
                    ]
                );

                
            }

        }

        return redirect()->back()->with('success', 'Đã đăng ký thành công. Vui lòng chờ kết quả từ CTSV');


    }

}
