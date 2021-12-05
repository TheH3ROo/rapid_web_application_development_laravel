<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function index()
  {
      $users = Users::latest()->simplepaginate(5);
      return view("admin", compact('users'));
  }

  public function create()
    {
        return view('create-user');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "name" => "required",
                "password" => "required",
                "email" => "required"
            ]
        );
        $user = Users::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),
        ]);
        if(!is_null($user)) 
            return back()->with("success", "Success! User created");
        else 
            return back()->with("failed", "Alert! User not created");
    }

    public function show(Users $user)
    {
        return view('show-user', compact('user'));
    }

    public function edit(Users $user)
    {
        return view('edit-user', compact('user'));
    }

    public function update(Request $request, Users $user)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required"
        ]);
        if(is_null($request['role']))
            $request['role'] = '2';
        $user = $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),
        ]);
        if(!is_null($user))
            return back()->with("success", "Success! User updated");
        else
            return back()->with("failed", "Alert! User not updated");
    }

    public function destroy(Users $user)
    {
        $user = $user->delete();
        if(!is_null($user))
            return back()->with("success", "Success! User deleted");
        else
            return back()->with("failed", "Alert! User not deleted");
    }
} 