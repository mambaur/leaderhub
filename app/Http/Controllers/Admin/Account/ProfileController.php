<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return view('admin.profile.index', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->user()->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::find(auth()->user()->id);
        if (!$user) {
            toast('User not found', 'error');
            return back()->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password =  Hash::make($request->password);
        }
        $user->save();

        if ($request->role) {
            $user->syncRoles([$request->role]);
        }

        toast('Profile successfully updated', 'success');
        return redirect()->route('profile_update');
    }
}
