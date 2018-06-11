@extends('adminlte::page')

@section('title', 'Library Management System')

@section('content_header')
    <h1>Online Public Access Catalog</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">OPAC</li>

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
                        <td>
                            <a  onclick="borrowBook({{$book->id}})" class="btn  btn-success btn-xs">
                                <i class="fa fa-bookmark"style="margin-right:4px"></i> Borrow
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="borrowModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reservation Details</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal">

            <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-lg-2 control-label">Book Id</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="bookId" placeholder="Book ID" readOnly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="name" class="col-lg-2 control-label">Book Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="bookTitle" placeholder="Book Title" readOnly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="name" class="col-lg-2 control-label">Author</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="bookAuthor" placeholder="Author" readOnly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="studentId" class="col-sm-2 control-label">Student ID</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="studentId" placeholder="Student ID">
                  </div>
                </div>

              </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Borrow</button>
      </div>
      </form>
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
<script>
    function borrowBook(id){
        var test = id;
        $.ajax({
            type: "GET",
            url: './opac/getBook/'+test,
            data: "",
            success: function(data) {
                console.log(data);
                $('#bookId').val(data.id)
                $('#bookTitle').val(data.title)
                $('#bookAuthor').val(data.author)
                $('#borrowModal').modal('show');
            }
        })
    }

</script>
@endsection


