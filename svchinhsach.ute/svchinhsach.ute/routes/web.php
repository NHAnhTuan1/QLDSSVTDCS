<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','HomeController@index')->name('home');

Route::prefix('/')->group(function () {
    //--Đăng nhập
    Route::get('/dang-nhap-sinh-vien', 'LoginController@getLoginSV')->name('sv.get.login');
    Route::post('/dang-nhap-sinh-vien', 'LoginController@postLoginSV')->name('sv.post.login');
    //Đăng xuất
    Route::get('dang-xuat', 'LoginController@getLogoutSV')->name('sv.get.logout');

});

//Route cho sinh viên
Route::prefix('sinh-vien')->middleware('CheckLoginSV')->group(function () {
    //--xem thông tin
    Route::get('/thong-tin-ca-nhan', 'SVController@getInfoSV')->name('sv.get.info');
    Route::post('/thong-tin-ca-nhan', 'SVController@postInfoSV')->name('sv.post.info');

    //--đổi mật khẩu
    Route::get('/doi-mat-khau','SVController@getChangePass')->name('sv.get.changePass');
    Route::post('/doi-mat-khau','SVController@postChangePass')->name('sv.post.changePass');

    //--xem danh sách đăng ký
    Route::get('/doi-tuong-da-dang-ki', 'SVController@listDangKi')->name('sv.get.xemDT');

});

//Route cho đăng kí diện chính sách
Route::prefix('dang-ky-dien-chinh-sach')->middleware('CheckLoginSV')->group(function () {
    //--khi bấm zô link này sẽ ra form điền thông tin
    Route::get('/{id}', 'DangKiController@getDangKi')->name('sv.get.dangki');
    Route::post('/', 'DangKiController@postDangKi')->name('sv.post.dangki');

    

});


//--xem chi tiết đối tượng
Route::get('/doi-tuong/{slug}-{id}', 'SVController@detailDoiTuong')->name('get.detail.dt');




//--Đăng nhập cho CTSV
Route::prefix('/')->group(function () {
    //--Đăng nhập
    Route::get('/dang-nhap-ctsv', 'LoginController@getLoginCTSV')->name('ctsv.get.login');
    Route::post('/dang-nhap-ctsv', 'LoginController@postLoginCTSV')->name('ctsv.post.login');
    //Đăng xuất
    Route::get('/dang-xuat-ctsv', 'LoginController@getLogoutCTSV')->name('ctsv.get.logout');

});


//--Tìm kiếm
Route::prefix('/tim-kiem')->group(function () {

    Route::get('/', 'TimKiemController@index')->name('timkiem.index');
    Route::get('/ket-qua', 'TimKiemController@xuli')->name('timkiem.xuli');
    
    //Ajax search
    Route::post('/result', 'TimKiemController@searchAjax')->name('ajax.search');
   
});



//Route cho CTSV
Route::prefix('ctsv')->middleware('CheckLoginCTSV')->group(function () {
    //--dashboard
    Route::get('/dashboard', 'CTSVController@index')->name('ctsv.dashboard');
    Route::get('/info', 'CTSVController@infoCTSV')->name('ctsv.get.info');
    Route::post('/info', 'CTSVController@updateinfoCTSV')->name('ctsv.update.info');


    Route::get('/danh-sach','CTSVController@getChoDuyet')->name('ctsv.get.duyet');

    Route::get('/danh-sach/chi-tiet/{id}', 'CTSVController@ChiTiet')->name('ctsv.view.chitiet');

    Route::post('/danh-sach/chi-tiet/store', 'CTSVController@postDuyet')->name('ctsv.post.duyet');

    //xem file excel trước khi tải
    Route::get('xuat-danh-sach-excel', 'ExcelController@viewExcel')->name('ctsv.view.excel');

    //Đăng thông báo cho CTSV
    Route::get('/thong-bao', 'CTSVController@thongbao')->name('ctsv.thongbao.index');

    //thêm mới thông báo
    Route::get('/thong-bao/create', 'CTSVController@getthongbao')->name('ctsv.thongbao.create');
    Route::post('/thong-bao/create', 'CTSVController@postthongbao')->name('ctsv.thongbao.store');

    //Thống kê 1
    Route::get('/thong-ke', 'CTSVController@thongke')->name('ctsv.thongke.index');
    //Thống kê 2
    Route::get('/thong-ke-2', 'CTSVController@thongke2')->name('ctsv.thongke2.index');

    #Ajax chi tiết SV đăng ký
    Route::post('/chi-tiet-dang-ki/{id}', 'CTSVController@detailSVDK')->name('ajax.detail.sv.dangki');
});

Route::get('/chi-tiet-thong-bao/{id}', 'ThongBaoDetailController@getDetail')->name('thongbao.detail');


Auth::routes();
