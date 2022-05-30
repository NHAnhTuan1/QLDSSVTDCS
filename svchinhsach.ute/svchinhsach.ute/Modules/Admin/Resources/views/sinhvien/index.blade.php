@extends('admin::layouts.master')

@section('content')
    <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Quản lý sinh viên</h4>
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
                    <div class="col-md-12" style="text-align: right; margin-bottom: 15px;">
                        <a style="color: white" href="{{ route('admin.sv.create') }}" class="btn btn-info"> Thêm mới <i class="fas fa-plus"></i></a>
                    </div>
                </div>
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
                    <div class="col-sm-12">
                        <!--Form tìm kiếm-->
                        <form class="row g-3" method="GET">
                            
                            <div class="col-auto">
                                <input type="text" class="form-control" placeholder="Nhập tên" name="q" value="{{ \Request::get('q') }}" />
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Tìm</button>
                            </div>

                            
                        </form>


                        <div class="white-box">
                            <h3 class="box-title">Danh sách sinh viên</h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            {{-- <th class="border-top-0">#</th> --}}
                                            <th class="border-top-0">Mã sinh viên</th>
                                            <th class="border-top-0">Họ tên</th>
                                            <th class="border-top-0">Lớp</th>
                                            <th class="border-top-0">Ngày sinh</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Số điện thoại</th>
                                            <th class="border-top-0">Địa chỉ</th>
                                            <th class="border-top-0">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($sinhvien->count() >0)
                                            @foreach ($sinhvien as $sv)
                                                <tr>
                                                    {{-- <td>{{ $sv->id }}</td> --}}
                                                    <td>{{ $sv->sv_ma }}</td>
                                                    <td>{{ $sv->sv_ten }}</td>
                                                    <td>{{ $sv->l_ten }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($sv->sv_ngaysinh)) }}</td>
                                                    <td>{{ $sv->sv_email }}</td>
                                                    <td>{{ $sv->sv_sdt }}</td>
                                                    <td>{{ $sv->sv_diachi }}</td>
                                                    
                                                    <td>
                                                        <a href="{{ route('admin.sv.edit', $sv->id) }}" class="btn btn-warning">
                                                            <i class="far fa-edit"></i>
                                                        </a>

                                                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('admin.sv.delete', $sv->id) }}" class="btn btn-danger">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @else
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Không tìm thấy bản ghi</strong>
                                        </div>
                                        @endif
                                    
                                    </tbody>
                                </table>
                                {{ $sinhvien->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                 
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            
@endsection
