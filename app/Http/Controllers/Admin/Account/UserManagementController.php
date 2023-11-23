<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();
        return view('admin.user-managements.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user-managements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        $role = Role::where('name', $request->role)->first();
        if ($role) {
            $user->syncRoles([$request->role]);
        }

        toast('User baru berhasil ditambahkan.', 'success');
        return redirect()->route('user_management_list');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            toast('User tidak ditemukan..', 'error');
            return back()->withInput();
        }

        if ($user->email == 'garudafiberapp@gmail.com' && auth()->user()->email != 'garudafiberapp@gmail.com') {
            toast('Anda tidak memiliki akses untuk mengupdate user ini.', 'error');
            return back()->withInput();
        }

        return view('admin.user-managements.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id
        ]);

        $user = User::find($id);
        if (!$user) {
            toast('User tidak ditemukan..', 'error');
            return back()->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $role = Role::where('name', $request->role)->first();
        if ($role) {
            $user->syncRoles([$request->role]);
        }

        toast('User berhasil diupdate.', 'success');
        return redirect()->route('user_management_list');
    }

    /**
     * Update password
     */
    public function changePassword(Request $request, string $id)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::find($id);
        if (!$user) {
            toast('User tidak ditemukan..', 'error');
            return back()->withInput();
        }

        $user->password =  Hash::make($request->password);
        $user->save();

        toast('Password berhasil diupdate.', 'success');
        return redirect()->route('user_management_list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            toast('User tidak ditemukan..', 'error');
            return back()->withInput();
        }

        if ($user->email == 'garudafiberapp@gmail.com') {
            toast('User ini tidak dapat dihapus.', 'error');
            return back()->withInput();
        }

        DB::beginTransaction();

        $user->updated_by = auth()->user()->id;
        $user->email = Str::random(5) . $user->email;
        $user->save();
        $user->delete();

        DB::commit();

        toast('User berhasil dihapus.', 'success');
        return redirect()->route('user_management_list');
    }
}
