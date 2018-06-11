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
                        <h5 class="box-title">Borrows for the Week</h5>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="weekChart" style="height: 296px; width: 605px;" width="605" height="296"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                 <div class="box box-primary">
                    <div class="box-header with-border">
                        <h5 class="box-title">Borrows for the Month</h5>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="monthChart" style="height: 296px; width: 605px;" width="605" height="296"></canvas>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
<script>

</script>
@endsection
