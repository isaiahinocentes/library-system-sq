@extends('layouts.app')

@section('content')
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
                        @endif

                        @csrf
                            {{-- borrower_id --}}
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Borrower ID') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input id="person_id" type="text" name="person_id" value="{{ $circulation->person_id }}" required>
                                    @else
                                        <input id="person_id" type="text" name="person_id" value="{{ old('person_id') }}" required>
                                    @endif
                                </div>
                            </div>

                            {{-- book_id --}}
                            <div class="form-group row">
                                <label for="desc" class="col-md-4 col-form-label text-md-right">{{ __('Book ID') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input id="book_id" type="number" name="book_id" value="{{ $circulation->book_id }}" required>
                                    @else
                                        <input id="book_id" type="number" name="book_id" value="{{ old('book_id') }}" required>
                                    @endif
                                </div>
                            </div>

                            {{-- Borrowed At --}}
                            <div class="form-group row">
                                <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Borrowed At') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        {{ $circulation->borrowed_at }}
                                    @else
                                        <input id="borrowed_at" type="date" name="borrowed_at" value="{{ \Carbon\Carbon::now()->format('m-d-Y') }}" required>
                                    @endif
                                </div>
                            </div>

                            {{-- Return by--}}
                            <div class="form-group row">
                                <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Return by') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        {{ $circulation->return_by }}
                                    @else
                                        <input id="return_by" type="date" name="return_by" value="{{ \Carbon\Carbon::now()->format('m-d-Y') }}" required>
                                    @endif
                                </div>
                            </div>

                            {{-- Returned At--}}
                            @if(isset($id))
                                <div class="form-group row">
                                    <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Returned At') }}</label>
                                    <div class="col-md-6">
                                            <input id="returned_at" type="date" name="returned_at" value="{{ \Carbon\Carbon::now()->format('m-d-Y') }}" required>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
