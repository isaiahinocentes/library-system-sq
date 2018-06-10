@extends('adminlte::page')

@section('title', 'Suggestion - LMS')

@section('content_header')
    <h1>Suggestion</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Suggestion</a></li>
        <li class="active">List of Suggestions</li>
    </ol>
 

   
@stop

@section('content')
<div class="row"><br></div>
<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h5 class="box-title">Search Book</h5>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>

        </div>
        <div class="box-body" style="padding:20px;">
            <div class="selection">
                <select id ="bookSelect" class="form-control select2-container input-lg step2-select" style="width:100%" >
                    <option value="" disabled selected>Search book...</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>
        </div>
        <div class="box-footer">
        </div>
    </div>
</div>

@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container--default .select2-selection--single {
    height: 46px !important;
    padding-top: 15px;
    font-size: 18px;
    line-height: 1.33;
    border-radius: 6px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        top: 85% !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 26px !important;
    }
    .select2-container--default .select2-selection--single {
        border: 1px solid #CCC !important;
        box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset;
        transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    }
</style>
@stop

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(function() {
        $('#bookSelect').select2({
            
        });
    });
</script>
@endsection

    
