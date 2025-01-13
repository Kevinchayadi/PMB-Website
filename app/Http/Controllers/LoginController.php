<?php

namespace App\Http\Controllers;

use App\Models\Umat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    function adminIndex()
    {
        return view('auth.adminLogin');
    }

    function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
        ], [
            'password.required' => 'Kolom kata sandi harus diisi.',
            'password.min' => 'Kolom kata sandi harus memiliki minimal :min karakter.',
        ]);

        if (
            Auth::guard('admin')->attempt(
                [
                    'username' => $credentials['username'],
                    'password' => $credentials['password'],
                ],
                $request->filled('remember'),
            )
        ) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors('Gagal masuk, mohon cek kembali alamat email dan kata sandi!');
    }

    function socialitePage()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleLogin()
    {
        
        // $googleUser = Socialite::driver('google')->user();
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Update or create user record based on google_id
            $user = Umat::updateOrCreate(
                ['google_id' => $googleUser->getId()],
                [
                    'nama_umat' => $googleUser->getName(),
                    'email_umat' => $googleUser->getEmail(),
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken,
                    ]
                );
            //     dd('test');
            // dd($user);
            
            // Login the user
            Auth::guard('web')->login($user);
    
            // Redirect to dashboard or other page
            return redirect('/home');
            
        } catch (\Exception $e) {
            // Log exception or handle error gracefully
            return redirect()->route('umat.login')->with('error', 'Terjadi kesalahan saat masuk');
        }
    }

    function umatIndex()
    {
        return view('auth.umatLogin');
    }

    function umatLogin(Request $request)
    {
        $request->validate([
            'email_umat' => ['required',  'email'],
            'password' => ['required', 'min:8'],
        ]);
        
        // Ambil kredensial dari request
        $credentials = $request->only('email_umat', 'password');
        
        // Cek apakah pengguna ingin menggunakan fitur "Remember Me"
        $remember = $request->filled('remember');
        
        // Coba untuk login dengan kredensial yang telah divalidasi
        if (Auth::guard('web')->attempt($credentials, $remember)) {
            // Jika login berhasil, arahkan ke halaman dashboard
            return redirect()->route('home');
        }
    
        // Jika login gagal, kembalikan dengan pesan error
        return back()->withErrors('Gagal masuk, pastikan alamat email dan kata sandi Anda benar.');
    }
}
