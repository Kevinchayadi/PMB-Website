<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::with('roles')->get();
        return view('admin.index', ['admins' => $admins]);
    }


    public function addAdmin()
    {
        return view('admin.add');
    }


    public function storeAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins',
            'password' => 'required',
            'id_role' => 'required'
        ]);

        try {
            Admin::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'id_role' => $request->id_role
            ]);
            //code...
        } catch (\Throwable $th) {
            return redirect()->route('admin.admin-list')->with('error', 'Admin Gagal Ditambahkan');
        }


        return redirect()->route('admin.admin-list')->with('success', 'Admin Berhasil ditambahkan');
    }


    public function detailAdmin($slug)
    {
        $admin = Admin::with('roles')->where('username', $slug)->firstOrFail();
        return view('admin.detail', ['admin'=> $admin]);
    }


    public function updateAdmin(Request $request, $slug)
    {
        $admin = Admin::where('username', $slug)->firstOrFail();

        $request->validate([
            'username' => 'required|unique:admins,username,' . $admin->id,
            'password' => 'nullable',
            'id_role' => 'required'
        ]);
        try {
            $admin->slug = null;
            $admin->username = $request->username;
            if ($request->password) {
                $admin->password = Hash::make($request->password);
            }
            $admin->id_role = $request->id_role;
            $admin->save();
        } catch (\Throwable $th) {
            return redirect()->route('admin.admin-list')->with('Error', 'Admin gagal diUpdate!!');
        }

        return redirect()->route('admin.admin-list')->with('success', 'Admin berhasil diUpdate!!');
    }

    
    public function removeAdmin($slug)
    {
        $admin = Admin::where('username', $slug)->firstOrFail();
        $admin->delete();

        return redirect()->route('admin.admin-list')->with('success', 'Admin removed successfully');
    }

   
    public function adminRemoved()
    {
        $admins = Admin::with('roles')->onlyTrashed()->get();
        return view('admin.removed', ['admins' => $admins]);
    }

    
    public function restore($slug)
    {
        $admin = Admin::onlyTrashed()->where('username', $slug)->firstOrFail();
        $admin->restore();

        return redirect()->route('admin.removedList')->with('success', 'Admin restored successfully');
    }
}
