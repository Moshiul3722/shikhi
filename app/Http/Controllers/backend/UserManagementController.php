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
        return view('backend.user-management.index');
    }

    public function roleIndex()
    {
        return view('backend.user-management.role.index')->with('roles', Role::orderBy('name', 'ASC')->get());
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
        } else if ($request->isMethod('put')) {
            $request->validate([
                'name' => 'required|unique:roles,name' . $request->id
            ]);

            Role::find($request->id)->update([
                'name' => Str::slug($request->name)
            ]);
        }

        return redirect()->back();
    }
}
