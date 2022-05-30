@extends('layouts.master')

@section('content')
    <section class="login" style="padding-top: 50px; padding-bottom: 160px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center">Đăng nhập sinh viên</h4>
                </div>
            </div>
            <div class="row" style="justify-content: center;">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            @if(Session::has('err'))
                                <div class="alert alert-danger">{{ Session::get('err')}}</div>
                            @endif
                        </div>
                    </div>
                    <form action="{{ route('sv.post.login') }}" method="POST">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" placeholder="Nhập email" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mật khẩu:</label>
                            <input type="password" class="form-control" placeholder="Nhập mật khẩu" id="pwd" name="password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        <a class="d-block mt-3" href="">Quên mật khẩu?</a>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection