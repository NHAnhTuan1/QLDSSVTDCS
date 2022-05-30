@extends('ctsv.layout')

@section('content')

    <div class="row">
        {{-- @php
            
            echo "<pre>";
            print_r ($chitiet);
            // print_r ($minhchung);
            echo "</pre>";

        @endphp --}}
        <div class="col-md-12">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <div class="spur-card-title"> Chi tiết đăng ký của sinh viên: {{ $chitiet[0]->sv_ten }}</div>
                </div>
                <div class="card-body ">
                    <form action="{{ route('ctsv.post.duyet') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Họ và tên: </label>
                            <input readonly type="text" class="form-control" id="exampleFormControlInput1" value="{{ $chitiet[0]->sv_ten }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Lớp: </label>
                            <input readonly type="text" class="form-control" id="exampleFormControlInput1" value="{{ $chitiet[0]->l_ten }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Khoa: </label>
                            <input readonly type="text" class="form-control" id="exampleFormControlInput1" value="{{ $chitiet[0]->k_ten }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Địa chỉ: </label>
                            <input readonly type="text" class="form-control" id="exampleFormControlInput1" value="{{ $chitiet[0]->sv_diachi }}">
                        </div>
            
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Năm sinh: </label>
                            <input readonly type="date" class="form-control" id="exampleFormControlInput1" value="{{ $chitiet[0]->sv_ngaysinh }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">CMND: </label>
                            <input readonly type="text" class="form-control" id="exampleFormControlInput1" value=" {{$chitiet[0]->sv_cmnd }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Số điện thoại: </label>
                            <input readonly type="text" class="form-control" id="exampleFormControlInput1" value=" {{$chitiet[0]->sv_sdt }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email: </label>
                            <input readonly type="text" class="form-control" id="exampleFormControlInput1" value=" {{$chitiet[0]->sv_email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tên đối tượng: </label>
                            <input readonly type="text" class="form-control" id="exampleFormControlInput1" value=" {{$chitiet[0]->dt_ten }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Học kỳ: </label>
                            <input readonly type="text" class="form-control" id="exampleFormControlInput1" value="{{ $chitiet[0]->hk_ma }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Các ảnh minh chứng:(Click vào để xem) </label>
                            <ul>

                            @foreach ($minhchung as $mc)
                                <li>
                                    <a target="_blank" href="{{ $mc->mc_file }}">{{ $mc->mc_file }}</a>
                                </li>
                            @endforeach
                                

                            </ul>
                        </div>
                        
                        @if ($chitiet[0]->tinhtrang == 0)
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Duyệt</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="tinhtrang">
                                    <option value="1">Chấp nhận</option>
                                    <option value="2">Không chấp nhận</option>
                                </select>
                            </div>
                        @endif

                        
                        <div class="form-group">
                            <input readonly type="hidden" class="form-control" id="exampleFormControlInput1" value=" {{$chitiet[0]->chinhsach_id }}" name="chinhsach_id">
                        </div>

                        
                        @if ($chitiet[0]->tinhtrang == 0)
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        @else
                            <small class="text-danger d-block">Không thể duyệt lần 2</small>
                            <button disabled type="button" class="btn btn-primary">Tạm khóa duyệt</button>
                        @endif
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection

{{-- <div class="card spur-card">
    <div class="card-header">
        <div class="spur-card-icon">
            <i class="fas fa-chart-bar"></i>
        </div>
        <div class="spur-card-title"> Simple Form </div>
    </div>
    <div class="card-body ">
        
            <div class="form-group">
                <label for="exampleFormControlInput1">Họ và tên: </label>
                <input readonly type="text" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Lớp: </label>
                <input readonly type="text" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Khoa: </label>
                <input readonly type="text" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Địa chỉ: </label>
                <input readonly type="text" class="form-control" id="exampleFormControlInput1" >
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Năm sinh: </label>
                <input readonly type="text" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">CMND: </label>
                <input readonly type="text" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Số điện thoại: </label>
                <input readonly type="text" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email: </label>
                <input readonly type="text" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Tình trạng</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    
                    <option value="1">Chấp nhận</option>
                    <option value="2">Không chấp nhận</option>
                    
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Xác nhận</button>
            
    </div>
</div> --}}