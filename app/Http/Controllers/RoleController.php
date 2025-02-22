<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function showRole(){
        $roles = Role::get();
        return view('dashboard/role/gererRoles', compact('roles'));
    }

    public function storeRole(Request $request){
        $request->validate([
            'role_name' => 'required',
        ]);

        Role::create([
            'role_name' => $request->input('role_name')
        ]);
        return redirect('/admin/role');
    }

    public function destroyRole(Role $role){
        $role->delete();
        return redirect('/admin/role');
    }

    public function editRole($id){
       $item = Role::find($id);
       return view('dashboard/role/editRole', compact('item'));
    }

    public function updateRole(Request $request, Role $role){
        $request->validate([
            'role_name' => 'required',
        ]);

        $role->update([
            'role_name' => $request['role_name']
        ]);

        return redirect('/admin/role');
    }


}
