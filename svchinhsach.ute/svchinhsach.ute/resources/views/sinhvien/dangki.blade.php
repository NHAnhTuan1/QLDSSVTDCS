@extends('layouts.master')

@section('content')
    <section class="list mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center">Đăng ký diện chính sách</h4>
                </div>
                
            </div>

            <form action="{{ route('sv.post.dangki') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    
                    <div class="form-group">
                        <label for="email">Họ và tên:</label>
                        <input readonly="" type="email" class="form-control" id="email" value="{{ $sinhvien[0]->sv_ten }}" name="ten">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Lớp:</label>
                        <input readonly="" type="text" class="form-control" id="pwd" value="{{ $sinhvien[0]->l_ten }}" name="lop">
                    </div>
                    
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pwd">Khoa:</label>
                        <input readonly="" type="text" class="form-control" id="pwd" value="{{ $sinhvien[0]->k_ten }}" name="khoa">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Địa chỉ:</label>
                        <input readonly="" type="text" class="form-control" id="pwd" value="{{ $sinhvien[0]->sv_diachi }}" name="diachi">
                    </div>
                    
                </div>

                <div class="col-md-12">

                    <label for="sel1">Chọn học kỳ:</label>
                        <select class="form-control" id="sel1" style="margin-bottom: 1rem" name="hocki">

                        @foreach ($hocki as $hk)
                            <option value="{{ $hk->id }}">{{ $hk->hk_ma }}</option>
                        @endforeach

                        </select>

                    <label for="sel1">Chọn đối tượng</label>
                    <select class="form-control" id="sel1" style="margin-bottom: 1rem" name="doituong">

                    
                        <option value="{{ $doituong[0]->id }}">{{ $doituong[0]->dt_ten }}</option>
                    

                    </select>
                    

                    
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="pwd">Ảnh minh chứng(có thể chọn nhiều ảnh):</label>
                        <input name="minhchung[]" type="file" multiple="multiple" class="form-control" id="pwd" required>
                        @error('minhchung[]')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Xác nhận đăng ký</button>
                </div>
            </div>
            </form>
        </div>
    </section>
@endsection