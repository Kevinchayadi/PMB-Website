<?php

namespace App\Http\Controllers;

use App\Models\Umat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function adminIndex(){
        return view('admin.login');
    }

    function adminRegister(request $request){

    }

    function umatIndex(){
        return view('auth.umatRegister');
    }

    public function umatRegister(Request $request)
    {
        dd($request->all());
        // Validasi data input dari form
        // $request->validate([
        //     'nama_umat' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed', 
        //     'wilayah' => 'required|string|max:255',
        //     'lingkungan' => 'required|string|max:255',
        //     'nomohp_umat' => 'required|string|max:15', 
        //     'alamat' => 'required|string|max:255',
        //     'status' => 'required|string',
        //     'pekerjaan' => 'required|string|max:255',
        // ]);

        // // Membuat user baru dan menyimpan ke database
        // $umat = Umat::create([
        //     'nama_umat' => $request->nama_umat,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password), // Enkripsi password
        //     'wilayah' => $request->wilayah,
        //     'lingkungan' => $request->lingkungan,
        //     'nomohp_umat' => $request->nomohp_umat,
        //     'alamat' => $request->alamat,
        //     'status' => $request->status,
        //     'pekerjaan' => $request->pekerjaan,
        // ]);

        // // Login otomatis setelah registrasi berhasil
        // Auth::guard('web')->login($umat);

        // // Redirect ke halaman home atau dashboard setelah login berhasil
        // return redirect()->route('home')->with('success', 'Registrasi berhasil! Anda telah login.');
    }
}
