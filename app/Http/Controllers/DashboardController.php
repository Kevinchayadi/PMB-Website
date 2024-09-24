<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        //get acara
        $jadwal_acara = TransactionHeader::with([
            'romo',         
            'seksi',        
            'doa',          
            'transactionDetails' => function ($query) {
                $query->with('umats', 'acara', 'admin'); 
            },
        ])->whereHas('transactionDetails.acara',function ($query) {
            // Tambahkan kondisi yang kamu butuhkan untuk relasi acara, misalnya
            $query->whereIn('tipe_acara', ['public','event', 'private']);
        })->orderBy('jadwal_acara')->get();


        //get kegitan(yang akan dilakukan)
        $jadwal_kegiatan = TransactionHeader::with([
            'romo',         
            'seksi',        
            'doa',          
            'transactionDetails' => function ($query) {
                $query->with('umats', 'acara', 'admin'); 
            },
        ])->whereHas('transactionDetails.acara',function ($query) {
            // Tambahkan kondisi yang kamu butuhkan untuk relasi acara, misalnya
            $query->where('tipe_acara', 'kegiatan');
        })->orderBy('jadwal_acara')->get();

        return view("admin.dasboard",['jadwal_acara'=>$jadwal_acara ,'jadwal_kegiatan'=> $jadwal_kegiatan]);
    }
}
