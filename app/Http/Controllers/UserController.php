<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use RegistersUsers;

    public function index()
    {
        $users = User::where('role', '=', 'user')->get();
        return view('admin.datauser', compact('users'));
    }


    public function update(Request $request, $id)
    {
        $update_user = User::findOrFail($id);
        $update_user->name = $request->name;
        $update_user->username = $request->username;
        $update_user->password = Hash::make($request->post('password'));
        $update_user->save();
        if ($update_user) {
            Alert::success(' Berhasil Update Data ', ' Silahkan dicek kembali');
        } elseif (!$update_user) {
            Alert::error('data gagal disimpan ', ' Silahkan coba lagi');
        }
        return redirect()->back();
    }

    public function create(Request $request)
    {
        $cek_user = User::where('username', $request->username)->count();
        if ($cek_user == 0) {
            $simpan = DB::table('users')->insert([
                    'name' => $request->post('name'),
                    'username' => $request->post('username'),
                    'password'=>Hash::make($request->post('password')) ,
        ]);
            Alert::success(' Berhasil Tambah data ', ' Silahkan dicek kembali');
        } else {
            Alert::error('Data Username Sudah Ada ', ' Silahkan coba lagi');
        }
        
        return redirect()->back();
    }

    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
    }
}
