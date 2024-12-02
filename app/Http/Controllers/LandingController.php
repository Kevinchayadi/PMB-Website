<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Hightlight;
use Illuminate\Http\Request;
use App\Models\TransactionHeader;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function Home()
    {
        $hightlight = Hightlight::get();
        return view('user.ViewPage.home',compact('hightlight'));
    }

    public function Dashboard(){
        $transaction = TransactionHeader::with(['romo', 'seksi', 'doa', 'transactionDetails' => function ($query) {
            $query->with('umats', 'acara', 'admin')->where('user_id', Auth::guard('web')->user()->id);
        }])->where('status', 'coming');
        return view('user.ViewPage.dashboard');
    }

    public function jadwal()
    {
        $transactions = TransactionHeader::with('transactionDelails')->get();

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
            ->first();

        return view('user.ViewPage.jadwalDetail', ['transactions' => $transaction]);
    }

    public function artikel()
    {
        return view('user.ViewPage.artikel');
    }

    public function artikeldetail($id)
    {
        return view('user.Viewpage.artikeldetail');
    }

    public function layanan()
    {
        $layanan = Acara::with('transactionDetails')->get();
        return view('user.Viewpage.layanan', ['layanan' => $layanan]);
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
