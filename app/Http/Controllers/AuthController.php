<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function index()
    {
        return view('user.login');
    }


    public function register()
    {
        return view('user.register');
    }

    public function forget()
    {
        return view('user.forget');
    }

    public function verification()
    {
        return view('user.verification');
    }

    public function store(Request $request)
    {
        
    }


    public function login(Request $request)
    {
       
    }

    public function logout(Request $request)
    {
       
    }


   
    public function profile(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        
    }


    public function destroy(string $id)
    {
        
    }


}
