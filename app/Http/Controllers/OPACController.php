<?php

namespace App\Http\Controllers;
use App\Book;
use Illuminate\Http\Request;

class OPACController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('opac\opac-index')->with('books', $books);
        //return view('OPAC/OPAC-index');
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
}
