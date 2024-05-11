<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class KaryawanController extends Controller
{
    public function index()
    {
        $user = User::paginate(5);

        return view('contents.direktur.dataKaryawan', compact('user'));
    }

    public function update_view($id)
    {
        $user = User::find($id);
        return view('contents.direktur.updateKaryawan', compact('user'));
    }

    public function update_process($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string'],
            'role' => ['required', 'string'],
        ]);
        
        $user = User::find($id);

        $user->name = $request->name;
        $user->nip = $request->nip;
        $user->role = $request->role;
        $user->save();

        return redirect(route('direktur.datakaryawan'))->with(['success' => 'Ubah Karyawan Berhasil']);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('direktur.datakaryawan'))->with(['success' => 'Hapus Karyawan Berhasil']);
    }
}
