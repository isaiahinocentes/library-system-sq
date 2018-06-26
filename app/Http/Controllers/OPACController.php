<?php

namespace App\Http\Controllers;
use App\Book;
use App\Reservation;
use Illuminate\Http\Request;
use App\Library\ClassFactory as CF;

class OPACController extends Controller
{
    public function index(){
        $books = Book::all();
        $count = 0;
        foreach($books as $book){
            if(Book::isReserved($book->id))
                $count++;
        }
        //dd($count);

        return view('opac/opac-index')
            ->with('books', $books);
    }

    public function getBook($id = null){
        if(isset($id) or $id != null){
            $book = Book::find($id);
            return $book;
        } else {
            $book = null;
            return $book;
        }
    }

    public function showCommentForm(){
        return view('opac/opac-comment-form');
    }

    public function query(Request $request){
        $data = $request->all();
        $data = Reservation::validate($data);
        $result = CF::model('Forum')->saveData($data);
        //dd($result);
        return redirect()->route('OPAC-index')
            ->with('result', $result);
    }
    public function reserve(Request $request){
        $data = $request->all();
        $data = Reservation::validate($data);
        $result = CF::model('Reservation')->saveData($data);
        //dd($result);
        return redirect()->route('OPAC-index')
            ->with('result', $result);
    }

}
