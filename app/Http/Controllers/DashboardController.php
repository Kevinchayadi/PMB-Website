<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use App\Models\TransactionHeader;
use App\Models\Umat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $umat = Umat::count();
        $jadwal_acara = TransactionHeader::with([
            'romo',
            'seksis',
            'doa',
            'transactionDetails' => function ($query) {
                $query->with('umats', 'acara', 'admin');
            },
        ])->where('status', 'coming')
        ->orderBy('jadwal_transaction', 'asc') // mengurutkan berdasarkan tanggal
        ->take(2) // mengambil 2 record teratas
        ->get();
        $pending = ModelsRequest::where('status', 'pending')->count();
        $process = ModelsRequest::where('status', 'process')->count();
        $accepted = ModelsRequest::where('status', 'accepted')->count();
        $countScheduledEvent = TransactionHeader::where('status', 'coming')->count();
        $countPassEvent = TransactionHeader::with(['romo', 'seksi', 'doa', 'transactionDetails' => function ($query) {
            $query->with('umats', 'acara', 'admin');
        }])->where('status', 'pass')->count();
        // dd($jadwal_acara[0]->transactionDetails->acara->nama_acara);

        return view("admin.viewPage.dashboard",['umat'=>$umat ,'event'=>$jadwal_acara, 'pending'=>$pending, 'accepted'=>$accepted, 'process'=>$process, 'countSheduledEvent'=>$countScheduledEvent, 'CountPassEvent'=>$countPassEvent,'jadwal'=>$jadwal_acara]);
    }
}
