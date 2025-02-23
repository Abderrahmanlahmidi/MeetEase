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

    public function createReservation(Request $request){
        $request->validate([
            'salle_id' => '18',
            '=user_id' => '5',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'date_reservation' => 'required',
        ]);

        Reservation::create([
            'salle_id' => $request->input('salle_id'),
            'user_id' => $request->input('user_id'),
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
            'date_reservation' => $request->input('date_reservation'),
        ]);




    }




}




