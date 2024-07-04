<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $page_name = 'Staff';

        $staffUsers = User::where('role_id', Role::where('role_name', 'Staff')->first()->id)->get();
        return view('superadmin.staff.index', compact('page_name', 'staffUsers'));
    }

    public function create()
    {
        $page_name = 'Staff';

        return view('superadmin.staff.create', compact('page_name'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = Role::where('role_name', 'Staff')->first()->id;
        $user->save();

        return redirect()->route('staff.index')->with('success', 'Staff user created successfully.');
    }

    public function edit($id)
    {
        $page_name = 'Staff';

        $user = User::findOrFail($id);
        return view('superadmin.staff.edit', compact('page_name', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('staff.index')->with('success', 'Staff user updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('staff.index')->with('success', 'Staff user deleted successfully.');
    }
}