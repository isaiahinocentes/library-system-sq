<?php

namespace App\Http\Controllers;

use App\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function iancruz(){
        return view('')
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        //dd($books[0]->User->name);
        return view('home')
            ->with('books', $books);
    }
}
