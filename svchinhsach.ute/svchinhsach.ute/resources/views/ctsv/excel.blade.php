@extends('ctsv.layout')

@section('content')

    {{-- @php
        echo "<pre>";
        print_r ($excel);
        echo "</pre>";
    @endphp --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="spur-card-title">Danh sách sinh viên thuộc diện chính sách</div>
                </div>
                <div class="card-body ">
                    <table class="table table-in-card" id="table2excel">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Lớp</th>
                                <th scope="col">Đối tượng</th>
                                <th scope="col">Ngày sinh</th>
                                <th scope="col">Hình thức</th>
                                <th scope="col">Mã học kỳ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt=1;
                            @endphp
                        @foreach ($excel as $ex)
                            <tr>
                                <th scope="row">{{ $stt++ }}</th>
                                <td>{{ $ex->sv_ten }}</td>
                                <td>{{ $ex->l_ten }}</td>
                                <td>{{ $ex->dt_ten }}</td>
                                <td>{{ date('d/m/Y', strtotime($ex->sv_ngaysinh)) }}</td>
                                <td>{{ $ex->dt_hinhthuc }}</td>
                                <td>{{ $ex->hk_ma }}</td>

                            </tr>
                        @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <button type="button" class="btn btn-secondary mb-1" id="xuat">Tải xuống(Excel)</button>
        </div>
    </div>


@endsection