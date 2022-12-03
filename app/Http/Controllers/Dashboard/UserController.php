<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware(['role:super_admin']);
    }


    public function index()
    {
        $users =User::all();
        return view('dashboard.users.index',compact('users'));
    }
    
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3|max:90',
            'email'=>'required',
            'password'=>'required|confirmed|min:6',
            'roles'=>'required'
        ]);

        // $data = $request->all();
        $password = Hash::make($request->password);
        if(Hash::check($request->password_confirmation, $password))
        {
            $data = [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ];
            $user = User::create($data);
            $user->syncRoles($request->roles);
            
            $notification = array(
                'message' => 'تم اضافه المستخدم', 
                'alert-type' => 'success'
            );
            return redirect()->route('user.index')->with($notification);
        }else {
            $notification_error = array(
                'message' => 'حدثت مشكله', 
                'alert-type' => 'error'
            );
            return redirect()->route('user.index')->with($notification_error);
      
        }
      
       

    }

    public function edit($id)
    {
        $notification_error = array(
            'message' => 'المستخدم غير موجود', 
            'alert-type' => 'error'
        );
        $user = User::find($id);
        $roles = Role::all();
        if(!$user)
        {
            return redirect()->back()->with($notification_error);
        }else{
            return view('dashboard.users.edit',compact('user','roles'));
        }
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|min:3|max:90',
            'email'=>'required',
            'roles'=>'required'
        ]);

        $data = User::find($id);
        $data->update($request->all());
        $data->syncRoles($request->roles);
        $notification = array(
            'message' => 'تم تحديث المستخدم', 
            'alert-type' => 'info'
        );
        return redirect()->route('user.index')->with($notification);
    }

    public function delete($id)
    {
        $user =  User::find($id);
        if($user){
            $notification = array(
                'message' => 'تم حدف بنجاح', 
                'alert-type' => 'success'
            );
            $user->delete();
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array(
                'message' => 'حدثت مشكله برجاء االمحاوله مره اخري', 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);            
        }
    }



}
