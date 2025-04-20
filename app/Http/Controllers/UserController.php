<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $users = User::all();
        return view('manage-users', compact('users'));
    }

    // Menyimpan data pengguna baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:super_user,site,viewer',
            'site_id' => 'nullable|exists:sites,id',
        ]);

        if ($data['role'] === 'super_user') {
            $data['site_id'] = null;
        } else {
            // Kalau user login adalah super_user, ambil site_id dari form
            if (auth()->user()->role === 'super_user') {
                $data['site_id'] = $request->site_id;
            } else {
                // Kalau bukan super_user, fallback ke site_id user yang login
                $data['site_id'] = auth()->user()->site_id;
            }
        }

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('dashboard')->with('status', 'User berhasil ditambahkan');
    }
}
