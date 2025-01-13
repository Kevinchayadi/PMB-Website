<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Doa;
use App\Models\Kegiatan;
use App\Models\Romo;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
        $doa = Doa::with('transactionHeaders')->get();

        return view('user.ViewPage.doa', ['doa' => $doa]);
    }

    public function Fasilitas()
    {
        return view('user.ViewPage.fasilitas');
    }

    public function pastor()
    {
        $romo = Romo::with('transactionHeaders')->get();
        return view('user.ViewPage.pastor', ['romo' => $romo]);
    }

    public function Kegiatan()
    {
        $kegiatan = Kegiatan::get();
        dd($kegiatan);
        return view('user.ViewPage.kegiatan', ['kegiatan' => $kegiatan]);
    }
}
