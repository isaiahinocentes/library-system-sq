@extends('adminlte::page')

@section('title', 'Circulation - LMS')

@section('content_header')
    <h1>Circulation</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Circulation</a></li>
        <li class="active">List of Reserved</li>
    </ol>



@stop

@section('content')

<div class="row"><br></div>
    <div class="container">
        <div class="box box-primary">
            <div class="box-header">
                <h5 class="box-title">Borrowed</h5>
            </div>
            <div class="box-body">
                <table id="circulationsTable" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Circulation ID</th>
                        <th>Borrower ID</th>
                        <th>Book ID</th>
                        <th>Borrowed At</th>
                        <th>Return By</th>
                        <th>Returned At</th>
                        <th>Added/Edited By</th>
                        <th>Date Created/Updated</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($circulations as $circulation)
                        @if($circulation->returned_at == null)
                        <tr>
                            <td>{{ $circulation->id }}</td>
                            <td>{{ $circulation->person_id }}</td>
                            <td>{{ $circulation->book_id }}</td>
                            <td>{{ $circulation->borrowed_at }}</td>
                            <td>{{ $circulation->return_by }}</td>
                            <td>{{ $circulation->returned_at }}</td>
                            <td>{{ $circulation->User->name }}</td>
                            {{-- Show if updated or created--}}
                            @if(isset($circulation->updated_at))
                                <td>Updated: {{ $circulation->updated_at }}</td>
                            @else
                                <td>Created: {{ $circulation->returned_at }}</td>
                            @endif

                            <td>
                                <a href="{{ route('circ-form', ['id' => $circulation->id]) }}" class="btn  btn-warning btn-xs">
                                    <i class="fa fa-pencil"style="margin-right:4px"></i>Edit
                                </a>
                                <a href="{{ route('circ-del', ['id' => $circulation->id]) }}" class="btn  btn-danger btn-xs">
                                    <i class="fa fa-trash"style="margin-right:4px"></i>Delete
                                </a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h5 class="box-title">Returned</h5>
        </div>
        <div class="box-body">
            <table id="circulationsTable" class="table table-striped">
                <thead>
                <tr>
                    <th>Circulation ID</th>
                    <th>Borrower ID</th>
                    <th>Book ID</th>
                    <th>Borrowed At</th>
                    <th>Return By</th>
                    <th>Returned At</th>
                    <th>Added/Edited By</th>
                    <th>Date Created/Updated</th>
                </tr>
                </thead>
                <tbody>
                @foreach($circulations as $circulation)
                    @if($circulation->returned_at != null)
                    <tr>
                        <td>{{ $circulation->id }}</td>
                        <td>{{ $circulation->person_id }}</td>
                        <td>{{ $circulation->book_id }}</td>
                        <td>{{ $circulation->borrowed_at }}</td>
                        <td>{{ $circulation->return_by }}</td>
                        <td>{{ $circulation->returned_at }}</td>
                        <td>{{ $circulation->User->name }}</td>
                        {{-- Show if updated or created--}}
                        @if(isset($circulation->updated_at))
                            <td>Updated: {{ $circulation->updated_at }}</td>
                        @else
                            <td>Created: {{ $circulation->returned_at }}</td>
                        @endif
                    </tr>
                    @endif
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
        $('#circulationsTable').DataTable({

        });
    </script>
@endsection
