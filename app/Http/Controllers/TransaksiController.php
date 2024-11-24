<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $jadwal_acara = TransactionHeader::with(['romo', 'seksi', 'doa', 'transactionDetails' => function ($query) {
            $query->with('umats', 'acara', 'admin');
        }])->where('status', 'coming');

        return view('admin.dashboard', ['event'=>$jadwal_acara]);
    }

    public function createTransaction()
    {
    }
    public function storeTransaction()
    {
    }
    public function editTransaction($id)
    {
    }
    public function updateTransaction(Request $request, $id)
    {
    }
    public function deleteTransaction($id)
    {
    }
}
