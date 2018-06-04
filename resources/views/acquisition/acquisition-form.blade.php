@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add book</div>

                    <div class="card-body">
                        @if(isset($id))

                            <form method="POST" action="{{ route('acq-qry', ['id' => $id, 'added_by' => auth()->user()->id]) }}">
                        @else
                            <form method="POST" action="{{ route('acq-qry', ['added_by' => auth()->user()->id]) }}">
                        @endif
                            @csrf

                            {{-- Title --}}
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Book Title') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input id="title" type="text" name="title" value="{{ $book->title }}" required>
                                    @else
                                        <input id="title" type="text" name="title" value="{{ old('title') }}" required>
                                    @endif
                                </div>
                            </div>

                            {{-- Description desc --}}
                            <div class="form-group row">
                                <label for="desc" class="col-md-4 col-form-label text-md-right">{{ __('Book Description') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input id="desc" type="text" name="desc" value="{{ $book->desc }}" required>
                                    @else
                                        <input id="desc" type="text" name="desc" value="{{ old('desc') }}" required>
                                    @endif
                                </div>
                            </div>

                            {{-- Author --}}
                            <div class="form-group row">
                                <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Book Author') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input id="author" type="text" name="author" value="{{ $book->author }}" required>
                                    @else
                                        <input id="author" type="text" name="author" value="{{ old('author') }}" required>
                                    @endif
                                </div>
                            </div>

                            {{-- Category --}}
                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category/ies') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        <input id="category" type="text" name="category"  value="{{ $book->category }}">
                                    @else
                                        <input id="category" type="text" name="category" required>
                                    @endif
                                </div>
                            </div>

                            {{-- Date --}}
                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Book Date') }}</label>
                                <div class="col-md-6">
                                    @if(isset($id))
                                        {{--\Carbon\Carbon::createFromDate($db->year,$db->month,$db->day)->format('Y-m-d')}}"--}}
                                        <input id="date" type="text" name="date" value="{{ $book->date }}" required />
                                    @else
                                        <input id="date" type="number" name="date" required>
                                    @endif
                                </div>
                            </div>

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
