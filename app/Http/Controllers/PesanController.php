<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class PesanController extends Controller
{
    public function index(){
        $title = 'Notifikasi';
        $userId = auth()->user()->id;
        $notifs = Pesan::where('user_id', $userId)->get();
        return view('dashboard.pesan.pesan', compact('title', 'notifs'));
    }

    public function delete($id){
        $pesan = Pesan::find($id);
        $pesan->delete();

        return redirect('/notifikasi');
    }
}
