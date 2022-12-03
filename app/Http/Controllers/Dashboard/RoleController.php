<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
class RoleController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware(['role:super_admin']);
    }

    
    public function index()
    {
        $roles = Role::all();
        return view('dashboard.roles.index',compact('roles'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('dashboard.roles.edit',compact('role'));
    }
    public function permission($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('dashboard.roles.permission',compact('role','permissions'));
    }

    public function updateRole(Request $request,$id)
    {
        $request->validate([
            'display_name'=>'required',
            'description'=>'required',
        ]);

        $data = $request->all();
        $role = Role::find($id);
        $role->update($data);
        $notification = array(
            'message' => 'تم تحديث الوظيفه', 
            'alert-type' => 'success'
        );
        return redirect()->route('role.index')->with($notification);
    }


    public function updatePermission(Request $request,$id)
    {
        $role = Role::find($id);
        $role->syncPermissions($request->permissions);
        $notification = array(
            'message' => 'تم تحديث الصلاحيه', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
