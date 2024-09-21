<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public function index()
    {
        $acara = Acara::with('transactionDetail')->get();
        return view('admin.listAcara', ['acara' => $acara]);
    }

    public function add($request){
        $request->validate();
        return view('admin.addAcara');
    }

    public function store(Request $request){
        
    }

}
