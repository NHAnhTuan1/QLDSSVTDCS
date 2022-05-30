<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Ctsv;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminCTSVController extends Controller
{
    //kích hoạt sidebar đang thao tác
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'ctsv']);
            return $next($request);
        });
    }
    //end kích hoạt

    public function index()
    {
        $ctsv = Ctsv::all();
        return view('admin::ctsv.index', compact('ctsv'));
    }

    public function create()
    {
        return view('admin::ctsv.create');
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = bcrypt('12345678');
        $id = DB::table('ctsv')->insertGetId($data);
        if ($id) {
            return redirect()->back()->with('status', ' Thêm thành công');
        }
    }

    public function edit($id)
    {
        $ctsv = DB::table('ctsv')->where('id', $id)->get();
        return view('admin::ctsv.edit', compact('ctsv'));
    }
    public function update(Request $request)
    {
        $data = $request->except('_token');
        if ($data) {
            DB::table('ctsv')->where('id', $request->id)->update($data);
            return redirect()->route('admin.ctsv.index')->with('status', 'Cập nhật thành công');
        }
    }

    public function delete($id)
    {
        if ($id) {
            DB::table('ctsv')->where('id', $id)->delete();
            return redirect()->route('admin.ctsv.index')->with('status', 'Xóa thành công');
        }
    }
}
