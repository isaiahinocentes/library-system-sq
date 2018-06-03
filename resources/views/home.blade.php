@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Starter Page</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Books</h5>
        </div>
        <div class="card-body">
            <table id="booksTable" class="table table-bordered table-striped">
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
                        @php
                            $username = App\User::find($book->added_by)->name;
                            echo "<td>".$username."</td>";
                        @endphp
                        <td>{{ $book->created_at }}</td>
                        <td>
                            <a href="{{ route('acq-book', ['id' => $book->id]) }}">
                                <button> Edit </button>
                            </a>
                            <a href="">
                                <button> Delete </button>
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
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        $('booksTable').DataTable();
    </script>
@endsection
