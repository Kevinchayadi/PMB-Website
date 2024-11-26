<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class doaController extends Controller
{
    public function doaIndex(){
        return view('admin.viewPage.landingpage.doa.doa');
    }
    public function addDoa(){
        return view('admin.viewPage.landingpage.doa.addDoa');
    }
    public function storeDoa(){

    }
    public function updateDoa(){
        return view('admin.viewPage.landingpage.doa.updateDoa');
    }
    public function updatedDoa(){

    }
    public function deleteDoa(){

    }

}
