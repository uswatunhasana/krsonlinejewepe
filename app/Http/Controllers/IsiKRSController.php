<?php

namespace App\Http\Controllers;

use App\Models\Datakrs;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Matakuliah;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class IsiKRSController extends Controller
{
    public function index()
    {
        $mks = Matakuliah::all();
        $mahasiswas= Mahasiswa::all();
        return view('mahasiswa.isikrs', compact('mks', 'mahasiswas'));
    }

    public function krsmahasiswa()
    {
        $mks = Matakuliah::all();
        $mahasiswas= Mahasiswa::all();
        $krss= Datakrs::all();
        return view('mahasiswa.rincianhasilkrs', compact('mks', 'mahasiswas', 'krss'));
    }

    public function create(Request $req)
    {
        $jumlah_krs = count($req->matakuliah_id);
        for ($i = 0; $i < $jumlah_krs; $i++) {
            $isi_krs = new Datakrs();
            $isi_krs->kode_krs = $req->kode_krs;
            $isi_krs->matakuliah_id = $req->matakuliah_id[$i];
            $isi_krs->jumlah = $req->total;
            $isi_krs->user_id = Auth::id();
            $isi_krs->mahasiswa_id = $req->mahasiswa_id;
            $isi_krs->save();
        }
        Alert::success(' Berhasil Mengisi KRS ', ' Silahkan dicek kembali');
        return redirect()->back();
    }
}
