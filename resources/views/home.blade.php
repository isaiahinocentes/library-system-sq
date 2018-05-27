@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 books_table">
            <div class="card">
                <div class="card-header">Books</div>
                <div class="card-body">
                    <table id="books_table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Name</th>
                                <th>Author</th>
                                <th>Categories</th>
                                <th>Date</th>
                                <th>Added By</th>
                                <th>Created Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{$book->id}}</td>
                                    <td>{{$book->title}}</td>
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->author}}</td>
                                    <td>{{$book->categories}}</td>
                                    <td>{{$book->date}}</td>
                                    <td>{{$book->added_by}}</td>
                                    <td>{{$book->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
