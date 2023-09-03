<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Transaksi;
use Illuminate\Http\Response;

class LisensiController extends Controller
{
  
    public function download(){
        $userId = auth()->user()->id;
        $data = Transaksi::where('user_id', $userId)->get();
        $text = '';
        
        $text .= "Id : {$data[0]->id}, Name : {$data[0]->user->nama}, Reference : {$data[0]->reference}, Licence : {$data[0]->merchant_ref}";
        
        $fileContents = $text;
        $filePath = 'lisensi/data.txt'; // Simpan dalam direktori storage/app/public
        
        Storage::put($filePath, $fileContents);

        $publicPath = Storage::url($filePath);

        $filePath = 'lisensi/data.txt';
        $fileName = 'data.txt';

        return Storage::download($filePath, $fileName);



    }
    
}
