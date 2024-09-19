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

        $user1 = DB::connection('mysql')
            ->table('admin')
            ->where('username', $credentials['username_admin'])
            ->first();

        $user2 = DB::connection('pgsql')
            ->table('admin')
            ->where('username', $credentials['username_admin'])
            ->first();

        if (!$user1 && !$user2) {
            $user1 = DB::connection('mysql')
                ->table('romo')
                ->where('username', $credentials['username_admin'])
                ->first();

            $user2 = DB::connection('pgsql')
                ->table('romo')
                ->where('username', $credentials['username_admin'])
                ->first();

            if (
                Auth::guard(['romo'])->attempt(
                    [
                        'username' => $credentials['username'],
                        'password' => $credentials['password'],
                    ],
                    $request->filled('remember'),
                )
            ) {
                return redirect()->route('dashboard');
            }
            return redirect()->route('admin/login');
        }

        if (
            Auth::guard(['admin'])->attempt(
                [
                    'username' => $credentials['username'],
                    'password' => $credentials['password'],
                ],
                $request->filled('remember'),
            )
        ) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('admin/login');
    }

    function umatIndex()
    {
    }

    function umatLogin()
    {
    }
}
