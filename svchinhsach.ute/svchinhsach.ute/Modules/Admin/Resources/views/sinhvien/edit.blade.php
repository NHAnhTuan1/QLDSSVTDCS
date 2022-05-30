
@extends('admin::layouts.master')

@section('content')
    <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Sửa sinh viên</h4>
                    </div>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if(Session::has('status'))
                        <div class="alert alert-success">{{ Session::get('status')}}</div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        @if(Session::has('err'))
                        <div class="alert alert-danger">{{ Session::get('err')}}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        @if (count($errors)>0)
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $err)
                                    {{ $err }} <br>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <form class="form-horizontal form-material" action="{{ route('admin.sv.update') }}" method="POST">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">ID</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input readonly name="sv_id" type="text"  class="form-control p-0 border-0" value="{{ $sv[0]->id }}"> 
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Mã sinh viên</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input name="sv_ma" type="text"  class="form-control p-0 border-0" value="{{ $sv[0]->sv_ma }}"> 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Tên sinh viên</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input name="sv_ten" type="text"  class="form-control p-0 border-0" value="{{ $sv[0]->sv_ten }}"> 
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Lớp</label>

                                        <div class="col-sm-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control-line" name="sv_lop">

                                                @foreach ($lop as $l)
                                                    <option {{ ($l->id == $sv[0]->lop_id)?'selected':'' }}
                                                    
                                                    value="{{ $l->id }}">{{ $l->l_ten }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Địa chỉ</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input name="sv_diachi" type="text"  class="form-control p-0 border-0" value="{{ $sv[0]->sv_diachi }}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Ngày sinh</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input name="sv_ngaysinh" type="date" class="form-control p-0 border-0" value="{{ $sv[0]->sv_ngaysinh }}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input name="sv_email" type="text"  class="form-control p-0 border-0" value="{{ $sv[0]->sv_email }}" readonly>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Mật khẩu</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  class="form-control p-0 border-0" value="12345678" readonly name="sv_password">
                                        </div>
                                    </div> --}}

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Số điện thoại</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  class="form-control p-0 border-0" name="sv_sdt" value="{{ $sv[0]->sv_sdt }}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">CMND</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  class="form-control p-0 border-0" name="sv_cmnd" value="{{ $sv[0]->sv_cmnd }}">
                                        </div>
                                    </div>

                                    
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Giới tính</label>

                                        <div class="col-sm-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control-line" name="sv_gioitinh">
                                                <option value="1" {{ ($sv[0]->sv_gioitinh == 1)?'selected':'' }}>Nam</option>
                                                <option value="0" {{ ($sv[0]->sv_gioitinh == 0)?'selected':'' }}>Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Cập nhật</button>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            {{-- end card --}}
                        </div>
                       
                        
                        @csrf
                    </form>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            
@endsection
