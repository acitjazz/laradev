<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Validator;
use Session;

class RoleController extends Controller
{
     public function __construct()
     {
       $this->middleware('auth');
     }
    public function index()
    {
      $permissions = Permission::all();
      // $role = Role::findByName('editor');
      // $role->revokePermissionTo('all');
      $roles = Role::all();
      $users = User::all();
      return view('admin.user.role_permission',compact('roles','permissions','users'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'role_name' => 'required|max:255',
         ]);

         if ($validator->fails()) {
             return redirect()
                 ->back()
                 ->withInput()
                 ->withErrors($validator);
         }
         $role = new Role;
         $role->name = $request->role_name;
         $role->save();
         Session::flash('message', 'A new role has been added');
         return redirect()->back();
    }
    public function givepermission(Request $request)
    {
         $rolename = $request->role;
         $permission = $request->permission;
         $thisrole = Role::whereName($rolename)->first();
         $thisrole->givePermissionTo($permission);
         flash()->success('The '.$thisrole->name.' has been granted '.$permission.' permissions!');
         return redirect()->back();
    }
    public function usergiverole(Request $request)
    {
         $user = User::find($request->user);
         $user->assignRole($request->role);
         flash()->success('The '.$user->name.' has been granted '.$request->role.' role!');
         return redirect()->back();
    }
    public function usergivepermission(Request $request)
    {
         $user = User::find($request->user);
         $user->givePermissionTo($request->permission);
         flash()->success('The '.$user->name.' has been granted '.$request->permission.' permissions!');
         return redirect()->back();
    }
}
