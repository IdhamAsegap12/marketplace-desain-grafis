<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produck;
use App\Models\Transaksi;

class ProduckController extends Controller
{
    public function index(){
        $title = 'Produk';
        $producks = Produck::with(['category','user'])->where('status', 'disetujui')->latest();
        

        if(request()->cari){
            $producks = Produck::where('nama', 'like', '%'. request()->cari.'%');
        }
        $producks = $producks->paginate(30);
        return view('produck.index', compact('producks','title'));
    }

    public function detail($slug){
        $title = 'Detail Produk';
        $produck = Produck::with(['user','category'])->where('slug',$slug)->latest()->get();
        
        return view('produck.detail', compact('produck','title'));
    }

    // public function like(Request $request, $id){
    //     $produck = Produck::find($id);
    //     $like = $request->like;
    //     $response = $like + $produck->like;
    //     $produck->like = $response;
    //     $produck->update();
    //     return redirect('/produk');
    // }
}
