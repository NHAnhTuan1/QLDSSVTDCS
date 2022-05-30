<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item pt-2 {{ ($module_active == 'dashboard')?'selected':''}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ ($module_active == 'dashboard')?'active':''}}" href="{{ route('admin.dashboard') }}"
                        >
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">Tổng quan</span>
                    </a>
                </li>

                <li class="sidebar-item {{ ($module_active == 'khoa')?'selected':''}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ ($module_active == 'khoa')?'active':''}}" href="{{ route('admin.khoa.index') }}"
                        >
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">Quản lý Khoa</span>
                    </a>
                </li>

                <li class="sidebar-item {{ ($module_active == 'lop')?'selected':''}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ ($module_active == 'lop')?'active':''}}" href="{{ route('admin.lop.index') }}"
                        >
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Quản lý Lớp</span>
                    </a>
                </li>

                <li class="sidebar-item {{ ($module_active == 'sv')?'selected':''}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ ($module_active == 'sv')?'active':''}}"  href="{{ route('admin.sv.index') }}"
                        >
                        <i class="fas fa-graduation-cap"></i>
                        <span class="hide-menu">Quản lý Sinh viên</span>
                    </a>
                </li>

                <li class="sidebar-item {{ ($module_active == 'doituong')?'selected':''}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ ($module_active == 'doituong')?'active':''}}" href="{{ route('admin.doituong.index') }}"
                        >
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Quản lý loại chính sách</span>
                    </a>
                </li>

                <li class="sidebar-item {{ ($module_active == 'danhsachsv')?'selected':''}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ ($module_active == 'danhsachsv')?'active':''}}"  href="{{ route('get.sv.chinhsach') }}"
                        >
                        <i class="fas fa-graduation-cap"></i>
                        <span class="hide-menu">SV thuộc diện chính sách</span>
                    </a>
                </li>

                <li class="sidebar-item {{ ($module_active == 'ctsv')?'selected':''}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ ($module_active == 'ctsv')?'active':''}}"  href="{{ route('admin.ctsv.index') }}"
                        >
                        <i class="fas fa-users"></i>
                        <span class="hide-menu">Quản lý CTSV</span>
                    </a>
                </li>



                <li class="sidebar-item {{ ($module_active == 'hocki')?'selected':''}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ ($module_active == 'hocki')?'active':''}}" href="{{ route('admin.hocki.index') }}"
                        >
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Quản lý Học kì</span>
                    </a>
                </li>


                <li class="sidebar-item {{ ($module_active == 'thongke')?'selected':''}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ ($module_active == 'thongke')?'active':''}}" href="{{ route('admin.thongke.khoa') }}"
                        >
                        <i class="fas fa-chart-pie"></i>
                        <span class="hide-menu">Thống kê khoa</span>
                    </a>
                </li>



                <li class="sidebar-item">
                    <a href="{{ route('admin.get.logout') }}" class="sidebar-link waves-effect waves-dark sidebar-link "
                        >
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="hide-menu">Đăng xuất</span>
                    </a>
                </li>
                
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>