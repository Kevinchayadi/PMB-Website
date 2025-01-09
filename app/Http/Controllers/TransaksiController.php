<?php

namespace App\Http\Controllers;

use App\Exports\errorTransaction;
use App\Exports\TemplateEventImport;
use App\Imports\TransactionImport;
use App\Imports\transactionImports;
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
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{
    public function index()
    {
        $jadwal_acara = TransactionHeader::with([
            'romo',
            'seksis',
            'doa',
            'transactionDetails' => function ($query) {
                $query->with('umats', 'acara', 'admin');
            },
        ])
            ->where('status', 'coming')
            ->latest()
            ->paginate(20)
            ->withQueryString();
        // $jadwal_acara = TransactionHeader::with('romo', 'seksis', 'doa')->where('status', 'coming')->get();
        // dd($jadwal_acara->map(function ($transactionHeader) {
        //     return $transactionHeader->transactionDetails->acara->nama_acara;
        // }));

            // dd($jadwal_acara->all());
        return view('admin.viewPage.eventList', ['event' => $jadwal_acara]);
    }
    public function index2()
    {
        $jadwal_acara = TransactionHeader::with([
            'romo',
            'seksis',
            'doa',
            'transactionDetails' => function ($query) {
                $query->with('umats', 'acara', 'admin');
            },
        ])
            ->where('status', 'passed')
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.viewPage.passEvent', ['event' => $jadwal_acara]);
    }

    public function createTransaction()
    {
        $romos = Romo::get();
        $acaras = Acara::get();
        $seksis = Seksi::get();
        $doas = Doa::get();
        $umats = Umat::get();
        return view('admin.viewPage.createEvent', compact('romos', 'acaras', 'seksis', 'doas', 'umats'));
    }

    public function storeTransaction(Request $request)
    {
       $request->validate([
            'id_seksi' => 'nullable|array',
            'id_umat' => 'nullable|array',
       ]);
        $input = $request->validate([
             // id_umat adalah array
             'judul' => 'nullable|string',
            'id_romo' => 'nullable|integer|exists:romos,id_romo',
            'id_doa' => 'required|integer|exists:doas,id_doa',
            'jadwal_transaction' => 'required|date|after_or_equal:today',
        ]);
        $input2= $request->validate([
            'id_acara' => 'required|integer|exists:acaras,id_acara',
            'id_admin' => 'nullable|integer|exists:admins,id_admin',
            'deskripsi_transaksi' => 'nullable|string|max:255',
        ]);
    
        // Atur default 'judul' jika tidak ada
        $input['judul'] = $input['judul'] ?? 'tidak ada judul';
    
        // Parsing tanggal transaksi dan menentukan rentang waktu
        $jadwalTransaction = Carbon::parse($input['jadwal_transaction']);
        $startRange = $jadwalTransaction->copy()->subHours(4);
        $endRange = $jadwalTransaction->copy()->addHours(4);
        $input['jadwal_transaction'] = $jadwalTransaction->format('Y-m-d H:i:s');

        //cek jadwal transaction
        $acara = $input2['id_acara'];
        $checkTransaction = TransactionHeader::whereBetween('jadwal_transaction', [$startRange, $endRange])->whereHas('TransactionDetails', function($query) use($acara){
            $query->where('id_acara',$acara);
        })->get();
        if($checkTransaction->isNotEmpty()){
            return redirect()->back()->withErrors(['error' => 'Jadwal acara yang dipilih sudah tersedia.']);
        }
    
        // Cek ketersediaan Romo
        if (!$input['id_romo']) {
            $romoAvailable = Romo::whereDoesntHave('transactionHeaders', function ($query) use ($startRange, $endRange) {
                $query->whereBetween('jadwal_transaction', [$startRange, $endRange]);
            })->first();
    
            if (!$romoAvailable) {
                return redirect()->back()->withErrors(['error' => 'Tidak ada Romo yang tersedia pada tanggal ini.']);
            }
    
            $input['id_romo'] = $romoAvailable->id_romo;
        } else {
            $romo = Romo::whereHas('transactionHeaders', function ($query) use ($startRange, $endRange) {
                $query->whereBetween('jadwal_transaction', [$startRange, $endRange]);
            })->find($input['id_romo']);
    
            if ($romo) {
                return redirect()->back()->withErrors(['error' => 'Romo yang dipilih sudah memiliki jadwal pada waktu ini.']);
            }
        }
    
        try {
            DB::beginTransaction();
    
            // Buat header transaksi
            $header = TransactionHeader::create($input);
    
            // Menambahkan relasi many-to-many dengan umat
            if (isset($request->id_seksi)) {
                $header->seksis()->sync($request->id_seksi); // Sinkronisasi seksi yang dipilih
            }
            
    
            // Buat detail transaksi
            $input2 = array_merge($input2,['id_transaction' => $header->id_transaction]);
            $detail = TransactionDetail::create($input2);
            if (isset($request->id_umat)) {
                $detail->umats()->sync($request->id_umat); // Sinkronisasi umat yang dipilih
            }
            // Menambahkan relasi many-to-many dengan seksi
            
    
            DB::commit();
    
            return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil ditambahkan!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors('Terjadi kesalahan saat menyimpan data');
        }
    }
    
    public function updateTransaction($id)
    {
        $romos = Romo::get();
        $acaras = Acara::get();
        $seksis = Seksi::get();
        $doas = Doa::get();
        $umats = Umat::get();

        $event = TransactionHeader::with([
            'romo',
            'seksis',
            'doa',
            'transactionDetails' => function ($query) {
                $query->with('umats', 'acara', 'admin');
            },
        ])->find($id);
        $event->jadwal_transaction = Carbon::parse($event->jadwal_transaction);
        return view('admin.viewPage.UpdateEvent', compact('romos', 'acaras', 'seksis', 'doas', 'umats','event'));
    }
    public function updatedTransaction(Request $request, $id)
    {
        // dd($request->all());
        // Validasi input data
        $request->validate([
            'id_seksi' => 'nullable|array',
            'id_umat' => 'nullable|array',
        ]);
    
        $input = $request->validate([
            'judul' => 'nullable|string',
            'id_romo' => 'nullable|integer|exists:romos,id_romo',
            'id_doa' => 'required|integer|exists:doas,id_doa',
            'jadwal_transaction' => 'required|date|after_or_equal:today',
        ]);
    
        $input2 = $request->validate([
            'id_acara' => 'required|integer|exists:acaras,id_acara',
            'id_admin' => 'nullable|integer|exists:admins,id_admin',
            'deskripsi_transaksi' => 'nullable|string|max:255',
        ]);
    
        // Atur default 'judul' jika tidak ada
        $input['judul'] = $input['judul'] ?? 'tidak ada judul';
    
        // Parsing tanggal transaksi dan menentukan rentang waktu
        $jadwalTransaction = Carbon::parse($input['jadwal_transaction']);
        $startRange = $jadwalTransaction->copy()->subHours(4);
        $endRange = $jadwalTransaction->copy()->addHours(4);
        $input['jadwal_transaction'] = $jadwalTransaction->format('Y-m-d H:i:s');
    
        // Cek jadwal transaksi
        $acara = $input2['id_acara'];
        $checkTransaction = TransactionHeader::whereBetween('jadwal_transaction', [$startRange, $endRange])
            ->whereHas('TransactionDetails', function ($query) use ($acara) {
                $query->where('id_acara', $acara);
            })
            ->where('id_transaction', '!=', $id)  // Tidak mengecek untuk transaksi yang sedang diupdate
            ->get();
    
        if ($checkTransaction->isNotEmpty()) {
            return redirect()->back()->withErrors(['error' => 'Jadwal acara yang dipilih sudah tersedia.']);
        }
    
        // Cek ketersediaan Romo
        if (!$input['id_romo']) {
            $romoAvailable = Romo::whereDoesntHave('transactionHeaders', function ($query) use ($startRange, $endRange) {
                $query->whereBetween('jadwal_transaction', [$startRange, $endRange]);
            })->first();
    
            if (!$romoAvailable) {
                return redirect()->back()->withErrors(['error' => 'Tidak ada Romo yang tersedia pada tanggal ini.']);
            }
    
            $input['id_romo'] = $romoAvailable->id_romo;
        } else {
            $romo = Romo::whereHas('transactionHeaders', function ($query) use ($startRange, $endRange, $id) {
                $query->whereBetween('jadwal_transaction', [$startRange, $endRange])->where('id_transaction', '!=', $id);
            })->find($input['id_romo']);
    
            if ($romo) {
                return redirect()->back()->withErrors(['error' => 'Romo yang dipilih sudah memiliki jadwal pada waktu ini.']);
            }
        }
    
        // Begin Transaction untuk update
        DB::beginTransaction();
        
        try {
            // Update header transaksi
            $header = TransactionHeader::findOrFail($id);
            $header->update($input);
    
            // Menambahkan relasi many-to-many dengan seksi jika ada perubahan
            if (isset($request->id_seksi)) {
                $header->seksis()->sync($request->id_seksi); // Sinkronisasi seksi yang dipilih
            }
    
            // Update detail transaksi
            $input2 = array_merge($input2, ['id_transaction' => $header->id_transaction]);
            $detail = TransactionDetail::where('id_transaction', $id)->first();
            if ($detail) {
                $detail->update($input2);  // Update detail transaksi
            } else {
                // Jika detail transaksi tidak ditemukan, buat detail transaksi baru
                $detail = TransactionDetail::create($input2);
            }
    
            // Sinkronisasi umat jika ada perubahan
            if (isset($request->id_umat)) {
                $detail->umats()->sync($request->id_umat); // Sinkronisasi umat yang dipilih
            }
    
            // Commit perubahan jika semuanya berhasil
            DB::commit();
    
            return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil diperbarui!');
    
        } catch (\Throwable $th) {
            // Rollback jika terjadi error
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors('Terjadi kesalahan saat memperbarui data');
        }
    }
    public function deleteTransaction($id)
    {
        $transaction = TransactionHeader::where('status', 'coming')->find($id);
        $transaction->delete();
        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil di Delete!');
    }
    public function moveTransaction($id)
    {
        // dd('test');
        $transaction = TransactionHeader::where('status', 'coming')->find($id);
        $transaction->update(['status'=>'passed']);
        // dd($transaction->status);
        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil di Selesaikan!');
    }

    public function exportTemplate()
    {
        return Excel::download(new TemplateEventImport, 'event_Template.xlsx');
    }

 
    public function importEvent(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            // Ambil file yang diupload
            $file = $request->file('file');

            // Lakukan import data
            Excel::import(new transactionImports(), $file);

            // Cek apakah ada error pada file yang diupload
            $failedRows = session()->get('failed_rows', []);

            if (count($failedRows) > 0) {
                // Jika ada error, buat file Excel dan langsung download
                return Excel::download(new errorTransaction(), 'transaction_error.xlsx');
            } else {
                // Jika tidak ada error, arahkan ke halaman utama
                return redirect()->route('home')->with('success', 'Data berhasil diimport');
            }
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kembalikan error
            return redirect()->route('home')->with('error', 'Terjadi kesalahan saat mengimpor data');
        }
    }

}
