<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservation\reservation-index')
            ->with('reservations', $reservations);
    }

    public function destroy($id){
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->route('res-list');
    }
}
