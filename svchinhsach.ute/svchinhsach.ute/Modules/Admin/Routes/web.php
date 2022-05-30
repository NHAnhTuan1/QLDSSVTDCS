<?php

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

use Illuminate\Support\Facades\Route;
//đăng nhập admin
Route::prefix('authenticate')->group(function () {
    //--Login
    Route::get('/login', 'AdminAuthController@getLogin')->name('admin.get.login');
    Route::post('/login', 'AdminAuthController@postLogin')->name('admin.post.login');

    //LogOut
    Route::get('/logout', 'AdminAuthController@logOut')->name('admin.get.logout');
});



Route::prefix('api-admin')->middleware('CheckLoginAdmin')->group(function() {
    //trang dashboad chính
    Route::get('/', 'AdminController@index')->name('admin.dashboard');


    //Route quản lí KHOA
    Route::prefix('khoa')->group(function () {
        //--xem
        Route::get('/', 'AdminKhoaController@index')->name('admin.khoa.index');

        //--thêm
        Route::get('/create', 'AdminKhoaController@create')->name('admin.khoa.create');
        Route::post('/create', 'AdminKhoaController@store')->name('admin.khoa.store');

        //--sửa
        Route::get('/edit/{id}', 'AdminKhoaController@edit')->name('admin.khoa.edit');
        Route::post('/edit', 'AdminKhoaController@update')->name('admin.khoa.update');

        //--xóa
        Route::get('/delete/{id}', 'AdminKhoaController@delete')->name('admin.khoa.delete');
    });


    //Route quản lí LỚP
    Route::prefix('lop')->group(function () {
        //--xem
        Route::get('/', 'AdminLopController@index')->name('admin.lop.index');

        //--thêm
        Route::get('/create', 'AdminLopController@create')->name('admin.lop.create');
        Route::post('/create', 'AdminLopController@store')->name('admin.lop.store');

        //--sửa
        Route::get('/edit/{id}', 'AdminLopController@edit')->name('admin.lop.edit');
        Route::post('/edit', 'AdminLopController@update')->name('admin.lop.update');

        //xóa
        Route::get('/delete/{id}', 'AdminLopController@delete')->name('admin.lop.delete');
    });


    //Route quản lí Sinh viên
    Route::prefix('sinhvien')->group(function () {
        //--xem
        Route::get('/', 'AdminSinhVienController@index')->name('admin.sv.index');

        //--thêm
        Route::get('/create', 'AdminSinhVienController@create')->name('admin.sv.create');
        Route::post('/create', 'AdminSinhVienController@store')->name('admin.sv.store');

        //--sửa
        Route::get('/edit/{id}', 'AdminSinhVienController@edit')->name('admin.sv.edit');
        Route::post('/edit', 'AdminSinhVienController@update')->name('admin.sv.update');

        //--xóa
        Route::get('/delete/{id}', 'AdminSinhVienController@delete')->name('admin.sv.delete');
    });



    //Route quản lí Đối tượng
    Route::prefix('doituong')->group(function () {
        //--xem
        Route::get('/', 'AdminDoiTuongController@index')->name('admin.doituong.index');

        //--thêm
        Route::get('/create', 'AdminDoiTuongController@create')->name('admin.doituong.create');
        Route::post('/create', 'AdminDoiTuongController@store')->name('admin.doituong.store');

        //--sửa
        Route::get('/edit/{id}', 'AdminDoiTuongController@edit')->name('admin.doituong.edit');
        Route::post('/edit', 'AdminDoiTuongController@update')->name('admin.doituong.update');

        //--xóa
        Route::get('/delete/{id}', 'AdminDoiTuongController@delete')->name('admin.doituong.delete');

        //Detail Ajax
        Route::post('/detail/{id}', 'AdminDoiTuongController@detailDT')->name('ajax.admin.doituong.detail');
    });

    //Route quản lí Học kỳ
    Route::prefix('hocki')->group(function () {
        //--xem
        Route::get('/', 'AdminHocKiController@index')->name('admin.hocki.index');

        //--thêm
        Route::get('/create', 'AdminHocKiController@create')->name('admin.hocki.create');
        Route::post('/create', 'AdminHocKiController@store')->name('admin.hocki.store');

        //--sửa
        Route::get('/edit/{id}', 'AdminHocKiController@edit')->name('admin.hocki.edit');
        Route::post('/edit', 'AdminHocKiController@update')->name('admin.hocki.update');

        //--xóa
        Route::get('/delete/{id}', 'AdminHocKiController@delete')->name('admin.hocki.delete');

    });

    //Route quản lí CTSV
    Route::prefix('ctsv')->group(function () {
        //--xem
        Route::get('/', 'AdminCTSVController@index')->name('admin.ctsv.index');

        //--thêm
        Route::get('/create', 'AdminCTSVController@create')->name('admin.ctsv.create');
        Route::post('/create', 'AdminCTSVController@store')->name('admin.ctsv.store');

        //--sửa
        Route::get('/edit/{id}', 'AdminCTSVController@edit')->name('admin.ctsv.edit');
        Route::post('/edit', 'AdminCTSVController@update')->name('admin.ctsv.update');

        //--xóa
        Route::get('/delete/{id}', 'AdminCTSVController@delete')->name('admin.ctsv.delete');

    });


    Route::prefix('danh-sach-sv-chinh-sach')->group(function (){
        # code...
        Route::get('/', 'AdminDSSVChinhSachController@getDanhSachSVChinhSach')->name('get.sv.chinhsach');

        #Xem Chi tiết
        Route::get('/chi-tiet/{id}', 'AdminDSSVChinhSachController@detailDanhSachSVChinhSach')->name('detail.sv.chinhsach');
        Route::post('/chi-tiet', 'AdminDSSVChinhSachController@postDanhSachSVChinhSach')->name('post.sv.chinhsach');
    });


    //Route quản lí Thống kê
    Route::prefix('thongke')->group(function () {
        //--xem
        Route::get('/khoa', 'AdminThongKeController@thongkekhoa')->name('admin.thongke.khoa');

        //--thêm
        // Route::get('/create', 'AdminCTSVController@create')->name('admin.ctsv.create');
        // Route::post('/create', 'AdminCTSVController@store')->name('admin.ctsv.store');

        //--sửa
        // Route::get('/edit/{id}', 'AdminCTSVController@edit')->name('admin.ctsv.edit');
        // Route::post('/edit', 'AdminCTSVController@update')->name('admin.ctsv.update');

        //--xóa
        // Route::get('/delete/{id}', 'AdminCTSVController@delete')->name('admin.ctsv.delete');

    });

    
});
