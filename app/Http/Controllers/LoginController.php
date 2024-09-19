<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    function adminIndex()
    {
        return view('admin.login');
    }

    function adminLogin(request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (
            Auth::guard(['admin'])->attempt(
                [
                    'username' => $credentials['username'],
                    'password' => $credentials['password'],
                ],
                $request->filled('remember'),
            )
        ) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin/login');
    }

    function umatIndex()
    {
        return view('umat.login');
    }

    function umatLogin($request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'], 
            'password' => ['required', 'string', 'min:8'], 
        ]);

        if (
            Auth::guard(['web'])->attempt(
                [
                    'username' => $credentials['username'],
                    'password' => $credentials['password'],
                ],
                $request->filled('remember'),
            )
        ) {
            return redirect()->route('umat.dashboard');
        }
        return redirect()->route('umat/login');
    }
}
