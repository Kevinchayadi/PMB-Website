<?php

namespace App\Http\Controllers;

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
        return view('ViewPage.Doa');
    }

    public function Fasilitas()
    {
        return view('ViewPage.fasilitas');
    }

    public function pastor()
    {
        //disini harus return data pastor...
        return view('ViewPage.pastor');
    }

    public function Kegiatan()
    {
        //disini harus return
        return view('ViewPage.kegiatan');
    }
}
