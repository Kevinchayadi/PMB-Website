<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Doa;
use App\Models\Romo;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function visiMisi()
    {
        return view('user.ViewPage.visimisi');
    }

    public function sejarah()
    {
        return view('user.ViewPage.sejarah');
    }

    public function doa()
    {
        $doa = Doa::with('transaction_headers')->get();

        return view('user.ViewPage.doa', ['doa' => $doa]);
    }

    public function Fasilitas()
    {
        return view('user.ViewPage.fasilitas');
    }

    public function pastor()
    {
        $romo = Romo::with('transaction_headers')->get();
        return view('user.ViewPage.pastor', ['romo' => $romo]);
    }

    public function Kegiatan()
    {
        $kegiatan = Acara::with('dokumentations')->where('tipe_acara', 'kegiatan')->get();
        return view('user.ViewPage.kegiatan', ['kegiatan' => $kegiatan]);
    }
}
