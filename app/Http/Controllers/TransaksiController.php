<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Doa;
use App\Models\Romo;
use App\Models\Seksi;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Models\Umat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $jadwal_acara = TransactionHeader::with(['romo', 'seksi', 'doa', 'transactionDetails' => function ($query) {
            $query->with('umats', 'acara', 'admin');
        }])->where('status', 'coming')->get();

        return view('admin.viewPage.eventList', ['event' => $jadwal_acara]);
    }
    public function index2()
    {
        $jadwal_acara = TransactionHeader::with(['romo', 'seksi', 'doa', 'transactionDetails' => function ($query) {
            $query->with('umats', 'acara', 'admin');
        }])->where('status', 'done');

        return view('admin.viewPage.pastEvent', ['event'=>$jadwal_acara]);
    }

    public function createTransaction()
    {
        $romos = Romo::get();
        $acaras = Acara::get();
        $seksis = Seksi::get();
        $doas = Doa::get();
        $umats = Umat::get();
        return view('admin.viewPage.createEvent',compact('romos', 'acaras', 'seksis','doas','umats'));
    }
    public function storeTransaction(Request $request)
    {
        $request->validate([
'id_seksi' => 'nullable|integer|exists:seksis,id_seksi',
'id_umat' => 'nullable|array',

        ]);
        $input = $request->validate([
            'id_romo' => 'nullable|integer|exists:romos,id_romo',         // Pastikan id_romo ada di tabel romos dan berupa integer
                   // Pastikan id_seksi ada di tabel seksis dan berupa integer
            'id_doa' => 'required|integer|exists:doas,id_doa',           // Pastikan id_doa ada di tabel doas dan berupa integer
            'jadwal_transaction' => 'required|date|after_or_equal:today', // Pastikan jadwal_transaction adalah tanggal yang valid da
        ]);
        $input2 = $request->validate([
            'id_acara' => 'required|integer|exists:acaras,id_acara',            // Pastikan id_acara ada di tabel acaras dan berupa integer
             // Pastikan id_umat ada di tabel umats dan berupa integer
            'id_admin' => 'nullable|integer|exists:admins,id-admin',             // Pastikan id_admin ada di tabel admins dan berupa integer
            'deskripsi_transaksi' => 'nullable|string|max:255',            // Pastikan deskripsi_transaksi tidak kosong, berupa string, dan maksimal 255 karakter
        ]);
        // dd($request->all());
        if (!isset($input['judul'])) {
            $input['judul'] = "tidak ada judul";
        }

        $jadwalTransaction = Carbon::parse($input['jadwal_transaction']);
        $startRange = $jadwalTransaction->copy()->subHours(4); // 4 jam sebelumnya
        $endRange = $jadwalTransaction->copy()->addHours(4);

        $input['jadwal_transaction'] =  $jadwalTransaction->copy()->format('Y-m-d H:i:s');
        // dd($endRange);

        if (!$input['id_romo']) {
            // Jika id_romo tidak dipilih, cari Romo yang tidak memiliki jadwal pada tanggal tertentu
            $input['id_romo'] = Romo::whereDoesntHave('transactionHeaders', function ($query) use ($startRange, $endRange) {
                $query->whereBetween('jadwal_transaction', [$startRange, $endRange]);
            })->first();
        
            if (!$input['id_romo']) {
                // Jika tidak ada Romo yang tersedia, berikan pesan error
                return response()->json(['error' => 'Tidak ada Romo yang tersedia pada tanggal ini.'], 400);
            }
        } else {
            // Jika id_romo dipilih, periksa apakah Romo sudah memiliki jadwal pada hari dan waktu yang sama
            $romo = Romo::whereHas('transactionHeaders', function ($query) use ($startRange, $endRange) {
                $query->whereBetween('jadwal_transaction', [$startRange, $endRange]);
            })->find($input['id_romo']);
        
            if ($romo) {
                // Jika Romo memiliki jadwal pada hari dan waktu yang sama, kembalikan pesan error
                return response()->json(['error' => 'Romo yang dipilih sudah memiliki jadwal pada waktu ini.'], 400);
            }
        }
        
        // try {
            DB::beginTransaction();
            dd($request->all());
            $header = TransactionHeader::create($input);
            $input2['id_transaction'] = $header->id_transaction;
            TransactionDetail::create($input2);
            DB::commit();
            //code...
            return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil ditambahkan!');
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     DB::rollBack();
        //     return redirect()->back()->withInput()->withErrors('Terjadi kesalahan saat menyimpan data');
        // }
    }
    public function updateTransaction($id)
    {
    }
    public function updatedTransaction(Request $request, $id)
    {
        $input = $request->validate([
            'judul' => 'required|string',
            'id_romo' => 'required|integer|exists:romos,id',         // Validasi id_romo
            'id_seksi' => 'required|integer|exists:seksis,id',       // Validasi id_seksi
            'id_doa' => 'required|integer|exists:doas,id',           // Validasi id_doa
            'jadwal_transaction' => 'required|date|after_or_equal:today', // Validasi jadwal_transaction
        ]);
    
        $input2 = $request->validate([
            'id_acara' => 'required|integer|exists:acaras,id',       // Validasi id_acara
            'id_umat' => 'required|integer|exists:umats,id',         // Validasi id_umat
            'id_admin' => 'required|integer|exists:admins,id',       // Validasi id_admin
            'deskripsi_transaksi' => 'required|string|max:255',      // Validasi deskripsi_transaksi
        ]);
        
        $existingTransaction = TransactionHeader::where('jadwal_transaction', $input['jadwal_transaction'])->first();

        if ($existingTransaction) {
            return redirect()->back()->withInput()->withErrors(['jadwal_transaction' => 'Transaksi dengan jadwal yang sama sudah ada.'])->withInput();
        }

        try {
            DB::beginTransaction();
    
            // Update data di tabel TransactionHeader
            $header = TransactionHeader::findOrFail($id);
            $header->update($input);
    
            // Update data di tabel TransactionDetail
            $detail = TransactionDetail::where('id_transaction', $header->id_transaction)->firstOrFail();
            $detail->update($input2);
    
            DB::commit();
    
            // Redirect ke halaman daftar transaksi dengan pesan sukses
            return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil diperbarui!');
        } catch (\Throwable $th) {
            DB::rollBack();
            // Kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withInput()->withErrors('Terjadi kesalahan saat memperbarui data');
        }
    }
    public function deleteTransaction($id)
    {
    }
}
