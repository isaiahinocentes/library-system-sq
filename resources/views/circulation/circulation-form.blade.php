@extends('adminlte::page')

@section('title', 'Circulation - LMS')

@section('content_header')
    <h1>Circulation</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Circulation</a></li>
        <li class="active">Book</li>
    </ol>
 

@stop

@section('content')
    <div class="container"  >
       
            <div  style="margin: auto; width: 80%;">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h1 class="box-title">Book</h1>
                    </div>
                    <div class="box-body">
                        @if(isset($id))
                        <form class="form-horizontal" method="POST" action="{{ route('circ-qry', ['id' => $id, 'added_by' => auth()->user()->id]) }}">
                        @else
                        <form class="form-horizontal" method="POST" action="{{ route('circ-qry', ['added_by' => auth()->user()->id]) }}">
                        @endif
                        @csrf
                            {{-- Title --}}
                            <div class="form-group">
                                <label for="title" class="col-sm-4 control-label">{{ __('Book Title') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input class="form-control" id="title" type="text" name="title" value="{{ $book->title }}" required>
                                    @else
                                        <input class="form-control" id="title" type="text" name="title" value="{{ old('title') }}" required>
                                    @endif
                                </div>
                            </div>

                            {{-- Description desc --}}
                            <div class="form-group">
                                <label for="desc" class="col-sm-4 control-label">{{ __('Book Description') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input class="form-control" id="desc" type="text" name="desc" value="{{ $book->desc }}" required>
                                    @else
                                        <input class="form-control" id="desc" type="text" name="desc" value="{{ old('desc') }}" required>
                                    @endif
                                </div>
                            </div>

                            {{-- Author --}}
                            <div class="form-group row">
                                <label for="author" class="col-sm-4 control-label">{{ __('Book Author') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input class="form-control" id="author" type="text" name="author" value="{{ $book->author }}" required>
                                    @else
                                        <input class="form-control" id="author" type="text" name="author" value="{{ old('author') }}" required>
                                    @endif
                                </div>
                            </div>

                            {{-- Category --}}
                            <div class="form-group row">
                                <label for="category" class="col-sm-4 control-label">{{ __('Category/ies') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input class="form-control" id="category" type="text" name="category"  value="{{ $book->category }}">
                                    @else
                                        <input class="form-control" id="category" type="text" name="category" required>
                                    @endif
                                </div>
                            </div>

                            {{-- Date --}}
                            <div class="form-group row">
                                <label for="date" class="col-sm-4 control-label">{{ __('Book Date') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input class="form-control" id="date" type="number" name="date" value="{{ $book->date }}" required>
                                    @else
                                        <input class="form-control" id="date" type="number" name="date" required>
                                    @endif
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
    </div>
@endsection
