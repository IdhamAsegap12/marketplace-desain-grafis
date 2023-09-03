<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Kontributor;
use App\Models\Pesan;

class KontributorController extends Controller
{
    public function index(){
        $title = 'Kontributor';
        $categories = Category::all();
        return view('kontributor.kontributor', compact('categories', 'title'));
    }

    public function create(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|max:250',
            'slug' => 'required|unique:producks',
            'category_id' => 'required',
            'harga' => 'required',
            'image' => 'required|image|file|max:2024',
            'zip' => 'required|file|max:4088',
            'deskripsi' => 'required',
            'terms' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id; 

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-image');
            $validatedData['zip'] = $request->file('zip')->store('post-zip');
        }

        Kontributor::create($validatedData);


        // pesan
        Pesan::create([
            'user_id' => 1,
            'pengirim' => auth()->user()->nama,
            'tentang' => 'Daftar Kontributor',
            'isi' => 'Min saya pengen jadi desainer disini, tolong tinjau desain saya'
        ]);
        
        return redirect('/kontributor')->with('pesan', 'Desain anda berhasil dikirim, tunggu informasi berikutnya selama 7 hari kerja.');
    }

}
