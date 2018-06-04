<?php

namespace App\Http\Controllers;

use App\Circulation;
use Illuminate\Http\Request;

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

    public function form($id = null, $added_by = null, $returned_at = null){
        //Id is not null, update form show
        if(isset($id)){
            $circulation = Circulation::find($id);
            dd($circulation);
            return view('circulation/circulation-form')
                ->with('circulation', $circulation);
        }
        else{
            return view('circulation/circulation-form');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Circulation  $circulation
     * @return \Illuminate\Http\Response
     */
    public function show(Circulation $circulation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Circulation  $circulation
     * @return \Illuminate\Http\Response
     */
    public function edit(Circulation $circulation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Circulation  $circulation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Circulation $circulation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Circulation  $circulation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Circulation $circulation)
    {
        //
    }
}
