<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $jadwal_acara = TransactionHeader::with(['romo', 'seksi', 'doa', 'transactionDetails' => function ($query) {
            $query->with('umats', 'acara', 'admin');
        }])->where('status', 'coming');

        return view('admin.viewPage.eventList', ['event'=>$jadwal_acara]);
    }

    public function createTransaction()
    {
        return view('admin.viewPage.createEvent');
    }
    public function storeTransaction(Request $request)
    {
        $input = $request->validate([
            'id_romo' => 'required|integer|exists:romos,id',         // Pastikan id_romo ada di tabel romos dan berupa integer
            'id_seksi' => 'required|integer|exists:seksis,id',       // Pastikan id_seksi ada di tabel seksis dan berupa integer
            'id_doa' => 'required|integer|exists:doas,id',           // Pastikan id_doa ada di tabel doas dan berupa integer
            'jadwal_transaction' => 'required|date|after_or_equal:today', // Pastikan jadwal_transaction adalah tanggal yang valid da
        ]);
        $input2 = $request->validate([
            'id_acara' => 'required|integer|exists:acaras,id',            // Pastikan id_acara ada di tabel acaras dan berupa integer
            'id_umat' => 'required|integer|exists:umats,id',               // Pastikan id_umat ada di tabel umats dan berupa integer
            'id_admin' => 'required|integer|exists:admins,id',             // Pastikan id_admin ada di tabel admins dan berupa integer
            'deskripsi_transaksi' => 'required|string|max:255',            // Pastikan deskripsi_transaksi tidak kosong, berupa string, dan maksimal 255 karakter
        ]);

        try {
            DB::beginTransaction();
            $header = TransactionHeader::create($input);
            $input2['id_transaction'] = $header->id_transaction;
            TransactionDetail::create($input2);
            DB::commit();
            //code...
            return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil ditambahkan!');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors('Terjadi kesalahan saat menyimpan data');
        }
    }
    public function updateTransaction($id)
    {
    }
    public function updatedTransaction(Request $request, $id)
    {
    }
    public function deleteTransaction($id)
    {
    }
}
