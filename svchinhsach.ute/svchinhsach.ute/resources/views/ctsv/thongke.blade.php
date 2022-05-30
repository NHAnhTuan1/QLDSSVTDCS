@extends('ctsv.layout')

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


    <h2>Thống kê</h2>
    <br />

    <div id="piechart" style="width: 900px; height: 500px;"></div>
    <hr>
    <h5>Số lượng sinh viên diện chính sách theo khoa:</h5>
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
@endsection