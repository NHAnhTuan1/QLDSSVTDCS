@extends('layouts.master')

@section('content')

    <section class="timkiem" style="min-height: 500px">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card spur-card" style="min-height: 375px">
                        <div class="card-header">
                           
                            <div class="spur-card-title"> Tìm kiếm </div>
                        </div>
                        <div class="card-body ">
                            {{-- <form action="" method="GET"> --}}
                                
                                <div class="form-group">
                                    <label for="inputAddress2">Nhập từ khóa ở đây</label>
                                    <input type="text" class="form-control" placeholder="Nhập từ khóa muốn tìm kiếm.." name="q" required id="keyword">
                                </div>

                                <button data-href="{{ route('ajax.search') }}" type="button" id="searchDT" class="btn btn-primary">Tìm kiếm</button>
                                @csrf
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card spur-card" style="min-height: 375px">
                        <div class="card-header">
                            <div class="spur-card-title"> Kết quả tìm kiếm <b id="total"></b></div>
                        </div>
                        <div class="card-body">
                            <div class="row" id="resultSearch">
                                <!--Phun kết quả từ ajax ra đây-->

                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        $("#searchDT").click(function (e) { 
            e.preventDefault();
            var keyword = $('#keyword').val();
            var url = $(this).attr('data-href');
            if (keyword) {
                
                $.post(url, {keyword: keyword}, function(data){
                    if (data.total >0) {
                        $('#total').html(data.total);
                        $('#resultSearch').html(data.html);
                    }else{

                        alert('Không tìm thấy dữ liệu');
                        $('#total').html(0);
                        $('#resultSearch').html(null);
                    }
                });
            }
            
        });
    </script>
@endsection