<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Library\ClassFactory as CF;

class AcquisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('home')
            ->with('books', $books);
    }

    /**
     * Show form containing/or not the book fields
     * @param <b>id</b>
     * if id is set, update form
     * if not, create form
     * @return View
     * Add or Edit Book form
     */
    public function book($id = null){
        if(isset($id) or $id != null){
            $book = Book::find($id);
            return view('acquisition\acquisition-form')
                ->with('id', $book->id)
                ->with('book', $book);
        } else {
            return view('acquisition\acquisition-form');
        }
    }

    public function query(Request $request, $id = null){
        $attr = $request->all();

        if(isset($id)){
            $attr = array_add($attr,'id', $id);
        }

        $attr = array_add($attr, 'user_id', auth()->user()->id);
        $result = CF::model('Book')->saveData($attr);
        if($result['status'] == 'success'){
            return redirect()->route('acq-list');
        } else {
            return redirect()->route('acq-list')
                ->with('errors', true)
                ->with('result', $result);
        }
    }

    public function destroy(Request $request, $id){
        $model = CF::model('Book')::find($id);
        if($model->delete()){
            $request->session()->flash('alert-success', ' Record is deleted successfully.');
        } else {
            $request->session()->flash('alert-error', ' Record can\'t deleted');
        }
        return redirect()->route('acq-list');
    }
}
