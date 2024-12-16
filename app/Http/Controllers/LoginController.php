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

        return back()->with('error', 'gagal login, tolong untuk dicek kembali email dan password!');
    }

    function socialitePage()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleLogin()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            // dd();
    
            // Update or create user record based on google_id
            $user = Umat::updateOrCreate(
                ['google_id' => $googleUser->getId()],
                [
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken,
                ]
            );
    
            // Login the user
            Auth::guard('web')->login($user);
    
            // Redirect to dashboard or other page
            return redirect('/dashboard');
            
        } catch (\Exception $e) {
            // Log exception or handle error gracefully
            return redirect()->route('login')->with('error', 'There was an error during the login process.');
        }
    }
    

    function umatIndex()
    {
        return view('auth.umatLogin');
    }

    function umatLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (
            Auth::guard('web')->attempt(
                [
                    'email' => $credentials['email'],
                    'password' => $credentials['password'],
                ],
                $request->filled('remember'),
            )
        ) {
            return redirect()->route('user.viewPage.dashboard');
        }
        return back()->with('error', 'gagal login, tolong untuk dicek kembali email dan password!');
    }
}
