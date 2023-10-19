<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show()
    {
        $users = User::all();
        return view('tables', ['users' => $users]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();


        return redirect()->route('users-list');
        ;

    }
    public function formview()
    {
        return view('user');
    }
    public function update(Request $request)
    {
        // dd($request->userId);

        $this->validate($request, [
            'name' => 'required',
            // 'email' => 'required|email',
        ]);


        $user = User::find($request->userId);
        // dd($user);
        if (!$user) {
            return redirect()->route('users-list')->with('error', 'User not found');
        }

        $user->name = $request->input('name');
        $user->save();

        return redirect()->route('users-list')->with('success', 'User updated successfully');
    }
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users-list')->with('success', 'User Deleted successfully');
    }

}