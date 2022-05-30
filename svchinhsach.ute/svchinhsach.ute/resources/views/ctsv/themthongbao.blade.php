@extends('ctsv.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <div class="spur-card-title"> Thêm mới thông báo </div>
                </div>
                <div class="card-body ">
                    <form action="{{ route('ctsv.thongbao.store') }}" method="POST">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tiêu đề:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="tb_tieude">
                            @error('tb_tieude')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Nội dung:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tb_noidung"></textarea>
                            @error('tb_noidung')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection