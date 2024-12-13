<?php

namespace App\Http\Controllers;

use App\Exports\EventExport;
use App\Exports\RequestExport;
use App\Exports\UmatExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function exportUmat(){
        return Excel::download(new UmatExport, 'umat.xlsx');
    }

    public function exportEvent($status){
        return Excel::download(new EventExport($status), 'event_' . $status . '.xlsx');
    }

    public function exportRequest($status){
        return Excel::download(new RequestExport($status), 'request_' . $status . '.xlsx');
    }
}
