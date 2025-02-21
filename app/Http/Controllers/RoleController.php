<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function showRole(){
        $roles = Role::get();

        return view('dashboard/role/gererRoles', compact('roles'));
    }
}
