@extends('ctsv.layout')

@section('content')
    <div class="row">
        <div class="col-md-8">

            <!--Form tìm kiếm-->
            <form class="form-inline"  method="GET">
                <input type="text" class="form-control" placeholder="Tên" name="ten" value="{{ \Request::get('ten') }}"> 

                <span>&nbsp;</span>

                <select class="form-control" name="hk">
                    <option value="">-- Học kỳ --</option>

                    @foreach ($hocki as $hk)
                        <option {{ (\Request::get('hk') == $hk->id)?'selected':'' }} value="{{ $hk->id }}">{{ $hk->hk_ma }}</option>
                    @endforeach

                </select>
                <span>&nbsp;</span>
                <button type="submit" class="btn btn-info">Tìm</button>
            </form>


        </div>
        <div class="col-md-4">
            <a href="{{ route('ctsv.view.excel') }}" class="btn btn-warning mb-1" style="float: right"><i class="far fa-file-excel">&nbsp</i>Xuất file Excel</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="spur-card-title">Danh sách sinh viên đăng ký diện chính sách</div>
                </div>
                <div class="card-body ">
                    <table class="table table-in-card">
                        <thead>
                            <tr>
                                {{-- <th scope="col">#</th> --}}
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Lớp</th>
                                <th scope="col">Đối tượng</th>
                                <th scope="col">Mã học kỳ</th>
                                <th scope="col">Tình trạng</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        @foreach ($cs as $c)
                            
                            <tr>
                                {{-- <th scope="row">{{ $c->chinhsach_id }}</th> --}}
                                <td>{{ $c->sv_ten }}</td>
                                <td>{{ $c->l_ten }}</td>
                                <td>{{ $c->dt_ten }}</td>
                                <td>{{ $c->hk_ma }}</td>
                                <td>

                                    @if ( $c->tinhtrang == 0 )
                                        <span class="badge badge-secondary">Chờ duyệt</span>
                                    @endif
                                    @if ( $c->tinhtrang == 1 )
                                        <span class="badge badge-success">Chấp nhận</span> 
                                    @endif
                                    @if ( $c->tinhtrang == 2 )
                                        <span class="badge badge-danger">Không chấp nhận</span>
                                    @endif
                                    
                                </td>
                                <td>
                                    <a href="{{ route('ctsv.view.chitiet', $c->chinhsach_id) }}" data-toggle="tooltip" title="Duyệt" class="btn btn-info"><i class="fas fa-arrow-alt-circle-right"></i></a>

                                    <button data-href="{{ route('ajax.detail.sv.dangki', $c->chinhsach_id) }}" class="btn btn-success mb-1 chitietDK">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                            
                            
                            
                        </tbody>
                    </table>
                    {{ $cs->links() }}
                </div>
            </div>
        </div>
        
    </div>
    <!-- The Modal -->
    <div class="modal fade" id="chitietSVModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Chi tiết đăng ký: </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>  
@endsection

@section('script')
    <script>
        $('.chitietDK').click(function (e) { 
            e.preventDefault();
            var url = $(this).attr('data-href');
            $.post(url, function(data){


                $('#chitietSVModal .modal-body').html(data);
                $('#chitietSVModal').modal();
            });


            // $('#chitietSVModal .modal-body').html();
            // $('#chitietSVModal').modal();
        });
    </script>
@endsection