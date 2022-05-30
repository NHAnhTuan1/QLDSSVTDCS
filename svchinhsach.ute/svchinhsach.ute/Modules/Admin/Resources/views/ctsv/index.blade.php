@extends('admin::layouts.master')

@section('content')
    <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Quản lý CTSV</h4>
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
                        <a style="color: white" href="{{ route('admin.ctsv.create') }}" class="btn btn-info"> Thêm mới <i class="fas fa-plus"></i></a>
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
                        <div class="white-box">
                            <h3 class="box-title">Danh sách CTSV</h3>
                            <p>Mật khẩu mặc định: 12345678</p>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            {{-- <th class="border-top-0">#</th> --}}
                                            <th class="border-top-0">Họ tên</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Điện thoại</th>
                                            <th class="border-top-0">Địa chỉ</th>
                                            <th class="border-top-0">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($ctsv as $item)
                                            <tr>
                                                <td>{{ $item->ctsv_ten }}</td>
                                                <td>{{ $item->ctsv_email }}</td>
                                                <td>{{ $item->ctsv_sdt }}</td>
                                                <td>{{ $item->ctsv_diachi }}</td>
                                                
                                                

                                                <td>
                                                    <a href="{{ route('admin.ctsv.edit', $item->id) }}" class="btn btn-warning">
                                                        <i class="far fa-edit"></i>
                                                    </a>

                                                    <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('admin.ctsv.delete', $item->id) }}" class="btn btn-danger">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                 
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            
@endsection
