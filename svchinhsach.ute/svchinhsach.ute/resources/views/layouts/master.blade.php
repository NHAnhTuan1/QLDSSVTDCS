<!doctype html>
<html lang="en">

<head>
    <title>Trường Đại học Sư phạm Kỹ thuật</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- JS -->
    <script src="{{ URL::asset('public/fe/assets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('public/fe/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/fe/assets/js/app.js') }}"></script>

    <!--  Favicon -->
    <link rel="shortcut icon" href="http://daotao.ute.udn.vn/images/favicon.ico" type="image/x-icon">
    <!--  CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/fe/assets/plugins/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/fe/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/fe/assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/fe/assets/css/global.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/fe/assets/css/style.css') }}">

    <!-- --Google font-- -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">

    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
        width: 100%;
        height: 400px;
        }

        footer ul li a{
            color: white;
            padding: 5px 12px;
        }
       
    </style>



</head>

<body style="background: #f7f7f7">
    <div id="wrapper">
        <head >
            
            <nav class="navbar navbar-expand-md bg-dark navbar-dark mb-3" style="z-index: 8">
                <div class="container">
                    
                
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img style="max-width: 70%" src="http://daotao.ute.udn.vn/images/headerx.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar" style="justify-content: flex-end;">
                    <ul class="navbar-nav">


                        @if (Auth::guard('sinhvien')->check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('timkiem.index') }}">Tìm kiếm</a>
                            </li>

                            <!-- Dropdown -->
                            <li class="nav-item dropdown profile">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    {{ get_data_user('sinhvien', 'sv_ten') }}
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('sv.get.info') }}">Thông tin cá nhân</a>
                                    <a class="dropdown-item" href="{{ route('sv.get.xemDT') }}">Danh sách đăng ký</a>
                                    <a class="dropdown-item" href="{{ route('sv.get.changePass') }}">Thay đổi mật khẩu</a>
                                    <a class="dropdown-item" href="{{ route('sv.get.logout') }}">Đăng xuất</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://ute.udn.vn/default.aspx">Liên hệ</a>
                            </li>
                           
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('timkiem.index') }}">Tìm kiếm</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sv.get.login') }}">Đăng nhập sinh viên</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ctsv.get.login') }}">Đăng nhập CTSV</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://ute.udn.vn/default.aspx">Liên hệ</a>
                            </li>
                        @endif
                         
                        
                    </ul>
                </div>
            </nav>
    </div>
            
        </head>
        <!-- end head -->
        <div id="wp-content">

            <section class="tbao">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @if(Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success')}}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>

            {{-- các thẻ section ở đây --}}
            @yield('content')
            {{-- end --}}

        </div>
        <!-- end wp-content -->
        <footer style="background: #343a40; padding: 15px 0">
            <div class="container">
                <div class="row pt-5 pb-5">
                    <div class="col-md-12 text-center text-white">
                        <h2>UTE - Trường Đại Học Sư Phạm Kỹ Thuật Đà Nẵng</h2>
                        <p>Hệ thống đăng ký sinh viên diện chính sách trực tuyến</p>
                        <p>Địa chỉ: 48 Cao Thắng, Hải Châu, TP. Đà Nẵng</p>

                        <ul class="d-flex" style="list-style: none;
                        justify-content: center;">
                            <li>
                                <a style="display: inline-block" href="">Điều khoản sử dụng</a>
                            </li>
                            <li>
                                <a style="display: inline-block" href="">Liên hệ nhà trường</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--End row-->
            </div>     
        </footer>
    </div>

    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
    </script>
    @yield('script')
</body>

</html>


