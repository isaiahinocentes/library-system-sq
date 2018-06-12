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
                    @if(!App\Book::isReserved($book->id))
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
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ route('opac-com') }}" class="btn circle pull-right" style="padding:2%"><i class="fa fa-comment fa-lg" style="color: #ffffff"></i></a>
</div>

{{--Add comments--}}

   


{{--MODAL FORM--}}
<div class="modal fade" id="borrowModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Reservation Details</h4>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="{{ route('OPAC-reserve') }}" method="POST">
            @csrf
            <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-lg-2 control-label">Book Id</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="book_id" name="book_id" placeholder="Book ID" readonly="readonly">
                  </div>
                </div>

                <div class="form-group">
                  <label for="name" class="col-lg-2 control-label">Book Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="bookTitle" name="book_title" placeholder="Book Title" readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                  <label for="name" class="col-lg-2 control-label">Author</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="bookAuthor" name="book_author" placeholder="Author" readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="borrower_name" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="studentId" class="col-sm-2 control-label">Student ID</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="studentId" name="borrower_id" placeholder="Student ID">
                  </div>
                </div>

              </div>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Borrow">
      </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<style>
    
    @circle: #558b2f;
    @colorLines: #558b2f;

    .circle{
        height: 60px;
        width: 60px;
        display: flex;
        transition: 0.2s all;
        text-align: center;
        justify-content: center;
        background-color: #5cb85c;
        -webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,0.3);
        box-shadow: 0 6px 10px 0 rgba(0,0,0,0.3);
        border: none;
        outline: none;
        border-radius: 50%;  
        &:hover
            {
                -webkit-box-shadow: 0 8px 15px 0 rgba(0,0,0,0.3);
            box-shadow: 0 8px 15px 0 rgba(0,0,0,0.4);	
            }
        span {
            width: 26px;
            height: 2px;
            display: flex;
            background-color: @colorLines;
            flex-wrap: wrap;
            &:before,
            &:after {
            content: "";
            width: 26px;
            height: 100%;
            background-color: @colorLines;
            border-radius: 100px;
            transition: transform .2s ease-out;
            position: relative;
            display: flex;  
            flex-grow: 1;
            }
            &:before {
            bottom: 8px;
            }
            &:after {
            top: 6px;
            }
    }
  
}
  
    
</style>
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
                $('#name').val("");
                $('#studentId').val("");
                $('#book_id').val(data.id)
                $('#bookTitle').val(data.title)
                $('#bookAuthor').val(data.author)
                $('#borrowModal').modal('show');
            }
        })
    }


</script>
@endsection


