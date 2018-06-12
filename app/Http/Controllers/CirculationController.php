<?php

namespace App\Http\Controllers;

use App\Circulation;
use App\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Library\ClassFactory as CF;

class CirculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $circulations = Circulation::all();
        return view('circulation/circulation-list')
            ->with('circulations', $circulations);
    }

    public function form($id = null){

        //Id is not null, update form show
        if(isset($id)){
            $circulation = Circulation::find($id);
            $books = Book::all();
            return view('circulation/circulation-form')
                ->with('id', $id)
                ->with('circulation', $circulation)
                ->with('books',$books);
        }
        else{
            $books = Book::all();
            return view('circulation/circulation-form')
                        ->with('books',$books);
        }
    }

    public function query(Request $request, $id = null){
        $attr = $request->all();

        if(isset($id)){
            $attr = array_add($attr,'id', $id);
            $timestamp = Carbon::now();
            $attr = array_add($attr, 'returned_at', $timestamp);
        }
        $attr = array_add($attr, 'returned_at', null);
        $attr = array_add($attr, 'user_id', auth()->user()->id);

        $result = CF::model('Circulation')->saveData($attr);
        //dd($result);
        if($result['status'] == 'success'){
            return redirect()->route('circ-list');
        } else {

            return redirect()->route('circ-list')
                ->with('errors', true)
                ->with('result', $result);
        }
    }

    public function destroy(Request $request, $id){
        $model = CF::model('Circulation')::find($id);
        if($model->delete()){
            $request->session()->flash('alert-success', ' Record is deleted successfully.');
        } else {
            $request->session()->flash('alert-error', ' Record can\'t deleted');
        }
        return redirect()->route('circ-list');
    }
}
