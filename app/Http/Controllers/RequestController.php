<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function BaptisIndex(){

        return view("umat.baptisForm");
    }

    public function BaptisSubmit(Request $request){
        $request->validate([
            "namaAcara" => 'required|string|max:255',
            "id_umat" => 'required|integer|exists:umats,id', 
            "umat_terlibat_satu" => 'required|string', 
            "nama_romo" => 'required|string|max:255',
            "jadwal_acara" => 'required|date', 
            "deskripsi_pengajuan" => 'nullable|string', 
        ]);
        ModelsRequest::create($request->all());
        return redirect()->route('home')->with('success', 'Pengajuan baptis berhasil dikirim!');
    }

    public function tobatIndex(){
        return view("umat.tobatForm");
    }

    public function tobatSubmit(Request $request){
        $request->validate([
            "namaAcara" => 'required|string|max:255',
            "id_umat" => 'required|integer|exists:umats,id', 
            "umat_terlibat_satu" => 'required|string', 
            "umat_terlibat_dua" => 'required|nullable|string', 
            "deskripsi_pengajuan" => 'nullable|string', 
        ]);
        ModelsRequest::create($request->all());
        return redirect()->route('home')->with('success', 'Pengajuan baptis berhasil dikirim!');
    }

    public function komuniPertamaIndex(){
        return view("umat.KomuniPertamaForm");
    }

    public function komuniPertamaSubmit(Request $request){
        $request->validate([
            "namaAcara" => 'required|string|max:255',
            "id_umat" => 'required|integer|exists:umats,id', 
            "umat_terlibat_satu" => 'required|string', 
            "deskripsi_pengajuan" => 'nullable|string', 
        ]);
        ModelsRequest::create($request->all());
        return redirect()->route('home')->with('success', 'Pengajuan baptis berhasil dikirim!');
    }

    public function krismaIndex(){
        return view("umat.krismaForm");
    }

    public function krismaSubmit(Request $request){
        $request->validate([
            "namaAcara" => 'required|string|max:255',
            "id_umat" => 'required|integer|exists:umats,id', 
            "umat_terlibat_satu" => 'required|string', 
            "umat_terlibat_dua" => 'required|nullable|string', 
            "deskripsi_pengajuan" => 'nullable|string', 
        ]);
        ModelsRequest::create($request->all());
        return redirect()->route('home')->with('success', 'Pengajuan baptis berhasil dikirim!');
    }

    public function pernikahanIndex(){
        return view("umat.pernikahanForm");
    }

    public function pernikahanSubmit(Request $request){
        $request->validate([
            "namaAcara" => 'required|string|max:255',
            "id_umat" => 'required|integer|exists:umats,id', 
            "umat_terlibat_satu" => 'required|string', 
            "umat_terlibat_dua" => 'required|nullable|string', 
            "nama_romo" => 'required|string|max:255',
            "jadwal_acara" => 'required|date', 
            "deskripsi_pengajuan" => 'nullable|string', 
        ]);
        ModelsRequest::create($request->all());
        return redirect()->route('home')->with('success', 'Pengajuan baptis berhasil dikirim!');
    }

    public function PengurapanIndex(){
        return view("umat.pengurapanForm");
    }

    public function PengurapanSubmit(Request $request){
        $request->validate([
            "namaAcara" => 'required|string|max:255',
            "id_umat" => 'required|integer|exists:umats,id', 
            "umat_terlibat_satu" => 'required|string', 
            "deskripsi_pengajuan" => 'nullable|string', 
        ]);
        ModelsRequest::create($request->all());
        return redirect()->route('home')->with('success', 'Pengajuan baptis berhasil dikirim!');
    }

    public function KematianIndex(){
        return view("umat.kematianForm");
    }

    public function KematianSubmit(Request $request){
        $request->validate([
            "namaAcara" => 'required|string|max:255',
            "id_umat" => 'required|integer|exists:umats,id', 
            "umat_terlibat_satu" => 'required|string', 
            "deskripsi_pengajuan" => 'required|string', 
        ]);
        ModelsRequest::create($request->all());
        return redirect()->route('home')->with('success', 'Pengajuan baptis berhasil dikirim!');
    }


    public function listRequest(){
        $requestList = ModelsRequest::with('umats')->get();
        return view('admin.listRequest',["requestList"=>$requestList]);
    }
}
