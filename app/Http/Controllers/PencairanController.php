<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pencairan;
use App\Models\Pendapatan;
use App\Models\Pesan;


class PencairanController extends Controller
{
    public function index(){
        $title = 'Pencairan';
        $user_id = auth()->user()->id;
        $pencairan = Pencairan::where('user_id', $user_id)->latest()->get();
        $pendapatan = Pendapatan::where('user_id', $user_id)->get();
        if($pendapatan->sum('jml_pendapatan') < 1000000){
            abort(403);
        }
        return view('dashboard.manajemen-pendapatan.pencairan', compact('title', 'pencairan'));
    }

    public function store(Request $request){
        // return $request;
        $validateData = $request->validate([
            'user_id' => 'required',
            'status' => 'required',
            'nama' => 'required|max:225',
            'bank' => 'required',
            'no_rek' => 'required|numeric|max:999999999999999|unique:pencairans',
            'terms' => 'required'
        ]);

        Pencairan::create($validateData);

        return redirect('/pencairan/'. auth()->user()->id)->with('pesan', 'data berhasil ditambahkan');
    }

    public function send($id){
         $pencairan = Pencairan::find($id);
         $userId = auth()->user()->id;
         $pendapatan = Pendapatan::where('user_id', $userId)->get();
         $jml_pendapatan = $pendapatan->sum('jml_pendapatan');
         $persentase = 20;
         $pengurangan = $jml_pendapatan * ($persentase / 100);
         $hasil = $jml_pendapatan - $pengurangan;

        // Update pencairan
         $pencairan->update([
            'status' => 'dalam proses',
            'jml_pencairan' => $hasil
         ]);

        // Hapus pendapatan
         $pendapatan = Pendapatan::where('user_id', $userId);
         $pendapatan->delete();

        // kirim pesan
        Pesan::create([
            'pengirim' => auth()->user()->nama,
            'user_id' => 1,
            'tentang' =>'Pencairan Pendapatan',
            'isi' => 'Min tolong cairin pendapatan saya secepatnya ya.'
        ]);

         return redirect('/manajemen-pendapatan')->with('pesan', 'Pengajuan pendapatan berhasil terkirim');
    }

    public function confirm($id){
        
        $pencairan = Pencairan::find($id);

        $userId = $pencairan->user_id;

        $pencairan->update([
            'status' => 'di konfirmasi'
        ]);

        Pesan::create([
            'user_id' => $userId,
            'pengirim' => auth()->user()->nama,
            'tentang' => 'Konfirmasi Pencairan',
            'isi' => 'Pencairan sudah dikonfirmasi, ditunggu aja ya sampe 7 hari kerja. kalo lewat dari situ bisa kirim email ke mimin'
        ]);

         return redirect('/manajemen-pendapatan')->with('pesan', 'Pengajuan pendapatan telah dikonfirmasi');
    }

    public function delete($id){
        $pencairan = Pencairan::find($id);

        $pencairan->delete();

        return redirect('/manajemen-pendapatan')->with('pesan', 'Data berhasil dihapus');
    }
}
