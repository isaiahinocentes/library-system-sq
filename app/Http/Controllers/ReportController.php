<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use App\Book;
use App\Reservation;
use App\Circulation;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        return view('report/report-index');
    }
    public function getCount (){
        $result = DB::SELECT("SELECT B.TITLE, count(A.BOOK_ID) AS NUM FROM circulations A INNER JOIN books B ON B.id = A.book_id WHERE DATE(A.borrowed_at) = (SELECT CURRENT_DATE) GROUP BY B.title,A.book_id");
        return $result;
    }
    public function getWeek (){
        $result = DB::SELECT("SELECT B.TITLE, count(A.BOOK_ID) AS NUM FROM circulations A INNER JOIN books B ON B.id = A.book_id WHERE (SELECT WEEK(DATE(A.borrowed_at))) = (SELECT WEEK((SELECT CURRENT_DATE)))
                                GROUP BY B.title,A.book_id");
        return $result;
    }
    public function getAll (){
        $result = DB::SELECT("SELECT B.TITLE, count(A.BOOK_ID) AS NUM FROM circulations A INNER JOIN books B ON B.id = A.book_id GROUP BY B.title,A.book_id");
        return $result;
    }
}
