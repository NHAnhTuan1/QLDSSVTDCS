@extends('admin::layouts.master')

@section('content')
    <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Quản lý học kỳ</h4>
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
                        <a style="color: white" href="{{ route('admin.hocki.create') }}" class="btn btn-info"> Thêm mới <i class="fas fa-plus"></i></a>
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
                            <h3 class="box-title">Danh sách học kì</h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            {{-- <th class="border-top-0">#</th> --}}
                                            <th class="border-top-0">Mã học kì</th>
                                            <th class="border-top-0">Học kỳ</th>
                                            <th class="border-top-0">Năm học</th>
                                            <th class="border-top-0">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($hocki as $hk)
                                        <tr>
                                            {{-- <td>{{ $hk->id }}</td> --}}
                                            <td>{{ $hk->hk_ma }}</td>
                                            <td>{{ $hk->hk_hocki }}</td>
                                            <td>{{ $hk->hk_namhoc }}</td>
                                            

                                            <td>
                                                <a href="{{ route('admin.hocki.edit', $hk->id) }}" class="btn btn-warning">
                                                    <i class="far fa-edit"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('admin.hocki.delete', $hk->id) }}" class="btn btn-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{ $hocki->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                 
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            
@endsection
