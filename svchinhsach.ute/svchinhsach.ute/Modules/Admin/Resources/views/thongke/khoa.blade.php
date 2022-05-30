@extends('admin::layouts.master')


@section('chart')
    <script  src="https://www.gstatic.com/charts/loader.js"></script>
    <script >
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([

            ['Task', 'Hours per Day'],
                {!! $chartData !!}
            
            ]);

            var options = {
            title: 'Thống kê theo khoa'
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
@endsection

@section('content')
    
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Quản lý thống kê</h4>
            </div>
            
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10">
                <h2>Thống kê</h2>
                <div id="piechart" style="width: 900px; height: 500px;"></div>
            </div>
            <div class="col-md-10">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Mã Khoa</th>
                            <th>Tên khoa</th>
                            <th>Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($thongkekhoa as $item)
                            <tr>
                                <td>{{ $item->k_ma }}</td>
                                <td>{{ $item->k_ten }}</td>
                                <td>{{ $item->soluong }}</td>
                            </tr>
                        @endforeach  
                    </tbody>
                </table>
            </div>
        </div>    
    </div> 
            
@endsection
