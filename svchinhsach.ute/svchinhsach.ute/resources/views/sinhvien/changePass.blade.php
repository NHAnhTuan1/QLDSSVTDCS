@extends('layouts.master')
@section('content')
<section class="list mt-5" style="margin-bottom: 150px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Thay đổi mật khẩu</h4>
            </div>
        </div>
        <form action="{{ route('sv.post.changePass') }}" method="POST" >
            <div class="row" style="justify-content: center">
                <div class="col-md-6">
                    @if(Session::has('err'))
                        <div class="alert alert-danger">{{ Session::get('err')}}</div>
                    @endif
                </div>
            </div>
            <div class="row" style="justify-content: center">
                <div class="col-md-6">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{ $err }} <br>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="row" style="justify-content: center">
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Mật khẩu cũ:</label>
                        <input name="password_old"  type="password" class="form-control" id="email" value="">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mật khẩu mới:</label>
                        <input name="password_new"  type="password" class="form-control" id="pwd" value="">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Xác nhận mật khẩu mới:</label>
                        <input name="password_new_confirmation" type="password" class="form-control" id="pwd" value="">
                    </div>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
            @csrf
        </form>
    </div>
</section>
@endsection