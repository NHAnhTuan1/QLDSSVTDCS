@extends('admin::layouts.master')

@section('content')
    <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Sửa đối tượng</h4>
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
                                <form class="form-horizontal form-material" action="{{ route('admin.doituong.update') }}" method="POST">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">ID</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input readonly type="text" class="form-control p-0 border-0" name="id" placeholder="Hộ nghèo" value="{{ $doituong[0]->id}}"> 
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Tên đối tượng</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" class="form-control p-0 border-0" name="ten" placeholder="Hộ nghèo" value="{{old('ten', $doituong[0]->dt_ten)}}"> 
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Hình thức miễn giảm(%)</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="number" class="form-control p-0 border-0" name="hinhthuc" min="0" max="100" placeholder="30" value="{{old('hinhthuc', $doituong[0]->dt_hinhthuc)}}"> 
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Mô tả</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <textarea name="mota" rows="3" class="form-control p-0 border-0">{{old('mota', $doituong[0]->dt_mota)}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Cập nhật</button>
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
