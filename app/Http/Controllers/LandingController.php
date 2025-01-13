<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Articel;
use App\Models\Hightlight;
use Illuminate\Http\Request;
use App\Models\TransactionHeader;
use App\Models\TransactionDetail;
use App\Models\Umat;
use App\Models\Request as ModelsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class LandingController extends Controller
{
    public function Home()
    {
        $highlight = Hightlight::get();
        $artikel = Articel::inRandomOrder()->take(6)->get()->map(function ($artikel) {
            $artikel->body = Str::limit($artikel->body, 50);
            return $artikel;
        });
        $jadwal = TransactionHeader::with(['romo', 'seksis', 'doa', 'transactionDetails' => function ($query) {
            $query->with('umats', 'acara', 'admin');
        }])->where('status', 'coming')->take(3)->get();
        return view('user.ViewPage.home', compact('highlight', 'artikel', 'jadwal'));
    }

    public function history(){
        $jadwal_acara = ModelsRequest::where('id_umat', Auth::user()->id_umat)->latest()->paginate(20)->withQueryString();
        return view('user.ViewPage.history', compact('jadwal_acara'));
    }

    public function jadwal()
    {
        $transactions = TransactionHeader::with(['romo', 'seksis', 'doa', 'transactionDetails' => function ($query) {
            $query->with('umats', 'acara', 'admin');
        }])->where('status', 'coming')->get();
        
        return view('user.ViewPage.jadwal', ['transactions' => $transactions]);
    }

    public function jadwalDetail($id)
    {
        $transaction = TransactionHeader::with([
            'transactionDetails' => function ($query) {
                $query->with(['acara', 'umats']);
            },
        ])
            ->where('id_transaction', $id)
            ->firstOrFail();

        $highlight = Hightlight::get();

        if(!Auth::check()){
            $isRegister = FALSE;
        }
        else{
            $isRegister = TransactionDetail::where('id_transaction', $id)->whereHas('umats', function ($query) {
            $query->where('umats.id_umat', Auth::user()->id_umat);
        })->exists();
        };


        $moreTransaction = TransactionHeader::with(['romo', 'seksis', 'doa', 'transactionDetails' => function ($query) {
            $query->with('umats', 'acara', 'admin');
        }])->where('status', 'coming')->where('id_transaction', '!=', $id)->inRandomOrder()->take(2)->get()->map(function ($moreTransaction) {
            $moreTransaction->transactionDetails->deskripsi_transaksi = Str::limit($moreTransaction->body, 50);
            return $moreTransaction;
        });;
        
        return view('user.ViewPage.jadwalDetail', compact('transaction', 'highlight', 'moreTransaction', 'isRegister'));
    }

    public function artikel()
    {
        $artikel= Articel::get()->map(function ($artikel) {
            $artikel->body = Str::limit($artikel->body, 100);
            return $artikel;
        });;
        return view('user.ViewPage.artikel', compact('artikel'));
    }

    public function artikeldetail($slug)
    {
        $artikel= Articel::where('slug', $slug)
        ->firstOrFail();
        $moreArtikel = Articel::where('slug', '!=', $slug)->inRandomOrder()->take(2)->get()->map(function ($moreArtikel) {
            $moreArtikel->body = Str::limit($moreArtikel->body, 50);
            return $moreArtikel;
        });;
        return view('user.ViewPage.artikeldetail', compact('artikel', 'moreArtikel'));
    }

    public function layanan()
    {
        $layanan = Acara::with('transactionDetails')->get();
        return view('user.ViewPage.layanan', ['layanan' => $layanan]);

    }

    public function formPendaftaran()
    {
        return view('landing.formPendaftaran');
    }

    public function daftar(request $request)
    {
        try {
          $request->validate([
                'nama_umat' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'wilayah' => 'required|string|max:255',
                'lingkungan' => 'required|string|max:255',
                'nomorhp_umat' => 'required|string|max:15',
                'alamat' => 'required|string|max:255',
                'status' => 'required|string',
                'pekerjaan' => 'required|string|max:255',
            ]);
    
            // Membuat user baru dan menyimpan ke database
            $umat = Umat::create([
                'nama_umat' => $request->nama_umat,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Enkripsi password
                'wilayah' => $request->wilayah,
                'lingkungan' => $request->lingkungan,
                'nomorhp_umat' => $request->nomorhp_umat,
                'alamat' => $request->alamat,
                'status' => $request->status,
                'Pekerjaan' => $request->Pekerjaan,
            ]);
    
            // Login otomatis setelah registrasi berhasil
            Auth::guard('web')->login($umat);
    
            // Redirect ke halaman home atau dashboard setelah login berhasil
            return redirect()->route('home')->with('success', 'Registrasi berhasil! Anda telah masuk.');
        } catch (\Throwable $th) {
            return back()->with('error','Registrasi gagal, silahkan coba lagi!');
        }
        //disini return data dari database!!
        return view('landing.formPendaftaran');
    }

    public function updateProfile(Request $request, $slug)
    {
        //dd($request);
        $profile = Umat::get()->where('slug', $slug)->firstOrFail();
        
        // Validasi data input dari form
        $request->validate([
            'nama_umat' => 'required|string|max:255',
            'nama_baptis' => 'required|string|max:255',
            'ttl_umat' => 'nullable|date',
            'wilayah' => 'required|string|max:255',
            'lingkungan' => 'required|string|max:255',
            'nomorhp_umat' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'status' => 'required|string',
            'Pekerjaan' => 'required|string|max:255',
        ]);

        // Ambil semua input dari request
        $input = $request->only([
            'nama_umat',
            'nama_baptis',
            'ttl_umat',
            'wilayah',
            'lingkungan',
            'nomorhp_umat',
            'alamat',
            'status',
            'Pekerjaan',
        ]);

        DB::beginTransaction();

        try {
            // Update profile dengan data yang sudah divalidasi
            $profile->update($input);
        
            DB::commit();

            // Redirect ke halaman home atau dashboard setelah login berhasil
            return redirect()->route('home')->with('success', 'Sukses memperbarui data diri');
        } catch (\Exception $e) {
            // Jika terjadi error, rollback transaksi
            DB::rollBack();
            return redirect()->back()->withErrors('Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function registerJadwal($slug){
        $transactionDetail = TransactionDetail::with('umats')->where('id_transaction', $slug)->first();

        // Jika tidak kosong, kita akan periksa dan tambahkan ke tabel pivot
        if ($transactionDetail) {
            // Ambil id_umat yang terhubung dengan transactionDetail
            $existingUmats = $transactionDetail->umats->pluck('id')->toArray();

            // Periksa apakah id_umat pengguna sudah ada di pivot
            if (!in_array(Auth::user()->id_umat, $existingUmats)) {
                // Jika belum ada, tambahkan ke pivot
                $transactionDetail->umats()->attach(Auth::user()->id_umat);
            }
        }
        return back()->with('success', 'Sukses ikut acara!');
    }
}
