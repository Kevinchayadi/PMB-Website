<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class TransaksiController extends Controller
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
            $query->whereIn('tipe_acara', ['public', 'private']);
        })->orderBy('jadwal_acara')->get();

        $jadwal_event = TransactionHeader::with([
            'romo',         
            'seksi',        
            'doa',          
            'transactionDetails' => function ($query) {
                $query->with('umats', 'acara', 'admin'); 
            },
        ])->whereHas('transactionDetails.acara',function ($query) {
            $query->where('tipe_acara', 'event');
        })->orderBy('jadwal_acara')->get();


        
        $jadwal_kegiatan = TransactionHeader::with([
            'romo',         
            'seksi',        
            'doa',          
            'transactionDetails' => function ($query) {
                $query->with('umats', 'acara', 'admin'); 
            },
        ])->whereHas('transactionDetails.acara',function ($query) {
            $query->where('tipe_acara', 'kegiatan');
        })->orderBy('jadwal_acara')->get();

        return view("admin.dasboard",['jadwal_acara'=>$jadwal_acara ,'jadwal_kegiatan'=> $jadwal_kegiatan, 'jadwal_event' => $jadwal_event]);
    }
}
