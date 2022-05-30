@extends('ctsv.layout')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                @if(Session::has('success'))
                <div class="alert alert-success">
                {{ Session::get('success')}}
                </div>
                @endif
            </div>
           
            <div class="col-md-12">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#profile">Thông tin cá nhân</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#pass">Đổi mật khẩu</a>
                    </li>
                   
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="profile" class="container tab-pane active">
                        <br>
                        <div class="col-md-12">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="spur-card-title"> Cập nhật thông tin cá nhân </div>
                                </div>
                                <div class="card-body ">
                                    <form action="{{ route('ctsv.update.info') }}" method="POST">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Họ tên</label>
                                            <input required name="ten" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $ctsv[0]->ctsv_ten }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Email</label>
                                            <input disabled type="email" class="form-control" id="exampleFormControlInput1" value="{{ $ctsv[0]->ctsv_email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">SDT</label>
                                            <input required name="sdt" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $ctsv[0]->ctsv_sdt }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Địa chỉ</label>
                                            <input required name="diachi" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $ctsv[0]->ctsv_diachi }}">
                                        </div>
                                        <input name="id"  type="hidden" class="form-control" id="exampleFormControlInput1" value="{{ $ctsv[0]->id }}">
                                        
                                       
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="pass" class="container tab-pane fade">
                        <br>
                        <div class="col-md-12">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="spur-card-title"> Đổi mật khẩu </div>
                                </div>
                                <div class="card-body ">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Mật khẩu cũ</label>
                                            <input type="password" class="form-control" id="exampleFormControlInput1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Mật khẩu mới</label>
                                            <input type="password" class="form-control" id="exampleFormControlInput1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Xác mật khẩu mới</label>
                                            <input type="password" class="form-control" id="exampleFormControlInput1" >
                                        </div>
                                        
                                        
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection