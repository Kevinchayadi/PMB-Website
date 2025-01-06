<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Articel;
use App\Models\Hightlight;
use Illuminate\Http\Request;
use App\Models\TransactionHeader;
use App\Models\Umat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LandingController extends Controller
{
    public function Home()
    {
        $highlight = Hightlight::get();
        // dd($highlight);
        return view('user.ViewPage.home', compact('highlight'));
    }

    public function Dashboard(){
        $jadwal_acara = TransactionHeader::with(['romo', 'seksi', 'doa', 'transactionDetails' => function ($query) {
            $query->with('umats', 'acara', 'admin')->where('umat_id', Auth::guard('web')->user()->umat_id);
        }])->where('status', 'coming')->get();
        return view('user.ViewPage.dashboard');
    }

    public function jadwal()
    {
        $transactions = TransactionHeader::with(['romo', 'seksi', 'doa', 'transactionDetails' => function ($query) {
            $query->with('umats', 'acara', 'admin')->where('umat_id', Auth::guard('web')->user()->umat_id);
        }])->where('status', 'coming')->get();
        
        return view('user.ViewPage.jadwal', ['transactions' => $transactions]);
    }

    public function jadwalDetail($id)
    {
        $transaction = TransactionHeader::with([
            'transactionDetails' => function ($query) {
                $query->with(['acara', 'umat']);
            },
        ])
            ->where('id_transaction', $id)
            ->firstOrFail();

        return view('user.ViewPage.jadwalDetail', ['transactions' => $transaction]);
    }

    public function artikel()
    {
        $artikel= Articel::get();
        return view('user.ViewPage.artikel', compact('artikel'));
    }

    public function artikeldetail($id)
    {
        $artikel= Articel::where('id', $id)
        ->firstOrFail();
        return view('user.ViewPage.artikeldetail', compact('artikel'));
    }

    public function layanan()
    {
        $layanan = Acara::with('transactionDetails')->get();
        return view('user.ViewPage.layanan', ['layanan' => $layanan]);

    }

    public function formPendaftaran()
    {
        return view('landing.formPendaftaran');
    }

    public function daftar(request $request)
    {
        try {
          $request->validate([
                'nama_umat' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'wilayah' => 'required|string|max:255',
                'lingkungan' => 'required|string|max:255',
                'nomohp_umat' => 'required|string|max:15',
                'alamat' => 'required|string|max:255',
                'status' => 'required|string',
                'pekerjaan' => 'required|string|max:255',
            ]);
    
            // Membuat user baru dan menyimpan ke database
            $umat = Umat::create([
                'nama_umat' => $request->nama_umat,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Enkripsi password
                'wilayah' => $request->wilayah,
                'lingkungan' => $request->lingkungan,
                'nomohp_umat' => $request->nomohp_umat,
                'alamat' => $request->alamat,
                'status' => $request->status,
                'pekerjaan' => $request->pekerjaan,
            ]);
    
            // Login otomatis setelah registrasi berhasil
            Auth::guard('web')->login($umat);
    
            // Redirect ke halaman home atau dashboard setelah login berhasil
            return redirect()->route('home')->with('success', 'Registrasi berhasil! Anda telah login.');
        } catch (\Throwable $th) {
            return back()->with('error','Register failed! Please try again Later...');
        }
        //disini return data dari database!!
        return view('landing.formPendaftaran');
    }
}
