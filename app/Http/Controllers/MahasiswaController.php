<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\User;

class MahasiswaController extends Controller
{
    public function index()
    {
        $users = User::where('role', '=', 'user')->get();
        $mahasiswas= Mahasiswa::all();
        $fakultass= Fakultas::all();
        $jurusans= Jurusan::all();
        return view('admin.mahasiswa', compact('users', 'mahasiswas', 'jurusans', 'fakultass'));
    }


    public function update(Request $request, $id)
    {
        $update_data = Mahasiswa::findOrFail($id);
        $update_data->user_id = $request->user_id;
        $update_data->npm = $request->npm;
        $update_data->kelas = $request->kelas;
        $update_data->semester = $request->semester;
        $update_data->fakultas_id = $request->fakultas_id;
        $update_data->jurusan_id = $request->jurusan_id;
        $update_data->save();
        Alert::success(' Berhasil Update Data ', ' Silahkan dicek kembali');
        return redirect()->back();
    }

    public function create(Request $request)
    {
        $cek_mahasiswa = Mahasiswa::where('npm', $request->npm)->count();
        if ($cek_mahasiswa == 0) {
            $mahasiswas= new Mahasiswa;
            $mahasiswas->user_id = $request->user_id;
            $mahasiswas->npm = $request->npm;
            $mahasiswas->kelas = $request->kelas;
            $mahasiswas->semester = $request->semester;
            $mahasiswas->fakultas_id = $request->fakultas_id;
            $mahasiswas->jurusan_id = $request->jurusan_id;
            $mahasiswas->save();
            Alert::success('Berhasil Tambah Data ', 'Silahkan Cek Kembali!');
        } else {
            Alert::error('Data NPM Sudah Ada ', ' Silahkan coba lagi');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        DB::table('mahasiswas')->where('id', $id)->delete();
        return redirect()->back();
    }
}
