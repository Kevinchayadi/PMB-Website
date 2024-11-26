<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pastorController extends Controller
{
    public function pastorIndex(){
        return view('admin.viewPage.landingpage.pastor.Pastor');
    }
    public function addPastor(){
        return view('admin.viewPage.landingpage.pastor.addPastor');
    }
    public function storePastor(){

    }
    public function updatePastor(){
        return view('admin.viewPage.landingpage.pastor.updatePastor');
    }
    public function updatedPastor(){

    }
    public function deletePastor(){

    }

}
