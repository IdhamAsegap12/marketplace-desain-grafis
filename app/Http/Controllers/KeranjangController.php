<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produck;

class KeranjangController extends Controller
{
    public function index(){
        $title = 'Keranjang';
        $userId = auth()->user()->id;
        $keranjang = Keranjang::with('produck')->where('user_id', $userId)->latest()->get();
      
        return view('keranjang.keranjang', compact('keranjang', 'title'));
    }

    public function tambah($id){
        $produck = Produck::find($id);

        Keranjang::create([
            'user_id' => auth()->user()->id,
            'produck_id' => $id,
            'nama_produk' => $produck->nama,
            'harga' => $produck->harga
        ]);

        return redirect('/keranjang')->with('pesan', 'Produk berhasil ditambahkan');
    }

    public function hapus($id){
        $keranjang = Keranjang::find($id);
        $keranjang->delete();

        return redirect('/keranjang')->with('pesan', 'Keranjang berhasil dihapus');
    }
}
