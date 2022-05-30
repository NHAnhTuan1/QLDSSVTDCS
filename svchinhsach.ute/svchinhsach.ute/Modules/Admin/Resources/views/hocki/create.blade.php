@extends('admin::layouts.master')

@section('content')
    <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Thêm học kỳ</h4>
                    </div>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if(Session::has('status'))
                        <div class="alert alert-success">{{ Session::get('status')}}</div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        @if(Session::has('err'))
                        <div class="alert alert-danger">{{ Session::get('err')}}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        @if (count($errors)>0)
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $err)
                                    {{ $err }} <br>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-12">
                        <div class="card"> 
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="{{ route('admin.hocki.store') }}" method="POST">

                                    

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Mã học kỳ</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" class="form-control p-0 border-0" name="mahocki" placeholder="118" value="{{old('mahocki')}}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Học kỳ</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" class="form-control p-0 border-0" name="hocki" placeholder="1" value="{{old('hocki')}}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Năm học</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" class="form-control p-0 border-0" name="namhoc" placeholder="2018-2019" value="{{old('namhoc')}}"> 
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Thêm</button>
                                            <button type="reset" class="btn btn-warning">Reset</button>
                                        </div>
                                    </div>

                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            
@endsection
