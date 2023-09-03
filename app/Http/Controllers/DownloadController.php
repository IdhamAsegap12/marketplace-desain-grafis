<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;

class DownloadController extends Controller
{
    public function index(){
        $title = 'Unduh Produk';
        $user = auth()->user();
        $downloads = Download::where('user_id', $user->id)->latest()->get();
        return view('download.download', compact('downloads', 'title'));
    }

    public function download(Request $request){
        $downloadId = $request->id;
        $download = Download::find($downloadId);
        $file = public_path('storage/'. $download->zip);

        return response()->download($file);
    }
}
