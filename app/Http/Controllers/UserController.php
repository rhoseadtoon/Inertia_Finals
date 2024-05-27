<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function index() {
        $users = User::orderBy('id')->get();

        return inertia('Users/List', [
            'users' => $users
        ]);
    }

    public function create() {
        return inertia('Users/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/List');
    }

    public function show(User $user) {
        return inertia('Users/Show', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user) {
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6'
        ]);

        if (!empty($fields['password'])) {
            $fields['password'] = Hash::make($fields['password']);
        } else {
            unset($fields['password']);
        }

        $user->update($fields);
        return redirect('/List');
    }

    public function destroy(User $user){
        $user->delete();
        
        return redirect('/List');
    }
}
