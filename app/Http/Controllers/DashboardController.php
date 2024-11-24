<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use App\Models\Umat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $umat = Umat::get();
        $jadwal_acara = TransactionHeader::with(['romo', 'seksi', 'doa', 'transactionDetails' => function ($query) {
            $query->with('umats', 'acara', 'admin');
        }])->where('status', 'coming');

        return view("admin.viewPage.dashboard",['umat'=>$umat ,'event'=>$jadwal_acara]);
    }
}
