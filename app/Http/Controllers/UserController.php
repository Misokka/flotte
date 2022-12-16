<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        Auth::user();
        $users = User::all();

        return view('user/index', [
            'users' => $users
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('user/show', ['user' => $user]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {

        $user = User::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'password' => Hash::make(STR::random(8)),
            'role_id' => $request->role_id,
        ]);

        return response()->redirectToRoute('dashboard.user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', ['user' => $user]);
    }

    public function update(User $id, Request $request)
    {

       $validate = $request->validate([
           'lastname' => 'string',
           'firstname' => 'string',
           'email' => 'string',
       ]);

       $id->update([
           'lastname' => $validate['lastname'],
           'firstname' => $validate['firstname'],
           'email' => $validate['email'],
       ]);

       return response()->redirectToRoute('dashboard.user.index');
    }

    public function delete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();


        return response()->redirectToRoute('dashboard.user.index');
    }
}
