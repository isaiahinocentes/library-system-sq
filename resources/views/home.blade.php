@extends('adminlte::page')

@section('title', 'Library Management System')

@section('content_header')
    <h1>Acquisition</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Acquisition</a></li>
        <li class="active">List of Books</li>
    </ol>



@stop

@section('content')
<div class="row"><br></div>
<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h5 class="box-title">Books</h5>
        </div>
        <div class="box-body">
            <table id="booksTable" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Added By</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->category }}</td>
                        <td>{{ $book->date }}</td>
                        <td>{{ $book->User->name }}</td>
                        <td>{{ $book->created_at }}</td>
                        <td>
                            <a href="{{ route('acq-book', ['id' => $book->id]) }}" class="btn  btn-warning btn-xs">
                                <i class="fa fa-pencil"style="margin-right:4px"></i>Edit
                            </a>
                            &nbsp;
                            <a href="{{ route('acq-del', ['id' => $book->id]) }}" class="btn  btn-danger btn-xs">
                                <i class="fa fa-trash"style="margin-right:4px"></i>Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@stop

@section('js')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function() {
        $('#booksTable').DataTable({

        });
    });
</script>
@endsection


