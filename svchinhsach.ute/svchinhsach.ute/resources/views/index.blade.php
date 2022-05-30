@extends('layouts.master')

@section('content')
    <style>
        .dskhoa .item{
            border: 1px solid gray;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            text-transform: uppercase;
            font-weight: 600;
            cursor: pointer;
        }
        .dskhoa .item:hover{
            background-color: #343a40;
            transition: 0.4s; 
            color: #fff;
        }
    </style>

    <section id="slider" >
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ul>
                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://1.bp.blogspot.com/-lNm0Yt0ys4E/XWhwReVtAqI/AAAAAAAAQkE/YGO-tio8Lq05nnGe-osMFu363aadw_2QgCLcBGAs/s1600/29082019_7.png"   >
                            </div>
                            <div class="carousel-item">
                                <img src="https://trangedu.com/wp-content/uploads/2020/04/tuyen-sinh-dh-spkt-da-nang.jpg"  >
                            </div>
                            <div class="carousel-item">
                                <img src="https://icdn.dantri.com.vn/thumb_w/640/2018/8/16/img4853-1534415795834775671743.jpg" >
                            </div>
                        </div>
                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
                <!--End slide-->
                <div class="col-md-5">
                    <div class="tuyensinh bg-info">
                        <img src="https://ute.udn.vn/Upload/2021/banner/2020.jpg" alt="" width="100%">
                    </div>
                    <br>
                    <div class="tuyensinh bg-info">
                        <img src="https://ute.udn.vn/Upload/2021/banner/tptt2021.jpg" alt="" width="100%">
                    </div>
                    <br>
                    <div class="tuyensinh bg-info">
                        <img src="https://ute.udn.vn/images/banner-ute-3.jpg" alt="" width="100%">
                    </div>
                    <br>
                    
                </div>
            </div>
            <hr>
        </div>
        
    </section>
    <!-- end slider -->
    <section class="dsdoituong mt-5 mb-5" >
        <div class="container">
            
            <div class="row mb-3">
                <div class="col-md-12">
                    <h4 class="text-center" style="font-weight: 600">Thông báo từ Phòng CTSV</h4>
                </div>
            </div>
            <div class="row" style="overflow-y: scroll; height: 250px;">
    
            @foreach ($thongbao as $tb)
                <div class="col-md-12">
                    <div class="thongbao d-flex">
                        <div class="date">
                            <p class="mb-0">{{ date('d', strtotime($tb->created_at)) }}</p>
                            <p class="mb-0">{{ date('m-Y', strtotime($tb->created_at)) }}</p>
                        </div>
                        <div class="info">
                            <a href="{{ route('thongbao.detail', [$tb->id]) }}">{{ $tb->tb_tieude }}</a>
                        </div>
                    </div>
                    <hr>
                </div>
            @endforeach
                
            </div>
        </div>
    </section>
    <!-- end list -->

    <!--Gioi thieu truong-->
    <section class="mt-5 mb-5">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h1 style="font-weight: 600">Giới thiệu</h1>
                    <p style="font-size: 16px">Trường Đại học Sư phạm Kỹ thuật Đà Nẵng là một trường đại học chuyên ngành về khối ngành kỹ thuật tại Việt Nam, được đánh giá là một trong những trường đại học đầu ngành về đào tạo khối ngành kỹ thuật tại Miền Trung Việt Nam.</p>
                    <p>
                        Tiền thân là trường Kỹ thuật Đà Nẵng, Trường Đại học Sư phạm Kỹ thuật Đà Nẵng là một trong 6 trường Đại học Sư phạm Kỹ thuật của cả nước – đào tạo kỹ thuật lấy ứng dụng làm trọng tâm để giảng dạy, có chức năng đào tạo kỹ sư công nghệ, kỹ sư theo định hướng ứng dụng và giáo viên kỹ thuật.
                    </p>
                </div>
                <!--End left-->

                <div class="col-md-6">
                    <div>
                        <img src="https://luyenthidaminh.vn/wp-content/uploads/2021/08/diem-chuan-dh-spkt-da-nang.jpg" alt="" width="100%">
                    </div>
                </div>
                <!--End right Img-->
            </div>
        </div>
    </section>
    <!--End Gioi thieu truong-->


    <section class="dsdoituong mt-5 mb-5" >
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center" style="font-weight: 600">Danh sách loại chính sách</h4>
                    <br>
                </div>
            </div>
            <div class="row">
            
            @foreach ($doituong as $d)
                <div class="col-md-3">
                    <div class="card mb-3" >
                        {{-- <img style="padding: 20px" class="card-img-top" src="{{ URL::asset('public/fe/images/avt1.png') }}" alt="Card image"> --}}
                        <div class="text-center">
                            <i style="font-size: 150px" class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title" style="font-size: 20px;font-weight: 600;">{{ $d->dt_ten }}</h4>
                            <a href="{{ route('get.detail.dt', [Str::slug($d->dt_ten),$d->id]) }}" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach  
                
            </div>
            <hr>
        </div>
    </section>
    <!-- end list -->

    <!--Các khoa-->
    <section class="mt-5 mb-5 dskhoa">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center mb-5" style="font-weight: 600">Danh sách các khoa</h4>
                </div>
                @foreach ($khoa as $item)
                    <div class="col-md-3">
                        <div class="item mb-3">
                            <span class="icon">
                                <i style="font-size: 30px" class="fab fa-yelp"></i>
                            </span>
                            <span style="font-size: 18px">&nbsp; {{ $item->k_ten }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>   
    <!--End Các khoa-->

@endsection
