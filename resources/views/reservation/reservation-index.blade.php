@extends('adminlte::page')

@section('title', 'Reservation - LMS')

@section('content_header')
    <h1>Reservation</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Reservation</a></li>
        <li class="active">List of Reserved</li>
    </ol>



@stop

@section('content')
<div class="row"><br></div>
<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h5 class="box-title">Reservations</h5>
        </div>
        <div class="box-body">
            <table id="booksTable" class="table table-striped">
                <thead>
                <tr>
                    <th>Borrower ID</th>
                    <th>Borrower Name</th>
                    <th>Book ID</th>
                    <th>Reservation Date</th>
                    <th>Reservation Expiration</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tbody>
                @foreach($reservations as $res)
                    <tr>
                        <td>{{ $res->borrower_id}}</td>
                        <td>{{ $res->borrower_name }}</td>
                        <td>{{ $res->book_id}}</td>
                        <td>{{ $res->reservation_date }}</td>
                        <td>{{ $res->reservation_expiration }}</td>
                        <td>
                            <a href="{{ route('res-del', ['id' => $res->id]) }}" class="btn  btn-danger btn-sm">
                                <i class="fa fa-trash"style="margin-right:4px"></i>Release
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


