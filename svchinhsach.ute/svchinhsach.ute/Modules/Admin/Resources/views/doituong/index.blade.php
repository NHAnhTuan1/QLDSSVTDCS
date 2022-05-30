@extends('admin::layouts.master')

@section('content')
    <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Quản lý loại chính sách</h4>
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
                        <a style="color: white" href="{{ route('admin.doituong.create') }}" class="btn btn-info"> Thêm mới <i class="fas fa-plus"></i></a>
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
                            <h3 class="box-title">Danh sách loại chính sách</h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            {{-- <th class="border-top-0">#</th> --}}
                                            <th class="border-top-0">Tên loại chính sách</th>
                                            <th class="border-top-0">Hình thức miễn giảm</th>
                                            {{-- <th class="border-top-0">Mô tả</th> --}}
                                            <th class="border-top-0">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($doituong as $dt)
                                        <tr>
                                            {{-- <td>{{ $dt->id }}</td> --}}
                                            <td>{{ $dt->dt_ten }}</td>
                                            <td>{{ $dt->dt_hinhthuc }}%</td>
                                            {{-- <td>{{ $dt->dt_mota }}</td> --}}

                                            <td>
                                                <a href="{{ route('admin.doituong.edit', $dt->id) }}" class="btn btn-warning">
                                                    <i class="far fa-edit"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('admin.doituong.delete', $dt->id) }}" class="btn btn-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>

                                                <button data-href="{{ route('ajax.admin.doituong.detail', $dt->id) }}" class="btn btn-info detailDoiTuong">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{-- {{ $khoa->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
                 
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

           <!-- The Modal -->
            <div class="modal" id="DTModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Chi tiết loại chính sách</h4>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            Phun ajax
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" id="closeModal" class="btn btn-danger " data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            
@endsection

@section('script')
    <script>
        $('.detailDoiTuong').click(function (e) { 
            e.preventDefault();
            var url = $(this).attr('data-href');

            $.post(url, function(data){
                
                $('#DTModal .modal-body').html(data);
                $('#DTModal').show();
            });
        });


        $('#closeModal').click(function (e) { 
            e.preventDefault();
            $('#DTModal').css('display', 'none');
        });

    </script>
@endsection
