
@extends('adminlte::page')
@section('title', 'Circulation - LMS')
@section('content_header')
    <h1>Circulation</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Circulation</a></li>
        <li class="active">Record</li>
    </ol>
 

@stop

@section('content')
<div class="container">
            <div style="margin: 0 auto; width:80%">
                <div class="box box-primary">
                    @if(isset($id))
                        <div class="box-header with-border">
                            <div class="box-title">Edit Record</div>  
                        </div>
                    @else
                        <div class="box-header with-border">
                                <div class="box-title">Add Record</div>  
                        </div>
                    @endif
                    <div class="box-body">
                        @if(isset($id))
                            <form class="form-horizontal" method="POST" action="{{ route('circ-qry', ['id' => $id]) }}">
                        @else
                            <form class="form-horizontal" method="POST" action="{{ route('circ-qry') }}">
                        @endif

                        @csrf
                            {{-- borrower_id --}}
                            <div class="form-group">
                                <label for="title" class="col-sm-4 control-label">{{ __('Borrower ID') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input class="form-control" id="person_id" type="text" name="person_id" value="{{ $circulation->person_id }}" required>
                                    @else
                                        <input class="form-control" id="person_id" type="text" name="person_id" value="{{ old('person_id') }}" required>
                                    @endif
                                </div>
                            </div>

                            {{-- book_id --}}
                            <div class="form-group row">
                                <label for="desc" class="col-sm-4 control-label">Book Title</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input type="hidden" id="book_id_checker" value="{{ $circulation->book_id }}">
                                        <select class="select2 select2-container" style="width: 100%;" name="book_id" id="book_id" required>
                                        @foreach($books as $book)
                                        
                                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                                        
                                        @endforeach
                                        </select>
                                        <!-- <input class="form-control" id="book_id" type="number" name="book_id" value="{{ $circulation->book_id }}" required> -->
                                    @else
                                        <input type="hidden" id="book_id_checker" value="0">
                                        <select class="select2 select2-container" style="width: 100%;" name="book_id" id="book_id" required> 
                                        @foreach($books as $book)
                                        
                                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                                        
                                        @endforeach
                                        </select>
                                        <!-- <input  class="form-control" id="book_id" type="number" name="book_id" value="{{ old('book_id') }}" required> -->
                                    @endif
                                </div>
                            </div>

                            {{-- Borrowed At --}}
                            <div class="form-group row">
                                <label for="author" class="col-sm-4 control-label">{{ __('Borrowed At') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        {{ $circulation->borrowed_at }}
                                    @else
                                        <input class="form-control" id="borrowed_at" type="date" name="borrowed_at" value="{{ \Carbon\Carbon::now()->format('m-d-Y') }}" required>
                                    @endif
                                </div>
                            </div>

                            {{-- Return by--}}
                            <div class="form-group row">
                                <label for="author" class="col-sm-4 control-label">{{ __('Return by') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        {{ $circulation->return_by }}
                                    @else
                                        <input  class="form-control" id="return_by" type="date" name="return_by" value="{{ \Carbon\Carbon::now()->format('m-d-Y') }}" required>
                                    @endif
                                </div>
                            </div>

                            {{-- Returned At--}}
                            @if(isset($id))
                                <div class="form-group row">
                                    <label for="author" class="col-sm-4 control-label">{{ __('Returned At') }}</label>
                                    <div class="col-md-6">
                                            <input  class="form-control" id="returned_at" type="date" name="returned_at" value="{{ \Carbon\Carbon::now()->format('m-d-Y') }}" required>
                                    </div>
                                </div>
                            @endif

                            <div class="box-footer">

                                    <button type="submit" class="btn btn-primary pull-right">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection
@section("css")
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section("js")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#book_id').select2();
            var $book_tester = null;
            $book_tester = $('#book_id_checker').val();

            if($book_tester != 0){

                $('#book_id').val($book_tester).trigger('change');
            }
        });
    </script>
@endsection
