<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class artikelController extends Controller
{
    public function artikelIndex(){
        return view('admin.viewPage.landingpage.artikel.artikel');
    }
    public function addArtikel(){
        return view('admin.viewPage.landingpage.artikel.addArtikel');
    }
    public function storeArtikel(){

    }
    public function updateArtikel(){
        return view('admin.viewPage.landingpage.artikel.updateArtikel');
    }
    public function updatedArtikel(){

    }
    public function deleteArtikel(){

    }

}
