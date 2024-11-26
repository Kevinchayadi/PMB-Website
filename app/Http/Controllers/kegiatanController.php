<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kegiatanController extends Controller
{
    public function kegiatanIndex(){
        return view('admin.viewPage.landingpage.kegiatan.kegiatan');
    }
    public function addKegiatan(){
        return view('admin.viewPage.landingpage.kegiatan.addKegiatan');
    }
    public function storeKegiatan(){

    }
    public function updateKegiatan(){
        return view('admin.viewPage.landingpage.kegiatan.updateKegiatan');
    }
    public function updatedKegiatan(){

    }
    public function deleteKegiatan(){

    }

}
