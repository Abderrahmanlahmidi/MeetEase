<?php

namespace App\Http\Controllers;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class SalleController extends Controller
{
    public function show()
    {
        $salles = Salle::get();
        return view('dashboard/salle/salles', compact('salles'));
    }

    public function showSalles()
    {
        $salles = Salle::get();
        return view('dashboard/salle/gererSalles', compact('salles'));
    }

    public function storeSalle(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'capacite' => 'required',
            'prix' => 'required',
        ]);

        Salle::create([
            'nom' => $request['nom'],
            'capacite' => $request['capacite'],
            'prix' => $request['prix']
        ]);
        return redirect('/admin/salle');
    }

    public function destroySalle(Salle $salle)
    {
        $salle->delete();
        return redirect('/admin/salle');
    }

    public function editSalle($id)
    {
        $item = Salle::find($id);
        return view('dashboard/salle/editSalle', compact('item'));
    }

    public function updateSalle(Request $request, Salle $salle){
        $request->validate([
            'nom' => 'required',
            'capacite' => 'required',
            'prix' => 'required',
        ]);
        $salle->update([
            'nom' => $request['nom'],
            'capacite' => $request['capacite'],
            'prix' => $request['prix']
        ]);
        return redirect('/admin/salle');
    }

}




