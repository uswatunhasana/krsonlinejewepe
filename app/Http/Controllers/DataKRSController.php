<?php

namespace App\Http\Controllers;

use App\Models\Datakrs;
use Illuminate\Http\Request;
use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\User;

class DataKRSController extends Controller
{
    public function index()
    {
        $users = User::where('role', '=', 'user')->get();
        $mahasiswas= Mahasiswa::all();
        $fakultass= Fakultas::all();
        $jurusans= Jurusan::all();
        $krss= Datakrs::all();
        return view('admin.datakrsmahasiswa', compact('krss','users', 'mahasiswas', 'jurusans', 'fakultass'));
    }

    public function krsmhs()
    {
        $users = User::where('role', '=', 'user')->get();
        $mahasiswas= Mahasiswa::all();
        $fakultass= Fakultas::all();
        $jurusans= Jurusan::all();
        $krss= Datakrs::all();
        return view('admin.datakrsmahasiswa', compact('krss','users', 'mahasiswas', 'jurusans', 'fakultass'));
    }
    public function detaildatakrs(Request $req)
    {
        $id = $req->get('kode');
        $output='';
        $krss = Datakrs::leftJoin('matakuliahs', 'matakuliahs', '=', 'matakuliahs.matakuliah_id')
                ->where('kode_krs', '=', $id)
                ->select('datakrss.*', 'matakuliahs.*')
                ->get();

        $no = 0;
        $data = array();
        foreach ($krss as $list) {
            $no ++;
            $output .= '<tr><td>'.$no.'</td><td>'.$list->kode_mk.'</td><td>'.$list->nama_mk.'</td><td>'.$list->jenis.'</td><td>'.$list->sks.'</td></tr>';
        }
        $data = array(
            'table_data' =>  $output
        );
        return json_encode($data);
    }
}
