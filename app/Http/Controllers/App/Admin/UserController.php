<?php

namespace App\Http\Controllers\App\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::paginate(10);   
        return view('app.admin.users.index', ['users' => $users]);
    }
    public function create()
    {
        return view('app.admin.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:8',
            'fist_name' => 'min:2',
            'last_name' => 'min:2',
            'middle_name' => 'min:2',
            'suffix' => 'min:1',
            'gender' => 'min:2',
            'email' => 'required|email|unique:users',
            'level' => 'required',
            'password' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);

        $newUser = User::create([
            'name' => $data['name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'middle_name' => $data['middle_name'],
            'suffix' => $data['suffix'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $newRole = Role::create([
            'level' => $data['level'],
            'status' => 1,
            'user_id' => $newUser->id,
        ]);

        return redirect(route('app.admin.users.index'))->with('status', 'User has been succesfully saved!');
    }

    public function modify(User $user)
    {
        return view('app.admin.users.modify', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|min:8',
            'fist_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'middle_name' => 'required|min:2',
            'suffix' => 'required|min:1',
            'gender' => 'required|in:MALE,FEMALE,Other',
            'level' => 'required',
            'status' => 'required',
        ]);

        $user->update(['name' => $data['name']]);

        $user->role->update([
            'level' => $data['level'],
            'status' => $data['status'],
        ]);

        return redirect(route('app.admin.users.modify', ['user' => $user]))->with('status', 'User has been successfully updated!');
    }

    public function delete(User $user)
    {
        return view('app.admin.users.delete', ['user' => $user]);
    }

    public function destroy(User $user)
    {
       $user->delete();

       return redirect(route('app.admin.users.index'))->with('status', 'User has been succesfully deleted!');
    }

    public function reset(User $user)
    {
        return view('app.admin.users.reset', ['user' => $user]);
    }

    public function resetOk(User $user)
    {
       $user->update(['password' => Hash::make('P@ssw0rd')]);

       return redirect(route('app.admin.users.index'))->with('status', 'User password has been succesfully reset!');
    }
}
