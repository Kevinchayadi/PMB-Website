<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Role;
use App\Models\Umat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function adminIndex()
    {
        $role = Role::with('admin')->get();
        return view('admin.login', ['role' => $role]);
    }

    function adminRegister(Request $request)
    {
        $request->validate([
            'username' => 'requried|string|max:255',
            'password' => 'rquested|string|min:8|confirmed',
            'role' => 'required',
        ]);
        $admin = Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Auth::guard('admin')->login($admin);

        return redirect('admin.dashboard');
    }

    function umatIndex()
    {
        return view('auth.umatRegister');
    }

    public function umatRegister(Request $request)
    {
        // dd($request->all());
        // Validasi data input dari form
        $request->validate([
            'nama_umat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'ttl_umat' => 'nullable|date',
            'wilayah' => 'required|string|max:255',
            'lingkungan' => 'required|string|max:255',
            'nomorhp_umat' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'status' => 'required|string',
            'pekerjaan' => 'required|string|max:255',
        ]);

        // Membuat user baru dan menyimpan ke database
        $umat = Umat::create([
            'nama_umat' => $request->nama_umat,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
            'ttl_umat' => $request->ttl_umat,
            'wilayah' => $request->wilayah,
            'lingkungan' => $request->lingkungan,
            'nomorhp_umat' => $request->nomohp_umat,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'pekerjaan' => $request->pekerjaan,
        ]);

        // Login otomatis setelah registrasi berhasil
        Auth::guard('web')->login($umat);

        // Redirect ke halaman home atau dashboard setelah login berhasil
        return redirect()->route('home')->with('success', 'Registrasi berhasil! Anda telah login.');
    }
}
