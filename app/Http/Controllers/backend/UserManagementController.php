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
        $request->validate([
            'name' => 'required'
        ]);

        Role::create([
            'name' => Str::lower($request->name)
        ]);

        return redirect()->back();
    }
}
