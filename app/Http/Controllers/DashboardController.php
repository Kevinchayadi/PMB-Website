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
        $jadwal_acara = TransactionHeader::with(['romo', 'seksis', 'doa', 'transactionDetails' => function ($query) {
            $query->with('umats', 'acara', 'admin');
        }])->where('status', 'coming')->get();
        $pending = ModelsRequest::where('status', 'pending')->count();
        $process = ModelsRequest::where('status', 'process')->count();
        $accepted = ModelsRequest::where('status', 'accepted')->count();
        $countScheduledEvent = $jadwal_acara->count();
        $countPassEvent = TransactionHeader::with(['romo', 'seksi', 'doa', 'transactionDetails' => function ($query) {
            $query->with('umats', 'acara', 'admin');
        }])->where('status', 'pass')->count();

        return view("admin.viewPage.dashboard",['umat'=>$umat ,'event'=>$jadwal_acara, 'pending'=>$pending, 'accepted'=>$accepted, 'process'=>$process, 'countSheduledEvent'=>$countScheduledEvent, 'CountPassEvent'=>$countPassEvent]);
    }
}
