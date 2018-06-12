@extends('adminlte::page')

@section('title', 'Reports - LMS')

@section('content_header')
    <h1>Reports</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Reports</a></li>
        <li class="active">Statistics</li>
    </ol>



@stop

@section('content')

<div class="row"><br></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h5 class="box-title">Number of borrows for Today</h5>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="todayChart" style="height: 340px; width: 605px;" width="605" height="340"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                 <div class="box box-primary">
                    <div class="box-header with-border">
                        <h5 class="box-title">Number of borrows for the Week</h5>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="monthChart" style="height: 340px; width: 605px;" width="605" height="340"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                 <div class="box box-primary">
                    <div class="box-header with-border">
                        <h5 class="box-title">Most Borrowed Books</h5>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="allChart" style="height: 300px; width: 805px;" width="605" height="300"></canvas>
                        </div>
                     </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection
@section('css')

@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
<script src="https://codepen.io/anon/pen/aWapBE.js"></script>
<script>
    $(document).ready(function(){
        var $total = 0;
        var $label = [];
        var $dataset = [];
        $.ajax({
            type: "GET",
            url: './reports/getcount',
            data: "",
            success: function(data) {
                console.log(data);
                $label = [];
                $dataset = [];
                data.forEach(function(test){
                    $label.push(test.TITLE);
                    $dataset.push(test.NUM);
                });
                var ctx = $("#todayChart");
                var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: $label,
                    datasets: [{
                        label: '# of borrows',
                        data: $dataset,
                        backgroundColor:  palette(['tol', 'qualitative'], $dataset.length).map(function(hex) {
                            return '#' + hex;
                        }),
                       
                    }]
                },
                
            });
            }
        });
        $.ajax({
            type: "GET",
            url: './reports/getweek',
            data: "",
            success: function(data) {
                console.log(data);
                $label = [];
                $dataset = [];
                data.forEach(function(test){
                    $label.push(test.TITLE);
                    $dataset.push(test.NUM);
                });
                var ctx = $("#monthChart");
                var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: $label,
                    datasets: [{
                        label: '# of borrows',
                        data: $dataset,
                        backgroundColor:  palette('tol-sq', $dataset.length).map(function(hex) {
                            return '#' + hex;
                        }),
                       
                    }]
                },
                
            });
            }
        });
        $.ajax({
            type: "GET",
            url: './reports/getall',
            data: "",
            success: function(data) {
                console.log(data);
                $label = [];
                $dataset = [];
                data.forEach(function(test){
                    $label.push(test.TITLE);
                    $dataset.push(test.NUM);
                });
                var ctx = $("#allChart");
                var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: $label,
                    datasets: [{
                        label: '# of borrows',
                        data: $dataset,
                        backgroundColor:  palette('tol', $dataset.length).map(function(hex) {
                            return '#' + hex;
                        }),
                        
                       
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
                
            });
            }
        });
    });
    
</script>
@endsection
