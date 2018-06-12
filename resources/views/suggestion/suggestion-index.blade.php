@extends('adminlte::page')

@section('title', 'Suggestion - LMS')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Suggestion</a></li>
        <li class="active">List of Suggestions</li>
    </ol>



@stop

@section('content')
<div class="row"><br></div>
<div class="row"><br></div>
<div class="container">
   <div class="row">
        <ul class="timeline">
            <li class="time-label">
                <span class="bg-green">
                    Comments and Suggestions
                </span>
            </li>
            <!-- enclose in loop -->
            @foreach($suggestions as $comment)
                <li>
                    <i class="fa fa-user bg-blue"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header">{{ $comment->title }}</h3>
                        <div class="timeline-body">
                            {{ $comment->body }}
                        </div>
                        <div class="timeline-footer">
                        </div>
                    </div>
                </li>
            @endforeach
             <!-- enclose in loop -->
        </ul>
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


