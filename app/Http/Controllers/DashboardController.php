<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        
        $jadwal_acara = TransactionHeader::with([
            'romo',         
            'seksi',        
            'doa',          
            'transactionDetails' => function ($query) {
                $query->with('umats', 'acara', 'admin'); 
            },
        ])->whereHas('transactionDetails.acara',function ($query) {
            
            $query->whereIn('tipe_acara', ['public','event', 'private']);
        })->orderBy('jadwal_transaction')->get();


        
        $jadwal_kegiatan = TransactionHeader::with([
            'romo',         
            'seksi',        
            'doa',          
            'transactionDetails' => function ($query) {
                $query->with('umats', 'acara', 'admin'); 
            },
        ])->whereHas('transactionDetails.acara',function ($query) {
            
            $query->where('tipe_acara', 'kegiatan');
        })->orderBy('jadwal_transaction')->get();

        return view("dashboard.dashboard",['jadwal_acara'=>$jadwal_acara ,'jadwal_kegiatan'=> $jadwal_kegiatan]);
    }
}
