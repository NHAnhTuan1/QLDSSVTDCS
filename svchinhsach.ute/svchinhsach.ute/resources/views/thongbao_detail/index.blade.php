@extends('layouts.master')

@section('content')
    <section class="chitietTB" style="min-height: 500px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $thongbao[0]->tb_tieude }}</h1>
                    <p>Ngày: {{ date('d-m-Y', strtotime($thongbao[0]->created_at)) }}</p>
                    <div class="noidung">
                        <p>
                            {{ $thongbao[0]->tb_noidung }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection