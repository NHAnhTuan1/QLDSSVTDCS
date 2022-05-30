@extends('layouts.master')

@section('content')
    <section class="list mt-5" style="margin-bottom: 60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center">Thông tin cá nhân</h4>
                </div>
            </div>
            <form action="{{ route('sv.post.info') }}" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Họ và tên:</label>
                            <input readonly="" type="text" class="form-control" id="email" value="{{ $sinhvien[0]->sv_ten }}">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Lớp:</label>
                            <input readonly="" type="text" class="form-control" id="pwd" value="{{ $sinhvien[0]->l_ten }}">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Khoa:</label>
                            <input readonly="" type="text" class="form-control" id="pwd" value="{{ $sinhvien[0]->k_ten }}">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Địa chỉ:</label>
                            <input name="diachi" type="text" class="form-control" id="pwd" value="{{ $sinhvien[0]->sv_diachi }}">
                            @error('diachi')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="sel1">Giới tính:</label>
                        <select name="gioitinh" class="form-control" id="sel1" style="margin-bottom: 1rem">
                            <option value="1" {{ ($sinhvien[0]->sv_gioitinh == 1)?'selected':'' }}>Nam</option>
                            <option value="0" {{ ($sinhvien[0]->sv_gioitinh == 0)?'selected':'' }}>Nữ</option>
                        </select>
                        <div class="form-group">
                            <label for="pwd">Ngày sinh:</label>
                            <input name="ngaysinh" type="date" class="form-control" id="pwd" value="{{ $sinhvien[0]->sv_ngaysinh }}">
                            @error('ngaysinh')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pwd">Số điện thoại:</label>
                            <input name="sdt" type="text" class="form-control" id="pwd" value="{{ $sinhvien[0]->sv_sdt }}">
                            @error('sdt')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pwd">CMND:</label>
                            <input name="cmnd" type="text" class="form-control" id="pwd" value="{{ $sinhvien[0]->sv_cmnd }}">
                            @error('cmnd')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </section>
@endsection