<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Str;
use Spatie\Permission\Models\Role;

class UserManagementController extends Controller
{
    public function index()
    {
        return view('backend.user-management.user.index')
            ->with('users', User::orderBy('name', 'ASC')->get());;
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

    public function storeUser(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'userName'  => 'required|string|max:100',
            'email'     => 'required|unique:users,email',
            'phone'     => 'required|unique:users,phone',
            'password'  => 'required|confirmed|min:6',
            'thumbnail' => 'image',
            'status'    => 'required|not_in:none',
            'role'      => 'required|not_in:none'
        ]);

        $thumb = '';
        if (!empty($request->file('thumbnail'))) {
            $thumb = time() . '-' . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('public/uploads', $thumb);
        }

        // dd($request->all());
        User::create([
            'name'      => $request->name,
            'userName'  => $request->userName,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'status'    => $request->status,
            'role'      => $request->role,
            'password'  => $request->password,
            'thumbnail' => $thumb,
        ]);

        $msg = 'User added successfully';
        return redirect()->route('user.management.index')->with('success', $msg);
    }


    public function editUser(User $user)
    {
        return view('backend.user-management.user.edit')->with('user', $user);
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name'      => 'required|max:255',
            'userName'  => 'required|max:100',
            'email'     => 'required|email',
            'phone'     => 'string|max:20',
            // 'password' => 'confirmed|min:6',
            'thumbnail' => 'image',
            'status' => 'required|not_in:none',
            'role' => 'required|not_in:none'
        ]);

        $thumb = $user->thumbnail['fileName'];

        if (!empty($request->file('thumbnail'))) {
            Storage::delete('public/uploads/' . $thumb);
            $thumb = time() . '-' . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('public/uploads', $thumb);
        }

        User::find($user->id)->update([
            'name'     => $request->name,
            'userName' => $request->userName,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'status'    => $request->status,
            'role'    => $request->role,
            'password' => $request->password,
            'thumbnail' => $thumb,
        ]);

        $msg = 'User added successfully';
        return redirect()->route('user.management.index')->with('success', $msg);
    }

    public function destroyUser(User $user)
    {
        Storage::delete('public/uploads/' . $user->thumbnail['fileName']);
        $user->delete();
        $msg = 'User deleted Successfully';
        return redirect()->route('user.management.index')->with('success', $msg);
    }
}
