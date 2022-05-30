<div class="main-content">
    <div class="row">
        <div class="col-md-6">
            <ul>
                <li>Họ và tên: <b>{{ $chitiet[0]->sv_ten }}</b></li>
                <li>Lớp: <b>{{ $chitiet[0]->l_ten }}</b></li>
                <li>Khoa: <b>{{ $chitiet[0]->k_ten }}</b></li>
                <li>Địa chỉ: <b>{{ $chitiet[0]->sv_diachi }}</b></li>
                <li>Năm sinh: <b>{{ $chitiet[0]->sv_ngaysinh }}</b></li>
                <li>Ngày đăng ký: <b>{{ $chitiet[0]->created_at }}</b></li>
            </ul>
        </div>
        <div class="col-md-6">
            <ul>
                <li>Chứng minh nhân dân: <b>{{$chitiet[0]->sv_cmnd }}</b></li>
                <li>Số điện thoại: <b>{{$chitiet[0]->sv_sdt }}</b></li>
                <li>Email: <b>{{$chitiet[0]->sv_email }}</b></li>
                <li>Loại chính sách: <b>{{$chitiet[0]->dt_ten }}</b></li>
                <li>Mã học kì: <b>{{ $chitiet[0]->hk_ma }}</b></li>
                <li>Ngày duyệt: <b>{{ $chitiet[0]->updated_at }}</b></li>
                
            </ul>
        </div>
        <div class="col-md-12"><hr></div>
        <div class="col-md-12">
            <ul>
                <li>Tình trạng:
                    @if ($chitiet[0]->tinhtrang == 0)
                        <b class="text-warning">Chưa duyệt</b> 
                    @endif
                    @if ($chitiet[0]->tinhtrang == 1)
                        <b class="text-success">Chấp nhận</b> 
                    @endif
                    @if ($chitiet[0]->tinhtrang == 2)
                        <b class="text-danger">Không chấp nhận</b>
                    @endif 
                </li>
            </ul>
            
        </div>
        <div class="col-md-12">
            
            <ul>
                <b>Các minh chứng:</b>
                @foreach ($minhchung as $mc)
                    <li>
                        <a target="_blank" href="{{ $mc->mc_file }}">Minh chứng 1</a> 
                    </li>
                @endforeach
                
            </ul>
        </div>
    </div>
</div>