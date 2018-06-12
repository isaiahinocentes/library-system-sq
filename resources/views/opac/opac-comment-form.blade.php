@extends('adminlte::page')

@section('title', 'OPAC - Comments / Suggestions')

@section('content_header')
    <h1>Comments/Suggestion</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> OPAC</a></li>
        <li><a href="#">Comments/Suggestion</a></li>
    </ol>

@stop

@section('content')
    <div class="container">
        <div style="margin: 0 auto; width: 80%">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-title">What's your concern?</div>
                </div>
                <div class="box-body">
                        <form class="form-horizontal" method="POST" action="{{ route('OPAC-qry') }}">
                            @csrf

                            {{-- Title --}}
                            <div class="form-group">
                                <label for="title" class="col-sm-4 control-label">{{ __('Title') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" id="title" type="text" name="title" value="{{ old('title') }}" required>
                                </div>
                            </div>

                            {{-- body --}}
                            <div class="form-group">
                                <label for="desc" class="col-sm-4 control-label">{{ __('Comment') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="4" cols="40" id="desc" name="body" value="{{ old('body') }}" required>
                                    </textarea>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">
                                    {{ __('Save') }}
                                </button>
                            </div>

                        </form>
                </div>
            </div>
        </div>
@endsection
