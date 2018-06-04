<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OPACController extends Controller
{
    public function index(){
        return "Make view at views/OPAC named 'OPAC-index.blade.php'";
        //return view('OPAC/OPAC-index');
    }
}
