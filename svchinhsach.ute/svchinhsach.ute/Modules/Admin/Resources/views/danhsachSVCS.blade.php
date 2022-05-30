@extends('admin::layouts.master')

@section('content')
    <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Sinh viên diện chính sách</h4>
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

                {{-- <div class="row">
                    <div class="col-md-12" style="text-align: right; margin-bottom: 15px;">
                        <a style="color: white" href="{{ route('admin.sv.create') }}" class="btn btn-warning"> Xuất file Excel</a>
                    </div>
                </div> --}}

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
                                <input type="text" class="form-control" placeholder="Nhập tên" name="q" value="{{ \Request::get('q') }}"/>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Tìm</button>
                            </div>

                            
                        </form>

                        <div class="white-box">
                            <h3 class="box-title">Danh sách</h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            {{-- <th class="border-top-0">#</th> --}}
                                            <th class="border-top-0">Mã sinh viên</th>
                                            <th class="border-top-0">Họ tên</th>
                                            <th class="border-top-0">Lớp</th>
                                            <th class="border-top-0">Mã học kỳ</th>
                                            <th class="border-top-0">Loại chính sách</th>
                                            <th class="border-top-0">Hình thức</th>
                                            <th class="border-top-0">Trạng thái</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhsach as $ds)
                                        <tr>
                                            <td>{{ $ds->sv_ma }}</td>
                                            <td>{{ $ds->sv_ten }}</td>
                                            <td>{{ $ds->l_ten }}</td>
                                            <td>{{ $ds->hk_ma }}</td>
                                            <td>{{ $ds->dt_ten }}</td>
                                            <td>{{ $ds->dt_hinhthuc }}</td>

                                            <td>
                                                @if ($ds->tinhtrang == 0)
                                                    <span class="badge bg-primary rounded">Chờ duyệt</span>
                                                @endif
                                                @if ($ds->tinhtrang == 1)
                                                    <span class="badge bg-success rounded">Chấp nhận</span>
                                                @endif
                                                @if ($ds->tinhtrang == 2)
                                                    <span class="badge rounded bg-danger">Hủy</span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('detail.sv.chinhsach', $ds->idSVDTHK) }}" class="btn btn-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                            </td>
                                        </tr>  
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {{ $sinhvien->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
                 
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            
            

@endsection

