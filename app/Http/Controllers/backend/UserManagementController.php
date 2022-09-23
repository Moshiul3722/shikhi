<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Spatie\Permission\Models\Role;

class UserManagementController extends Controller
{
    public function index()
    {
        return view('backend.user-management.user.index');
    }

    public function roleIndex()
    {
        return view('backend.user-management.user.index')->with('roles', Role::orderBy('name', 'ASC')->get());
    }

    public function roleStore(Request $request)
    {

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|unique:roles,name'
            ]);

            Role::create([
                'name' => Str::slug($request->name)
            ]);

            $msg = 'Created Successfully';
        } else if ($request->isMethod('put')) {
            $request->validate([
                'name' => 'required|unique:roles,name,' . $request->id
            ]);

            Role::find($request->id)->update([
                'name' => Str::slug($request->name)
            ]);

            $msg = 'Updated Successfully';
        }

        return redirect()->back()->with('success', $msg);
    }

    public function createUser()
    {
        return view('backend.user-management.user.addUser');
    }

    public function userStore(Request $request)
    {
        # code...
    }
}
