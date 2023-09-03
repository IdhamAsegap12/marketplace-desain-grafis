<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class RiwayatPembelianController extends Controller
{
    public function index(){
        $title = 'Riwayat Pembelian';
        $userId = auth()->user()->id;
        $transaksi = Transaksi::where('user_id', $userId)->latest()->get();
        return view('riwayatPembelian.index', compact('transaksi', 'title'));
    }
}
