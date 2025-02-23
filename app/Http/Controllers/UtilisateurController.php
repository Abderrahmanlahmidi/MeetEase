<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UtilisateurController extends Controller
{

    public function showUtilisateur()
    {
        $utilisateurs = Utilisateur::with('role')->get();
        return view('dashboard/utilisateur/gererUtilisateur', compact('utilisateurs'));
    }


    public function createUtilisateur(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'age' => 'required',
            'password' => 'required',
            'role_id' => 'required|exists:roles,id',
        ]);

        Utilisateur::create([
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'email' => $request['email'],
            'age' => $request['age'],
            'password' => bcrypt($request['password']),
            'role_id' => $request['role_id'],
        ]);

        return redirect('/admin/utilisateur');
    }

    public function destroyUtilisateur(Utilisateur $utilisateur){
            $utilisateur->delete();
            return redirect('/admin/utilisateur');
    }

    public function editUtilisateur($id){
        $item = Utilisateur::find($id);
        return view('dashboard/utilisateur/editUtilisateur', compact('item'));
    }

    public function updateUtilisateur(Request $request, Utilisateur $utilisateur){
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'age' => 'required',
            'role_id' => 'required|exists:roles,id'
        ]);

        $utilisateur->update([
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'email' => $request['email'],
            'age' => $request['age'],
            'role_id' => $request['role_id'],
        ]);
        return redirect('/admin/utilisateur');
    }


}
