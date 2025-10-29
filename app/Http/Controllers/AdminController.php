<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // ...existing code...
    // Tampilkan halaman dashboard admin
    public function dashboard()
    {
        // kirim data ringkas jika perlu, misalnya jumlah user / buku
        $userCount = User::count();

        return view('admin.dashboard', compact('userCount'));
    }

    // Daftar user (untuk manajemen user oleh admin)
    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    // Form edit user (mis. untuk ubah role)
    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update user (role atau field lain yang diperbolehkan)
    public function updateUser(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|in:user,admin',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($data);

        return redirect()->route('admin.users')->with('success', 'User updated.');
    }

    // Hapus user
    public function destroyUser(User $user)
    {
        // optional: hindari hapus diri sendiri
        if (auth()->id() === $user->id) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted.');
    }
    // ...existing code...
}