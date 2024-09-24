<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;
use App\Models\TransactionHeader;

class LandingController extends Controller
{
    public function Home()
    {
        return view('ViewPage.home');
    }

    public function jadwal()
    {
        $transactions = TransactionHeader::with('transactionDelails')->get();

        return view('ViewPage.jadwal', ['transactions' => $transactions]);
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