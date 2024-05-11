<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reimbursement;
use Illuminate\Support\Facades\Auth;

class ReimbursementController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $userRole = Auth::user()->role;
        if($userRole === 'staff'){
            $rei = Reimbursement::where('user', $user->name)->paginate(5);
        }
        elseif($userRole === 'direktur'){
            $rei = Reimbursement::where('status', 'Pending')->paginate(5);
        }
        elseif($userRole === 'finance'){
            $rei = Reimbursement::where('status', 'Approve Direktur')->paginate(5);
        }
        
        return view('contents.reimbursement', compact('rei'));
    }

    public function create_view()
    {
        $rei = Reimbursement::all();
        return view('contents.createReimbursement', compact('rei'));
    }

    public function create_process(Request $request)
    {
        $request->validate([
            'tanggal'        => 'required',
            'name'           => 'required',
            'file'           => 'required',
            'deskripsi'      => 'required',
        ]);

        $user = Auth::user()->name;

        $rei = new Reimbursement;
        
            if ($files = $request->file('file')) {
                $destinationPath = 'filependukung/';
                $file = $request->file('file');
                // upload path  
    
                $namafile = basename($request->file('file')->getClientOriginalName(), '.' . $request->file('file')->getClientOriginalExtension()) . "." .
                    $files->getClientOriginalExtension();
                $pathfile = $file->storeAs('', $namafile);
                $files->move($destinationPath, $namafile);
                $rei->file_pendukung = $pathfile;
            }
            $rei->user         = $user;
            $rei->tanggal         = $request->tanggal;
            $rei->nama_reimbursement         = $request->name;
            $rei->deskripsi               = $request->deskripsi;
            $rei->file_pendukung         = $request->file;
            $rei->save();

        return redirect(route('reimbursement'))->with(['success' => 'Tambah Reimbursement Berhasil']);
    }

    public function detail_view($id)
    {
        $rei = Reimbursement::find($id);
        return view('contents.detailReimbursement', compact('rei'));
    }

    public function acceptdirektur($id)
    {
        $reimbursement = Reimbursement::find($id);

        if ($reimbursement) {
            $reimbursement->status = "Approve Direktur";
            $reimbursement->save();

            return redirect(route('reimbursement'))->with('success', 'Reimbursement berhasil diterima.');
        } else {
            return redirect(route('reimbursement'))->with('error', 'Reimbursement tidak ditemukan.');
        }
    }

    public function rejectdirektur($id)
    {
        $reimbursement = Reimbursement::find($id);

        if ($reimbursement) {
            $reimbursement->status = "Reject Direktur";
            $reimbursement->save();

            return redirect(route('reimbursement'))->with('success', 'Reimbursement Ditolak.');
        } else {
            return rredirect(route('reimbursement'))->with('error', 'Reimbursement tidak ditemukan.');
        }
    }

    public function acceptfinance($id)
    {
        $reimbursement = Reimbursement::find($id);

        if ($reimbursement) {
            $reimbursement->status = "Approve Finance";
            $reimbursement->save();

            return redirect(route('reimbursement'))->with('success', 'Reimbursement berhasil diterima.');
        } else {
            return redirect(route('reimbursement'))->with('error', 'Reimbursement tidak ditemukan.');
        }
    }

    public function rejectfinance($id)
    {
        $reimbursement = Reimbursement::find($id);

        if ($reimbursement) {
            $reimbursement->status = "Reject Finance";
            $reimbursement->save();

            return redirect(route('reimbursement'))->with('success', 'Reimbursement Ditolak.');
        } else {
            return redirect(route('reimbursement'))->with('error', 'Reimbursement tidak ditemukan.');
        }
    }
}
