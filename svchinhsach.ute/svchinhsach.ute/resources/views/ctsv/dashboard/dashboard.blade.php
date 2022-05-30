@extends('ctsv.layout')

@section('content')

    <div class="row">
        <div class="col-xl-4">
            <div class="stats stats-primary">
                <h3 class="stats-title"> Tổng số lượt đăng ký </h3>
                <div class="stats-content">
                    
                    <div class="stats-data">
                        <div class="stats-number">{{ $tongsvDK }}</div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="stats stats-success ">
                <h3 class="stats-title"> Chờ duyệt </h3>
                <div class="stats-content">
                    
                    <div class="stats-data">
                        <div class="stats-number">{{ $chuaduyet }}</div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="stats stats-danger">
                <h3 class="stats-title"> Bị hủy </h3>
                <div class="stats-content">
                    
                    <div class="stats-data">
                        <div class="stats-number">{{ $huy }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection