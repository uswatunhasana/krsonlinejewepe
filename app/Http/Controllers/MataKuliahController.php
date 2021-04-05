<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\Matakuliah;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mks = Matakuliah::all();
        return view('admin.datamatakuliah', compact('mks'));
    }

    public function create(Request $request)
    {
        $rules = array(
            'kode_mk' => 'required',
            'nama_mk' => 'required',
            'jenis' => 'required',
            'sks' => 'required',
            'semester' => 'required',
        );
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            Alert::error('Data Belum Lengkap', 'Silahkan coba lagi');
            return redirect()->back();
        }
        $cek_kodemk = Matakuliah::where('kode_mk', $request->kode_mk)->count();
        if ($cek_kodemk == 0) {
            $mks= new Matakuliah;
            $mks->kode_mk = $request->kode_mk;
            $mks->nama_mk = $request->nama_mk;
            $mks->jenis = $request->jenis;
            $mks->sks = $request->sks;
            $mks->semester = $request->semester;
            $mks->save();
            Alert::success('Berhasil Tambah Data ', 'Silahkan Cek Kembali!');
        } else {
            Alert::error('Data Mata Kuliah Sudah Ada ', ' Silahkan coba lagi');
        }
        return redirect()->back();
    }

   
    public function update(Request $request, $id)
    {
        $mks = Matakuliah::findOrFail($id);
        $mks= new Matakuliah;
        $mks->kode_mk = $request->kode_mk;
        $mks->nama_mk = $request->nama_mk;
        $mks->jenis = $request->jenis;
        $mks->sks = $request->sks;
        $mks->semester = $request->semester;
        $mks->save();
        Alert::success('Berhasil Tambah Data ', 'Silahkan Cek Kembali!');
        return redirect()->back();
    }

    
    public function delete($id)
    {
        DB::table('matakuliahs')->where('id', $id)->delete();
        return redirect()->back();
    }
}
