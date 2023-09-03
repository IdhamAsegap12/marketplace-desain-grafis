<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produck;
use App\Models\Category;
use App\Models\Pesan;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.upload.index', [
            'categories' => Category::all(),
            'title' => 'Upload Desain'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'slug' => 'required|unique:producks',
            'category_id' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|file|max:2024',
            'zip' => 'required|file|max:4000|mimes:zip',
            'status' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        if($request->file('zip')){
            $validatedData['zip'] = $request->file('zip')->store('post-zip');
        }


        $validatedData['user_id'] = auth()->user()->id;


        Produck::create($validatedData);

        // Pesan
        if(auth()->user()->level != 'admin'){
            Pesan::create([
                'user_id' => 1,
                'pengirim' => auth()->user()->nama,
                'tentang' => 'Peninjauan Desain',
                'isi' => 'Min tolong tinjau desain saya, kalo bisa secepatnya ya'
            ]);
        }

        return redirect('/manajemen-produk')->with('pesan', 'File berhasil di upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produck  $produck
     * @return \Illuminate\Http\Response
     */
    public function show(Produck $produck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produck  $produck
     * @return \Illuminate\Http\Response
     */
    public function edit(Produck $produck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produck  $produck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produck $produck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produck  $produck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produck $produck)
    {
        //
    }
}
