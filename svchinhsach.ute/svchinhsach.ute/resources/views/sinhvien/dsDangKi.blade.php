@extends('layouts.master')

@section('content')
    <section class="list mt-5 mb-5" style="min-height: 400px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center">Danh sách đã đăng ký</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <table class="table table-bordered" style="margin-bottom: 90px">
                        <thead>
                            <tr>
                                <th >#</th>
                                <th >Họ và tên</th>
                                <th >Lớp</th>
                                <th >Đối tượng</th>
                                <th >Ngày sinh</th>
                                <th >Trạng thái</th>
                                <th >Học kỳ</th>
                                <th >Ngày đăng ký</th>
                                <th >Ngày duyệt</th>
                                <th >Người duyệt</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt=0;
                            @endphp

                        @if ($list->count() >0)
                            @foreach ($list as $l)

                                @php
                                    $stt++;
                                @endphp
                                <tr>
                                    <td>{{ $stt }}</td>
                                    <td>{{ $l->sv_ten }}</td>
                                    <td>{{ $l->l_ten }}</td>
                                    <td>{{ $l->dt_ten }}</td>
                                    <td>{{ date('d/m/Y', strtotime($l->sv_ngaysinh)) }}</td>
                                    <td>
                                        @if ($l->tinhtrang == 0)
                                            <span class="badge badge-secondary">Chờ duyệt</span>
                                        @endif
                                        @if ($l->tinhtrang == 1)
                                            <span class="badge badge-success">Chấp nhận</span>
                                        @endif
                                        @if ($l->tinhtrang == 2)
                                            <span class="badge badge-warning">Đã hủy</span>
                                        @endif
                                    </td>
                                    <td>{{ $l->hk_ma }}</td>
                                    <td>{{ $l->ngaydangki }}</td>
                                    <td>
                                        @if ($l->ngayduyet == null)
                                            Chưa duyệt
                                        @else
                                            {{ $l->ngayduyet }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($l->ngayduyet == null)
                                        
                                        @else
                                            CTSV
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <span class="text-warning">Bạn chưa đăng ký loại chính sách nào.</span>
                        @endif
                            
                        </tbody>
                    </table>

                </div>
            </div>

            {{-- <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center">Danh sách đăng ký theo học kỳ</h4>
                </div>
                <div class="col-md-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home">219</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">120</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">220</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="container tab-pane active">
                            <br>
                            <h3>HOME</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div id="menu1" class="container tab-pane fade">
                            <br>
                            <h3>Menu 1</h3>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div id="menu2" class="container tab-pane fade">
                            <br>
                            <h3>Menu 2</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
@endsection