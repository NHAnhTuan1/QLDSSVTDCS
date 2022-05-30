<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('public/ctsv/css/spur.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="{{ URL::asset('public/ctsv/js/chart-js-config.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{ URL::asset('public/jquery2table/jquery.table2excel.js') }}"></script>
    <title>Quản trị của CTSV</title>

    <link rel="shortcut icon" href="http://daotao.ute.udn.vn/images/favicon.ico" type="image/x-icon">
    @yield('chart')
</head>

<body>
    <style>
        a.dash-nav-item.active {
            background: #3e3e3e;
        }
    </style>
    <div class="dash">
        <div class="dash-nav dash-nav-dark">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="index.html" class="spur-logo"><i class="fas fa-bolt"></i> <span>CTSV</span></a>
            </header>
            <nav class="dash-nav-list">

                <a href="{{ route('ctsv.dashboard') }}" class="dash-nav-item {{ (Route::currentRouteName() == 'ctsv.dashboard')?'active':'' }}" style="padding-left: 20px"> Tổng quan</a>

                <a href="{{ route('ctsv.get.duyet') }}" class="dash-nav-item {{ (Route::currentRouteName() == 'ctsv.get.duyet')?'active':'' }}" style="padding-left: 20px"> Duyệt danh sách đăng ký</a>

                <a href="{{ route('ctsv.thongke.index') }}" class="dash-nav-item {{ (Route::currentRouteName() == 'ctsv.thongke.index')?'active':'' }}" style="padding-left: 20px"> Thống kê theo khoa</a>

                <a href="{{ route('ctsv.thongke2.index') }}" class="dash-nav-item {{ (Route::currentRouteName() == 'ctsv.thongke2.index')?'active':'' }}" style="padding-left: 20px"> Thống kê theo học kì</a>

                <a href="{{ route('ctsv.thongbao.index') }}" class="dash-nav-item {{ (Route::currentRouteName() == 'ctsv.thongbao.index')?'active':'' }}" class="dash-nav-item" style="padding-left: 20px"> Thông báo </a>

            </nav>
        </div>
        <div class="dash-app">
            <header class="dash-toolbar">
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                
                <div class="tools">

                    <div class="dropdown tools-item">
                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="#!">Xin chào:{{ get_data_user('ctsv', 'ctsv_ten') }}!</a>
                            <a class="dropdown-item" href="{{ route('ctsv.get.info') }}">Thông tin cá nhân</a>
                            <a class="dropdown-item" href="{{ route('ctsv.get.logout') }}">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @if(Session::has('success'))
                            <div class="alert alert-success">
                            {{ Session::get('success')}}
                            </div>
                            @endif
                        </div>
                    </div>

                    @yield('content')


                </div>
            </main>
        </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('public/ctsv/js/spur.js') }}"></script>

    <script>
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

    <script>
        $(function() {
            $("#xuat").click(function(){
            $("#table2excel").table2excel({
                name: "Excel Document Name"
            }); 
            });
        });
    </script>
    <script>
        $.ajaxSetup({
            beforeSend: function(xhr, type) {
                if (!type.crossDomain) {
                    xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                }
            },
        });
    </script>
    @yield('script')
</body>

</html>