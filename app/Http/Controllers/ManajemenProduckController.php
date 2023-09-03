<?php

namespace App\Http\Controllers;

use App\Models\Produck;
use App\Models\Category;
use App\Models\Kontributor;
use App\Models\User;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManajemenProduckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Manajemen Produk';
        $userId = auth()->user()->id;
        $paginator = 10;
        $producks = Produck::latest()->paginate($paginator);
        $designs = Produck::where('user_id', $userId)->latest()->paginate($paginator);
        $contributors = Kontributor::latest()->paginate($paginator);
        $no_p = $paginator * ($producks->currentPage() - 1);
        $no_d = $paginator * ($designs->currentPage() - 1);
        $no_c = $paginator * ($contributors->currentPage() - 1);
        
        return view('dashboard.manajemen-produck.index', compact('no_p', 'no_c', 'no_d','producks','designs','contributors', 'title'));
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
        //
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
    public function edit($slug)
    {
        $title = 'Edit Produk';
        $categories = Category::all();
        $produck = Produck::where('slug', $slug)->latest()->get();
        $produck = $produck[0];
        return view('dashboard.manajemen-produck.edit', compact('produck','categories','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produck  $produck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produck = Produck::find($id);
        $rules = [
            'nama' => 'required|max:100',
            'category_id' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ];


        if( $request->slug != $produck->slug ){
            $rules['slug'] = 'required|unique:producks';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Produck::where('id', $produck->id)->update($validatedData);


        return redirect('/manajemen-produk')->with('pesan', 'Produk berhasil di edit');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produck  $produck
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produck = Produck::find($id);
        if($produck->image){
            Storage::delete($produck->image);
            Storage::delete($produck->zip);
        }
        $produck->delete();
        return redirect('/manajemen-produk')->with('pesan', 'Produk berhasil di hapus');
    }

    // Are kontributor
    public function cek($id){
        $contributor = Kontributor::find($id);
        $download = $contributor->zip;

        return response()->download(public_path('storage/'. $download));
    }

    public function setuju($id){
        $contributor = Kontributor::find($id);
        $user = User::find($contributor->user_id);
        Produck::create([
            'user_id' => $contributor->user_id,
            'category_id' => $contributor->category_id,
            'nama' => $contributor->nama,
            'slug' => $contributor->slug,
            'harga' => $contributor->harga,
            'image' => $contributor->image,
            'zip' => $contributor->zip,
            'deskripsi' => $contributor->deskripsi,
            'status' => 'disetujui'
        ]);

        $user->update([
            'level' => 'desainer'
        ]);


        $contributor->delete();

        $userId = $contributor->user_id;

        // pesan
        Pesan::create([
            'user_id' => $userId,
            'pengirim' => auth()->user()->nama,
            'tentang' => 'Kontributor Disetujui',
            'isi' => 'Selamat kamu diterima menjadi desainer di Getsu Design, berikan kontribusi terbaik kamu oke'
        ]);

        return redirect('/manajemen-produk')->with('pesan', 'Desain disetujui');
    }

    public function tolak($id){
        $contributor = Kontributor::find($id);

        if($contributor->image){
            Storage::delete($contributor->image);
            Storage::delete($contributor->zip);
        }

        $contributor->delete();

        $userId = $contributor->user_id;

        // pesan
        Pesan::create([
            'user_id' => $userId,
            'pengirim' => auth()->user()->nama,
            'tentang' => 'Kontributor Ditolak',
            'isi' => 'Tolong perhatikan kembali aspek standar desain di Getsu Design, mimin kasi tau ya apa aja standarnya.
                        <ol>
                            <li>Desain dengan format PNG & JPG harus berukuran 500x500 px</li>
                            <li>Dalam format zip harus terdapat 3 file gambar, yaitu SVG,PNG & JPG</li>
                            <li>Desain tidak boleh sama dengan desain yang pernah di upload</li>
                            <li>Tidak boleh plagiat desain orang lain, nanti akun kamu di banned</li>
                        </ol>'
        ]);

        return redirect('/manajemen-produk')->with('pesan', 'Desain di tolak');
    }
    // End

    // Area desainer
    public function tinjau($id){
        $produck = Produck::find($id);
        $download = public_path('storage/'. $produck->zip);

        return response()->download($download);
    }

    public function disetujui($id){
        $produck = Produck::find($id);
        $produck->update([
            'status' => 'disetujui'
        ]);

        $userId = $produck->user_id;

        // pesan
        Pesan::create([
            'user_id' => $userId,
            'pengirim' => auth()->user()->nama,
            'tentang' => 'Desain Disetujui',
            'isi' => 'Selamat desain kamu disetujui, terus semangat ya'
        ]);

        

        return redirect('/manajemen-produk')->with('pesan', 'Desain disetujui');
    }

    public function ditolak($id){
        $produck = Produck::find($id);
        $produck->update([
            'status' => 'ditolak'
        ]);

        $userId = $produck->user_id;

        // pesan
        Pesan::create([
            'user_id' => $userId,
            'pengirim' => auth()->user()->nama,
            'tentang' => 'Desain Ditolak',
            'isi' => 'Tolong perhatikan kembali aspek standar desain di Getsu Design, mimin kasi tau ya apa aja standarnya.
                        <ol>
                            <li>Desain dengan format PNG & JPG harus berukuran 500x500 px</li>
                            <li>Dalam format zip harus terdapat 3 file gambar, yaitu SVG,PNG & JPG</li>
                            <li>Desain tidak boleh sama dengan desain yang pernah di upload</li>
                            <li>Tidak boleh plagiat desain orang lain, nanti akun kamu di banned</li>
                        </ol>'
        ]);

        return redirect('/manajemen-produk')->with('pesan', 'Desain di tolak');
    }
    // end

            
}
