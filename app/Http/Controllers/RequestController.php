<?php

namespace App\Http\Controllers;

use App\Exports\errorRequest;
use App\Exports\requestStoreTemplate;
use App\Imports\RequestImports;
use App\Imports\transactionImports;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RequestController extends Controller
{
    public function BaptisIndex()
    {
        return view('umat.baptisForm');
    }

    public function BaptisSubmit(Request $request)
    {
        $request->validate([
            'namaAcara' => 'required|string|max:255',
            'id_umat' => 'required|integer|exists:umats,id',
            'umat_terlibat_satu' => 'required|string',
            'nama_romo' => 'required|string|max:255',
            'jadwal_acara' => 'required|date',
            'deskripsi_pengajuan' => 'nullable|string',
        ]);
        ModelsRequest::create($request->all());
        return redirect()->route('home')->with('success', 'Pengajuan baptis berhasil dikirim!');
    }

    public function tobatIndex()
    {
        return view('umat.tobatForm');
    }

    public function tobatSubmit(Request $request)
    {
        $request->validate([
            'namaAcara' => 'required|string|max:255',
            'id_umat' => 'required|integer|exists:umats,id',
            'umat_terlibat_satu' => 'required|string',
            'umat_terlibat_dua' => 'required|nullable|string',
            'deskripsi_pengajuan' => 'nullable|string',
        ]);
        ModelsRequest::create($request->all());
        return redirect()->route('home')->with('success', 'Pengajuan baptis berhasil dikirim!');
    }

    public function komuniPertamaIndex()
    {
        return view('umat.KomuniPertamaForm');
    }

    public function komuniPertamaSubmit(Request $request)
    {
        $request->validate([
            'namaAcara' => 'required|string|max:255',
            'id_umat' => 'required|integer|exists:umats,id',
            'umat_terlibat_satu' => 'required|string',
            'deskripsi_pengajuan' => 'nullable|string',
        ]);
        ModelsRequest::create($request->all());
        return redirect()->route('home')->with('success', 'Pengajuan baptis berhasil dikirim!');
    }

    public function krismaIndex()
    {
        return view('umat.krismaForm');
    }

    public function krismaSubmit(Request $request)
    {
        $request->validate([
            'namaAcara' => 'required|string|max:255',
            'id_umat' => 'required|integer|exists:umats,id',
            'umat_terlibat_satu' => 'required|string',
            'umat_terlibat_dua' => 'required|nullable|string',
            'deskripsi_pengajuan' => 'nullable|string',
        ]);
        ModelsRequest::create($request->all());
        return redirect()->route('home')->with('success', 'Pengajuan baptis berhasil dikirim!');
    }

    public function pernikahanIndex()
    {
        return view('umat.pernikahanForm');
    }

    public function pernikahanSubmit(Request $request)
    {
        $request->validate([
            'nama_acara' => 'required|string|max:255',
            'id_umat' => 'required|integer|exists:umats,id',
            'umat_terlibat_satu' => 'required|string',
            'umat_terlibat_dua' => 'required|nullable|string',
            'nama_romo' => 'required|string|max:255',
            'jadwal_acara' => 'required|date',
            'deskripsi_pengajuan' => 'nullable|string',
        ]);
        ModelsRequest::create($request->all());
        return redirect()->route('home')->with('success', 'Pengajuan baptis berhasil dikirim!');
    }

    public function PengurapanIndex()
    {
        return view('umat.pengurapanForm');
    }

    public function PengurapanSubmit(Request $request)
    {
        $request->validate([
            'namaAcara' => 'required|string|max:255',
            'id_umat' => 'required|integer|exists:umats,id',
            'umat_terlibat_satu' => 'required|string',
            'deskripsi_pengajuan' => 'nullable|string',
        ]);
        ModelsRequest::create($request->all());
        return redirect()->route('home')->with('success', 'Pengajuan baptis berhasil dikirim!');
    }

    public function KematianIndex()
    {
        return view('umat.kematianForm');
    }

    public function KematianSubmit(Request $request)
    {
        $request->validate([
            'namaAcara' => 'required|string|max:255',
            'id_umat' => 'required|integer|exists:umats,id',
            'umat_terlibat_satu' => 'required|string',
            'deskripsi_pengajuan' => 'required|string',
        ]);
        ModelsRequest::create($request->all());
        return redirect()->route('home')->with('success', 'Pengajuan baptis berhasil dikirim!');
    }
    public function storeRequest(Request $request)
    {
        // dd($request->all());
        $data=[];
        if($request->nama_acara=="pernikahan"){
            $data=$request->validate([
                'nama_acara' => 'required|string|max:255',
                'id_umat' => 'required|integer|exists:umats,id_umat',
                'nama_terlibat_satu' => 'required|string',
                'nama_terlibat_dua' => 'required|string',
                'nama_romo' => 'nullable|string|max:255',
                'jadwal_acara' => 'required|date',
                'deskripsi_pengajuan' => 'nullable|string',
            ]);
        }else{
            $data=$request->validate([
                'nama_acara' => 'required|string|max:255',
                'id_umat' => 'required|integer|exists:umats,id_umat',
                'nama_terlibat_satu' => 'required|string',
                'nama_terlibat_dua' => 'nullable|string',
                'nama_romo' => 'nullable|string|max:255',
                'jadwal_acara' => 'required|date',
                'deskripsi_pengajuan' => 'nullable|string',
            ]);
        }
   
        
        // dd($data);
        ModelsRequest::create($data);
        return redirect()->route('home')->with('success', 'Pengajuan baptis berhasil dikirim!');
    }

    public function pendingListRequest()
    {
        $requestList = ModelsRequest::where('status','pending')->get();
        // dd($requestList);
        return view('admin.viewPage.pendingRequest', ['requestList' => $requestList]);
    }
    public function processListRequest()
    {
        $requestList = ModelsRequest::where('status','process')->get();
        return view('admin.viewPage.processRequest', ['requestList' => $requestList]);
    }
    public function acceptedListRequest()
    {
        $requestList = ModelsRequest::where('status','accepted')->get();
        return view('admin.viewPage.acceptedRequest', ['requestList' => $requestList]);
    }
    public function acceptedRequest($id)
    {
        $requestData = ModelsRequest::find($id);
        $current_status = $requestData->status;
        $data = ['Komuni Pertama', 'Sakramen Baptis', 'Sakramen Tobat', 'Krismasi'];
        // dd(in_array($requestData->nama_acara, $data));
        if($requestData && in_array($requestData->nama_acara, $data) && $requestData->status == 'pending' ){
            $requestData->status = 'process';
        }else{
            $requestData->status = 'accepted';
        }
        $requestData->save();
        if($current_status == 'pending'){
            return redirect()->route('admin.request.pending')->with('success', 'data berhasil Diterima!');
        }else{
            return redirect()->route('admin.update.Proccessed')->with('success', 'data berhasil Diterima!');
        }
    }
    public function rejectRequest(Request $request,$id)
    {
        $requestData = ModelsRequest::find($id);
        $requestData->status = 'reject';
        $requestData->keterangan = $request->reason;
        $requestData->save();
        return redirect()->route('admin.request.pending')->with('success', 'data berhasil Ditolak!');
    }
    public function detailRequest($slug)
    {
        $data = ModelsRequest::with('umats')->where('nama_acara','$slug')->firstOrfail();
        if($data){
            if($data->nama_acara == 'baptis') return view('admin.viewPage.detail.baptis', ['requestList' => $data]);
            if($data->nama_acara == 'komuniPertama') return view('admin.viewPage.detail.baptis', ['requestList' => $data]);
            if($data->nama_acara == 'krisma') return view('admin.viewPage.detail.krisma', ['requestList' => $data]);
            if($data->nama_acara == 'pengurapan') return view('admin.viewPage.detail.pengurapan', ['requestList' => $data]);
            if($data->nama_acara == 'pernikahan') return view('admin.viewPage.detail.pernikahan', ['requestList' => $data]);
            if($data->nama_acara == 'tobat') return view('admin.viewPage.detail.tobat', ['requestList' => $data]);
        }
        return back()->with('error', 'something wrong happened!!');

    }

    public function exportTemplate()
    {
        return Excel::download(new requestStoreTemplate, 'Request_Template.xlsx');
    }

 
    public function importRequest(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            // Ambil file yang diupload
            $file = $request->file('file');

            // Lakukan import data
            Excel::import(new RequestImports(), $file);

            // Cek apakah ada error pada file yang diupload
            $failedRows = session()->get('failed_rows', []);

            if (count($failedRows) > 0) {
                // Jika ada error, buat file Excel dan langsung download
                return Excel::download(new errorRequest(), 'transaction_error.xlsx');
            } else {
                // Jika tidak ada error, arahkan ke halaman utama
                return redirect()->route('home')->with('success', 'Data berhasil diimport');
            }
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kembalikan error
            return redirect()->route('home')->with('error', 'Terjadi kesalahan saat mengimpor data');
        }
    }


    // public function RejectRequest($slug)
    // {
    //     $requestList = ModelsRequest::with('umats')->where('slug', $slug)->firstOrFail();
    //     $requestList->delete();

    //     return back()->with('Rejected Success', 'Pengajuan berhasil dibatalkan!!');
    // }


}
