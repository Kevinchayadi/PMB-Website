<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;
use App\Models\TransactionHeader;

class LandingController extends Controller
{
    public function Home()
    {
        return view('landing.home');
    }

    public function profile()
    {
        return view('landing.profile');
    }

    public function sejarah()
    {
        return view('landing.sejarah');
    }

    public function Doa()
    {
        return view('landing.Doa');
    }

    public function Fasilitas()
    {
        return view('landing.fasilitas');
    }

    public function pastor()
    {
        //disini harus return data pastor...
        return view('landing.pastor');
    }

    public function Kegiatan()
    {
        //disini harus return
        return view('landing.kegiatan');
    }

    public function jadwal()
    {
        $transactions = TransactionHeader::with([
            'transactiondetails' => function ($query) {
                $query->with(['acara', 'umat']);
            },
        ])
            ->whereHas('transactionDetails.acara', function ($query) {
                $query->where('nama_acara', 'misa');
            })
            ->take(3)
            ->get();

        return view('landing.jadwat', ['transactions' => $transactions]);
    }

    public function jadwalDetail($id)
    {
        $transaction = TransactionHeader::with([
            'transactionDetails' => function ($query) {
                $query->with(['acara', 'umat']);
            }
        ])->where('id_transaksi', $id)
        ->first(); 
        
        return view('landing.jadwalDetail',['transactions' => $transaction]);
    }

    public function layanan()
    {
        $layanan = Acara::with("transactionDetails")->get();
        return view('landing.layanan',['layanan' => $layanan]);
    }

    public function formPendaftaran()
    {
        return view('landing.formPendaftaran');
    }

    public function daftar(request $request)
    {
        try {
        } catch (\Throwable $th) {
        }
        //disini return data dari database!!
        return view('landing.formPendaftaran');
    }
}
