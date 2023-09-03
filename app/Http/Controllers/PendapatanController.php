<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendapatan;
use App\Models\Pencairan;

class PendapatanController extends Controller
{
    public function index(){
        $title = 'Pendapatan';
        $no = 0;
        $userId = auth()->user()->id;
        $pendapatan = Pendapatan::where('user_id', $userId)->latest()->get();
        $pencairan = Pencairan::all();

        // pencairan user
        $userId = auth()->user()->id;
        $pencairanUser = Pencairan::where('user_id',$userId)->get();
     
        
        return view('dashboard.manajemen-pendapatan.index', compact('pendapatan', 'no', 'title', 'pencairan', 'pencairanUser'));

    }

}
