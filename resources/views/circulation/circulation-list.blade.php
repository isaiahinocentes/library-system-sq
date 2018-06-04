@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Circulation List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Circulations</h5>
            </div>
            <div class="card-body">
                <table id="circulationsTable" class="table table-bordered table-striped">
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
                        <tr>
                            <td>{{ $circulation->id }}</td>
                            <td>{{ $circulation->person_id }}</td>
                            <td>{{ $circulation->book_id }}</td>
                            <td>{{ $circulation->borrowed_at }}</td>
                            <td>{{ $circulation->return_by }}</td>
                            @if(isset($circulation->returned_at))
                                <td>{{ $circulation->returned_at }}</td>
                            @else
                                <td>
                                @php
                                $current_time = \Carbon\Carbon::now()->toDateTimeString();
                                echo "<a href=\"route('circ-qry',['id' => $circulation->id, 'added_by' =>".auth()->user()->id.", 'returned_at' => $current_time])\">";
                                echo "<button>RETURN BOOK</button></a>";
                                @endphp
                                </td>
                            @endif

                            {{-- Get Username --}}
                            @php
                                $username = App\User::find($circulation->added_by)->name;
                                echo "<td>".$username."</td>";
                            @endphp

                            {{-- Show if updated or created--}}
                            @if(isset($circulation->updated_at))
                                <td>Updated: {{ $circulation->updated_at }}</td>
                            @else
                                <td>Created: {{ $circulation->returned_at }}</td>
                            @endif

                            <td>
                                <a href="{{ route('circ-form', ['id' => $circulation->id, 'added_by' => auth()->user()->id]) }}">
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
