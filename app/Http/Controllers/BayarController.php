<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produck;
use App\Models\Transaksi;

class BayarController extends Controller
{
    public function index($reference, $slug){
        $title = 'Bayar';
        $detail = new TransaksiController();
        $transaksi = $detail->detailTransaction($reference);
        $produck = Produck::where('slug', $slug)->get();
        
        return view('bayar.index', compact('transaksi', 'produck', 'title'));
    }
    
    public function store(Request $request){
        // Request pembayaran
        $produck = Produck::find($request->produckId);
        $method = $request->method;
        $bayar = new TransaksiController;
        $transaksi = $bayar->requestTransaction($method, $produck);
        
        //tabel transaksi
        Transaksi::create([
            'user_id' => auth()->user()->id,
            'produck_id' => $produck->id,
            'reference' => $transaksi->reference,
            'merchant_ref' => $transaksi->merchant_ref,
            'total_amount' => $transaksi->amount,
            'status' => $transaksi->status,
            'terms' => $request->terms
        ]);

        return redirect()->route('bayar.index', [
            'reference' => $transaksi->reference,
            'slug' => $produck->slug
        ]);
    }
    
   
}
