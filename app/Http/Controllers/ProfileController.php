<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Doa;
use App\Models\Romo;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function profile()
    {
        return view('ViewPage.profile');
    }

    public function sejarah()
    {
        return view('ViewPage.sejarah');
    }

    public function Doa()
    {
        $doa = Doa::with('transaction_headers')->get();

        return view('ViewPage.doa' . ['doa' => $doa]);
    }

    public function Fasilitas()
    {
        return view('ViewPage.fasilitas');
    }

    public function pastor()
    {
        $romo = Romo::with('transaction_headers')->get();
        return view('ViewPage.pastor', ['romo' => $romo]);
    }

    public function Kegiatan()
    {
        $kegiatan = Acara::with('dokumentations')->where('tipe_acara', 'kegiatan')->get();
        return view('ViewPage.kegiatan', ['kegiatan' => $kegiatan]);
    }
}
