<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;
use Validator;

class PermissionController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'permission_name' => 'required|max:255',
         ]);

         if ($validator->fails()) {
             return redirect()
                 ->back()
                 ->withInput()
                 ->withErrors($validator);
         }

         $name = $request->input('permission_name');
         $permission = new Permission;
         $permission->name = $name;
         $permission->save();
         Session::flash('message', 'A new Permision has been added');
         return redirect()->back();
    }
}
