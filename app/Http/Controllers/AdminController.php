<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $admins = Admin::with('roles')->when($search, function ($query, $search) {
            $query->where('username', 'like', '%' . $search . '%')
                  ->orWhereHas('roles', function ($query) use ($search) {
                      $query->where('role', 'like', '%' . $search . '%');
                  });
        })->latest()->paginate(20
        )->withQueryString();

        return view('admin.viewPage.adminlist', ['admins' => $admins]);
    }

    public function addAdmin()
    {
        $roles = Role::get();
        return view('admin.viewPage.adminAdd', compact('roles'));
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins',
            'password' => 'required|string|min:8|confirmed',
            'id_role' => 'required',
        ]);
        // dd($request);

        try {
            Admin::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'id_role' => $request->id_role,
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('admin.admin-list')->with('error', 'Admin Gagal Ditambahkan');
        }

        return redirect()->route('admin.admin-list')->with('success', 'Admin Berhasil ditambahkan');
    }

    public function detailAdmin($slug)
    {
        
        $roles = Role::get();
        $admin = Admin::with('roles')->where('username', $slug)->first();
        // dd($admin);
        return view('admin.viewPage.adminUpdate', ['admin' => $admin, 'roles' => $roles]);
        
    }

    public function updateAdmin(Request $request, $slug)
    {
        // dd($slug);
        $admin = Admin::where('username', $slug)->firstOrFail();

        $request->validate([
            'username' => 'required|unique:admins',
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required',
        ]);
        try {
            $admin->slug = null;
            $admin->username = $request->username;
            if ($request->password) {
                $admin->password = Hash::make($request->password);
            }
            $admin->id_role = $request->role;
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
