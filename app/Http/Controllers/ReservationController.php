<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Routing\Controller;

class ReservationController extends Controller
{
    public function showReservation()
    {
        $reservations = Reservation::with('utilisateur', 'salle')->get();
        return view('dashboard/reservation/gererReservation', compact('reservations'));
    }
}




