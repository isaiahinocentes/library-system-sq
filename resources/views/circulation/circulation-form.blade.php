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
<<<<<<< HEAD
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
=======
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(isset($id))
                        <div class="card-header">Add Record</div>
                    @else
                        <div class="card-header">Edit Record</div>
                    @endif
                    <div class="card-body">
                        @if(isset($id))
                            <form method="POST" action="{{ route('circ-qry', ['id' => $id]) }}">
                        @else
                            <form method="POST" action="{{ route('circ-qry') }}">
>>>>>>> 090ee2878fee3e160bda8117123666ebd1ffdeaa
                        @endif

                        @csrf
<<<<<<< HEAD
                            {{-- Title --}}
                            <div class="form-group">
                                <label for="title" class="col-sm-4 control-label">{{ __('Book Title') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input class="form-control" id="title" type="text" name="title" value="{{ $book->title }}" required>
                                    @else
                                        <input class="form-control" id="title" type="text" name="title" value="{{ old('title') }}" required>
=======
                            {{-- borrower_id --}}
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Borrower ID') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input id="person_id" type="text" name="person_id" value="{{ $circulation->person_id }}" required>
                                    @else
                                        <input id="person_id" type="text" name="person_id" value="{{ old('person_id') }}" required>
>>>>>>> 090ee2878fee3e160bda8117123666ebd1ffdeaa
                                    @endif
                                </div>
                            </div>

<<<<<<< HEAD
                            {{-- Description desc --}}
                            <div class="form-group">
                                <label for="desc" class="col-sm-4 control-label">{{ __('Book Description') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input class="form-control" id="desc" type="text" name="desc" value="{{ $book->desc }}" required>
                                    @else
                                        <input class="form-control" id="desc" type="text" name="desc" value="{{ old('desc') }}" required>
=======
                            {{-- book_id --}}
                            <div class="form-group row">
                                <label for="desc" class="col-md-4 col-form-label text-md-right">{{ __('Book ID') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input id="book_id" type="number" name="book_id" value="{{ $circulation->book_id }}" required>
                                    @else
                                        <input id="book_id" type="number" name="book_id" value="{{ old('book_id') }}" required>
>>>>>>> 090ee2878fee3e160bda8117123666ebd1ffdeaa
                                    @endif
                                </div>
                            </div>

                            {{-- Borrowed At --}}
                            <div class="form-group row">
<<<<<<< HEAD
                                <label for="author" class="col-sm-4 control-label">{{ __('Book Author') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input class="form-control" id="author" type="text" name="author" value="{{ $book->author }}" required>
                                    @else
                                        <input class="form-control" id="author" type="text" name="author" value="{{ old('author') }}" required>
=======
                                <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Borrowed At') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        {{ $circulation->borrowed_at }}
                                    @else
                                        <input id="borrowed_at" type="date" name="borrowed_at" value="{{ \Carbon\Carbon::now()->format('m-d-Y') }}" required>
>>>>>>> 090ee2878fee3e160bda8117123666ebd1ffdeaa
                                    @endif
                                </div>
                            </div>

                            {{-- Return by--}}
                            <div class="form-group row">
<<<<<<< HEAD
                                <label for="category" class="col-sm-4 control-label">{{ __('Category/ies') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input class="form-control" id="category" type="text" name="category"  value="{{ $book->category }}">
                                    @else
                                        <input class="form-control" id="category" type="text" name="category" required>
=======
                                <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Return by') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        {{ $circulation->return_by }}
                                    @else
                                        <input id="return_by" type="date" name="return_by" value="{{ \Carbon\Carbon::now()->format('m-d-Y') }}" required>
>>>>>>> 090ee2878fee3e160bda8117123666ebd1ffdeaa
                                    @endif
                                </div>
                            </div>

<<<<<<< HEAD
                            {{-- Date --}}
                            <div class="form-group row">
                                <label for="date" class="col-sm-4 control-label">{{ __('Book Date') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input class="form-control" id="date" type="number" name="date" value="{{ $book->date }}" required>
                                    @else
                                        <input class="form-control" id="date" type="number" name="date" required>
                                    @endif
=======
                            {{-- Returned At--}}
                            @if(isset($id))
                                <div class="form-group row">
                                    <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Returned At') }}</label>
                                    <div class="col-md-6">
                                            <input id="returned_at" type="date" name="returned_at" value="{{ \Carbon\Carbon::now()->format('m-d-Y') }}" required>
                                    </div>
>>>>>>> 090ee2878fee3e160bda8117123666ebd1ffdeaa
                                </div>
                            @endif

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
