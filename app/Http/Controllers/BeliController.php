<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produck;

class BeliController extends Controller
{
    public function index($slug){
        $title = 'Beli';
        $produck = Produck::where('slug', $slug)->latest()->get();
        $produck = $produck[0];
        $beli = new TransaksiController;
        $chanels = $beli->chanelTransaction();
        return view('beli.index', compact('chanels', 'produck', 'title'));
    }
    
    
}
