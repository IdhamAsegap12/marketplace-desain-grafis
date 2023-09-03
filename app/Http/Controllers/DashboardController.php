<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produck;
use App\Models\Pendapatan;

class DashboardController extends Controller
{
    public function index(){
        $title = 'Dasbor';
        $no = 0;
        $producks = Produck::all();
        $users = User::all();
        $pendapatan = Pendapatan::select('pendapatan')->sum('jml_pendapatan');

        // Untuk Profil
        $userId = auth()->user()->id;
        $profil = User::find($userId);

        $pendapatanUser = Pendapatan::all();


        $designers = User::where('level', 'desainer')->latest()->get();
        return view('dashboard.index', compact('users','producks','no','designers', 'profil', 'pendapatan', 'title', 'pendapatanUser'));
    }
}
