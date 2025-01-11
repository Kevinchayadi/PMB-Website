<?php

namespace App\Imports;

use App\Models\Romo;
use App\Models\Seksi;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Models\Umat;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionImport implements ToCollection, WithHeadingRow
{
    protected $failedRows = [];

    public function startRow(): int
    {
        return 3; // Mulai dari baris ketiga (melewatkan dua baris pertama)
    }

    public function collection(Collection $collection)
    {
        $collection = $collection->slice(1);
        foreach ($collection as $row) {
            // dd($collection);
            $row['id_umat'] = isset($row['id_umat']) ? strval($row['id_umat']) : '';
            
            if (isset($row['jadwal_transaction']) && is_numeric($row['jadwal_transaction'])) {
                // Excel menyimpan tanggal sebagai angka, kita gunakan Carbon untuk konversi
                $tanggal = Carbon::createFromFormat('Y-m-d', '1900-01-01')
                ->addDays($row['jadwal_transaction'] - 2) // Kurangi 2 karena Excel menggunakan 1 Januari 1900 sebagai hari pertama
                ->format('Y-m-d');
                // dd($collection);
                $jam_transaction = $row['jam_transaction']; // Formatkan menjadi string tanggal dengan jam dan menit
                $jamphp= ($jam_transaction * 24 * 60 * 60)-(7*60*60);
                $time = Carbon::createFromTimestamp($jamphp)->format('H:i:s');
                $tanggal_waktu = $tanggal . ' ' . $time;
                $waktu = Carbon::createFromFormat('Y-m-d H:i:s', $tanggal_waktu)
                ->format('Y-m-d H:i:s');
                // dd($waktu);
            }
            // Validasi data
            $row['id_romo'] = $row['id_romo'] - 100;
            $row['id_acara'] = $row['id_acara'] - 230;
            $row['id_doa'] = $row['id_doa'] - 700;
            // $row['id_umat'] = $row['id_umat']- 1000;
            // dd($row['id_romo']);
            $validator = Validator::make($row->toArray(), [
                'judul' => 'required|string|max:255',
                'id_romo' => 'required|exists:romos,id_romo',
                'id_seksi' => 'nullable|string',
                'id_acara' => 'required|exists:acaras,id_acara',
                'id_doa' => 'required|exists:doas,id_doa',
                'id_umat' => 'nullable|string', // id_umat akan diproses sebagai string yang berisi banyak ID
                'jadwal_transaction' => 'required|date|after_or_equal:today',
                'deskripsi_transaksi' => 'nullable|string|max:255',
            ]);

            // Jika validasi gagal, simpan kesalahan
            if ($validator->fails()) {
                $this->failedRows[] = [
                    'status' => implode(', ', $validator->errors()->all()),
                    'judul' => $row['judul'],
                    'id_romo' => $row['id_romo'] + 100,
                    'id_seksi' => $row['id_seksi'],
                    'id_acara' => $row['id_acara'] + 230,
                    'id_doa' => $row['id_doa'] + 700,
                    'id_umat' => $row['id_umat'] + 1000,
                    'jadwal_transaction' => $row['jadwal_transaction'],
                    'jam_transaction' => $row['jam_transaction'],
                    'deskripsi_transaksi' => $row['deskripsi_transaksi'] ?? null,
                ];
                continue; // Jika validasi gagal, lanjutkan ke baris berikutnya
            }
            $hasError = false;
            if (isset($row['id_umat'])) {
                $idUmatArray = preg_split('/[,;]\s*/', $row['id_umat']);
                $idUmatArray = array_map(function ($id) {
                    return $id - 1000;
                }, $idUmatArray); //
                foreach ($idUmatArray as $idUmat) {
                    // dd(!Umat::where('id_umat', $idUmat)->exists());
                    // Validasi jika ID Umat tidak ada dalam tabel 'umats'
                    if (!Umat::where('id_umat', $idUmat)->exists()) {
                        $this->failedRows[] = [
                            'status' => 'ID Umat yang diselect tidak valid',
                            'judul' => $row['judul'],
                            'id_romo' => $row['id_romo'] + 100,
                            'id_seksi' => $row['id_seksi'],
                            'id_acara' => $row['id_acara'] + 230,
                            'id_doa' => $row['id_doa'] + 700,
                            'id_umat' => $row['id_umat'] + 1000,
                            'jadwal_transaction' => $row['jadwal_transaction'],
                            'jam_transaction' => $row['jam_transaction'],
                            
                            'deskripsi_transaksi' => $row['deskripsi_transaksi'] ?? null,
                        ];
                        $hasError = true; // Set flag ke true jika ada kesalahan
                        break; // Jika ada ID Umat yang tidak valid, lanjutkan ke baris berikutnya
                    }
                }
            }

            if (isset($row['id_seksi'])) {
                $idSeksiArray = preg_split('/[,;]\s*/', $row['id_seksi']); // Pisahkan berdasarkan , atau
                $idSeksiArray = array_map(function ($id) {
                    return $id - 540;
                }, $idSeksiArray);
                foreach ($idSeksiArray as $idSeksi) {
                    // Validasi jika ID Umat tidak ada dalam tabel 'umats'
                    if (!Seksi::where('id_seksi', $idSeksi)->exists()) {
                        $this->failedRows[] = [
                            'status' => 'Id seksi yang dipilih Tidak Valid',
                            'judul' => $row['judul'],
                            'id_romo' => $row['id_romo'] + 100,
                            'id_seksi' => $row['id_seksi'],
                            'id_acara' => $row['id_acara'] + 230,
                            'id_doa' => $row['id_doa'] + 700,
                            'id_umat' => $row['id_umat'] + 1000,
                            'jadwal_transaction' => $row['jadwal_transaction'],
                            'jam_transaction' => $row['jam_transaction'],
                            'deskripsi_transaksi' => $row['deskripsi_transaksi'] ?? null,
                        ];
                        $hasError = true; // Set flag ke true jika ada kesalahan
                        break; // Jika ada ID Umat yang tidak valid, lanjutkan ke baris berikutnya
                    }
                }
            }
            if ($hasError) {
                continue;
            }

            $input = [
                'judul' => $row['judul'],
                'id_romo' => $row['id_romo'],
                'id_doa' => $row['id_doa'],
                'jadwal_transaction' => $waktu,
            ];

            $input2 = [
                'id_acara' => $row['id_acara'],
                'id_admin' => Auth::guard('admin')->id(),
                'deskripsi_transaksi' => $row['deskripsi_transaksi'],
            ];
            $input['judul'] = $input['judul'] ?? 'tidak ada judul';

            // Parsing tanggal transaksi dan menentukan rentang waktu
            $jadwalTransaction = Carbon::parse($input['jadwal_transaction']);
            $startRange = $jadwalTransaction->copy()->subHours(4);
            $endRange = $jadwalTransaction->copy()->addHours(4);
            $input['jadwal_transaction'] = $jadwalTransaction->format('Y-m-d H:i:s');

            //cek jadwal transaction
            $acara = $input2['id_acara'];
            $checkTransaction = TransactionHeader::whereBetween('jadwal_transaction', [$startRange, $endRange])
                ->whereHas('TransactionDetails', function ($query) use ($acara) {
                    $query->where('id_acara', $acara);
                })
                ->where('status', 'coming')
                ->get();
            if ($checkTransaction->isNotEmpty()) {
                $this->failedRows[] = [
                    'status' => 'ID Umat yang diselect tidak valid',
                    'judul' => $row['judul'],
                    'id_romo' => $row['id_romo'] + 100,
                    'id_seksi' => $row['id_seksi'],
                    'id_acara' => $row['id_acara'] + 230,
                    'id_doa' => $row['id_doa'] + 700,
                    'id_umat' => $row['id_umat'] + 1000,
                    'jadwal_transaction' => $row['jadwal_transaction'],
                    'jam_transaction' => $row['jam_transaction'],
                    'deskripsi_transaksi' => $row['deskripsi_transaksi'] ?? null,
                ];
                continue;
                // return redirect()
                //     ->back()
                //     ->withErrors(['error' => 'Jadwal acara yang dipilih sudah tersedia.']);
            }

            // Cek ketersediaan Romo
            if (!$input['id_romo']) {
                $romoAvailable = Romo::whereDoesntHave('transactionHeaders', function ($query) use ($startRange, $endRange) {
                    $query->whereBetween('jadwal_transaction', [$startRange, $endRange]);
                })->first();

                if (!$romoAvailable) {
                    $this->failedRows[] = [
                        'status' => 'ID Umat yang diselect tidak valid',
                        'judul' => $row['judul'],
                        'id_romo' => $row['id_romo'] + 100,
                        'id_seksi' => $row['id_seksi'],
                        'id_acara' => $row['id_acara'] + 230,
                        'id_doa' => $row['id_doa'] + 700,
                        'id_umat' => $row['id_umat'] + 1000,
                        'jadwal_transaction' => $row['jadwal_transaction'],
                        'jam_transaction' => $row['jam_transaction'],
                        'deskripsi_transaksi' => $row['deskripsi_transaksi'] ?? null,
                    ];
                    continue;
                    // return redirect()
                    //     ->back()
                    //     ->withErrors(['error' => 'Tidak ada Romo yang tersedia pada tanggal ini.']);
                }

                $input['id_romo'] = $romoAvailable->id_romo;
            } else {
                $romo = Romo::whereHas('transactionHeaders', function ($query) use ($startRange, $endRange) {
                    $query->whereBetween('jadwal_transaction', [$startRange, $endRange])->where('status', 'coming');
                })->find($input['id_romo']);

                if ($romo) {
                    $this->failedRows[] = [
                        'status' => 'ID Umat yang diselect tidak valid',
                        'judul' => $row['judul'],
                        'id_romo' => $row['id_romo'] + 100,
                        'id_seksi' => $row['id_seksi'],
                        'id_acara' => $row['id_acara'] + 230,
                        'id_doa' => $row['id_doa'] + 700,
                        'id_umat' => $row['id_umat'] + 1000,
                        'jadwal_transaction' => $row['jadwal_transaction'],
                        'jam_transaction' => $row['jam_transaction'],
                        'deskripsi_transaksi' => $row['deskripsi_transaksi'] ?? null,
                    ];
                    continue;
                    return redirect()
                        ->back()
                        ->withErrors(['error' => 'Romo yang dipilih sudah memiliki jadwal pada waktu ini.']);
                }
            }
            try {
                DB::beginTransaction();

                // Buat header transaksi
                $header = TransactionHeader::create($input);

                // Menambahkan relasi many-to-many dengan umat
                if (isset($row['id_seksi'])) {
                    $header->seksis()->sync($idSeksiArray); // Sinkronisasi seksi yang dipilih
                }

                // Buat detail transaksi
                $input2 = array_merge($input2, ['id_transaction' => $header->id_transaction]);
                $detail = TransactionDetail::create($input2);
                if (isset($row['id_umat'])) {
                    $detail->umats()->sync($idUmatArray); // Sinkronisasi umat yang dipilih
                }
                // Menambahkan relasi many-to-many dengan seksi

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $this->failedRows[] = [
                    'status' => 'ID Umat yang diselect tidak valid',
                    'judul' => $row['judul'],
                    'id_romo' => $row['id_romo'] + 100,
                    'id_seksi' => $row['id_seksi'],
                    'id_acara' => $row['id_acara'] + 230,
                    'id_doa' => $row['id_doa'] + 700,
                    'id_umat' => $row['id_umat'] + 1000,
                    'jadwal_transaction' => $row['jadwal_transaction'],
                    'jam_transaction' => $row['jam_transaction'],
                    'deskripsi_transaksi' => $row['deskripsi_transaksi'] ?? null,
                ];
                continue;
            }

            //---------------------------------------------------------------------------------------------------
            // Simpan Acara ke dalam tabel acaras
            // $acaraId = DB::table('acaras')->insertGetId([
            //     'judul' => $row['judul'],
            //     'id_romo' => $row['id_romo']+100,
            //     'id_seksi' => $row['id_seksi'],
            //     'id_acara' => $row['id_acara']+230,
            //     'id_doa' => $row['id_doa']+700,
            //     'jadwal_transaction' => $row['jadwal_transaction'],
            //     'deskripsi_transaksi' => $row['deskripsi_transaksi'] ?? null,
            // ]);

            // // Insert ke tabel pivot acara_umat (many-to-many)
            // $acara = Acara::find($acaraId);
            // $acara->umats()->sync($idUmatArray); // sync akan menyambungkan ID umat dengan acara yang baru dimasukkan
        }

        // Simpan failed rows ke dalam session untuk pengecekan di controller
        Session::put('failed_rows', $this->failedRows);
    }
}
