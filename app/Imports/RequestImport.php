<?php
namespace App\Imports;

use App\Models\Acara;
use App\Models\Request;
use App\Models\Romo;
use App\Models\Umat;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RequestImport implements ToCollection, WithHeadingRow
{
    private $failedRows = [];

    /**
     * Mengambil data dari Excel ke dalam koleksi.
     *
     * @param Collection $collection
     * @return void
     */
    public function collection(Collection $collection)
    {
        $collection = $collection->slice(1);
        // Proses seluruh baris di dalam koleksi
        foreach ($collection as $row) {
            // $row['umat'] = isset($row['umat']) ? strval($row['umat']) : '';
            
            if (isset($row['jadwal_acara']) && is_numeric($row['jadwal_acara'])) {
                // Excel menyimpan tanggal sebagai angka, kita gunakan Carbon untuk konversi
                $row['jadwal_acara'] = Carbon::createFromFormat('Y-m-d', '1900-01-01')
                ->addDays($row['jadwal_acara'] - 2)  // Kurangi 2 karena Excel menggunakan 1 Januari 1900 sebagai hari pertama
                ->format('Y-m-d'); // Formatkan menjadi string tanggal
            }
            // Periksa baris data dan validasi
            // dd($collection);
            $row['romo'] = is_numeric($row['romo']) ? (int) $row['romo'] - 100 : null; 
            $row['acara'] = is_numeric($row['acara']) ? (int) $row['acara'] - 230 : null;
            $row['umat'] = is_numeric($row['umat']) ? (int) $row['umat'] - 1000 : null;

            // Validasi dengan Laravel Validator
            $validator = Validator::make($row->toArray(), [
                'acara' => 'required|integer|exists:acaras,id_acara',
                'umat' => 'required|integer|exists:umats,id_umat',
                'nama_terlibat_satu' => 'required|string',
                'nama_terlibat_dua' => 'nullable|string',
                'romo' => 'nullable|integer|exists:romos,id_romo',
                'jadwal_acara' => 'required|date',
                'deskripsi_pengajuan' => 'nullable|string',
            ], [
                'acara.required' => 'ID Acara harus diisi.',
                'acara.integer' => 'ID Acara harus berupa angka.',
                'acara.exists' => 'ID Acara yang dipilih tidak valid.',
                'umat.required' => 'ID Umat harus diisi.',
                'umat.integer' => 'ID Umat harus berupa angka.',
                'umat.exists' => 'ID Umat yang dipilih tidak valid.',
                'nama_terlibat_satu.required' => 'Nama Terlibat Satu harus diisi.',
                'nama_terlibat_satu.string' => 'Nama Terlibat Satu harus berupa teks.',
                'nama_terlibat_dua.string' => 'Nama Terlibat Dua harus berupa teks.',
                'romo.integer' => 'ID Romo harus berupa angka.',
                'romo.exists' => 'ID Romo yang dipilih tidak valid.',
                'jadwal_acara.required' => 'Jadwal Acara harus diisi.',
                'jadwal_acara.date' => 'Jadwal Acara harus berupa tanggal yang valid.',
                'deskripsi_pengajuan.string' => 'Deskripsi Pengajuan harus berupa teks.',
            ]);
            // dd($validator->fails());
            // Jika validasi gagal, simpan ke failedRows
            if ($validator->fails()) {
                $this->failedRows[] = [
                    'status' => implode(', ', $validator->errors()->all()),
                    'nama_acara' => $row['acara']+230,
                    'id_umat' => $row['umat']+1000,
                    'nama_terlibat_satu' => $row['nama_terlibat_satu'],
                    'nama_terlibat_dua' => $row['nama_terlibat_dua'],
                    'nama_romo' => $row['romo']+100 ?? null,
                    'jadwal_acara' => $row['jadwal_acara'],
                    'deskripsi_pengajuan' => $row['deskripsi_pengajuan'] ?? null,
                ];
                continue;
            }

            // Ambil data terkait dari database dan simpan
            $umat = Umat::where('id_umat', $row['umat'])->first();
            $romo = Romo::where('id_romo', $row['romo'])->first();
            $acara = Acara::where('id_acara', $row['acara'])->first();

            // Pastikan data terkait ada sebelum menyimpan
            
            if ($acara && $umat && $romo) {
                // dd('test');
                // dd('test');
                try {
                    // dd('test');
                    $hasil = Request::create([
                        'nama_acara' => $acara->nama_acara,
                        'id_umat' => $row['umat'],
                        'nama_terlibat_satu' => $row['nama_terlibat_satu'],
                        'nama_terlibat_dua' => $row['nama_terlibat_dua'],
                        'nama_romo' => $romo->nama_romo,
                        'jadwal_acara' => $row['jadwal_acara'],
                        'deskripsi_pengajuan' => $row['deskripsi_pengajuan'],
                        'status' => 'pending'
                    ]);
                    // dd($hasil);
                    //code...
                } catch (\Throwable $th) {
                    dd('ada yang salah');
                }
            }
            // dd('test2');
        }

        // Simpan baris yang gagal divalidasi ke dalam session
        Session::put('failed_rows', $this->failedRows);
    }

    /**
     * Mengembalikan baris yang gagal divalidasi.
     *
     * @return array
     */
    public function getFailedRows()
    {
        return $this->failedRows;
    }
}
