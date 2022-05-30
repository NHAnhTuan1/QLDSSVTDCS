@extends('ctsv.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('ctsv.thongbao.create') }}">
                <button type="button" class="btn btn-success mb-1">Thêm mới</button>
            </a>
        </div>
        <div class="col-md-12">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="spur-card-title">Quản lý thông báo</div>
                </div>
                <div class="card-body ">
                    <table class="table table-in-card">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Người đăng</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @foreach ($thongbao as $tb)
                            <tr>
                                <th scope="row">{{ $tb->id }}</th>
                                <td style="max-width: 250px;">{{ $tb->tb_tieude }}</td>
                                <td>{{ $tb->ctsv_ten }}</td>
                                <td>{{ date('d/m/Y', strtotime($tb->created_at)) }}</td>
                                <td>
                                    <a href="" class="btn btn-warning">Sửa</a>
                                    <a href="" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                           
                            
                        </tbody>
                    </table>
                    {{ $thongbao->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection