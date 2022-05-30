@extends('layouts.master')

@section('content')
    {{-- @php
        
        echo "<pre>";
        print_r ($detail);
        echo "</pre>";
        die();
    @endphp --}}

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>Tên đối tượng: {{ $detail[0]->dt_ten }}</h3>
                    <h5>Hình thức: {{ $detail[0]->dt_hinhthuc }} </h5>
                    {{-- <h5>Mô tả: {{ $detail[0]->dt_mota }}</h5> --}}
                        {{ $detail[0]->dt_mota }}

                    
                    <img src="http://placehold.it/700x400" alt="">
                </div>
                <div class="col-md-12 mt-3 mb-3">
                    <a href="{{ route('sv.get.dangki', $detail[0]->id) }}" class="btn btn-success">Đăng ký</a>
                </div>
            </div>
        </div>
    </section>
@endsection