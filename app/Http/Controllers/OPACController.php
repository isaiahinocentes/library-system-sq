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
        $reservations = Reservation::all();
        //dd($reservations);
        //foreach ($reservations->Book as $book)

        return view('opac/opac-index')->with('books', $books);
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

    public function query(Request $request){
        $data = $request->all();
        $data = Reservation::validate($data);
        $result = CF::model('Reservation')->saveData($data);
        return redirect()->route('OPAC-index')
            ->with('result', $result);
    }
}
