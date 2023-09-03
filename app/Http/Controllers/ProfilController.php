<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index(){
        $title = 'Profil';
        $id = auth()->user()->id;
        $profil = User::find($id);
        return view('dashboard.profil.index', compact('profil', 'title'));
    }

    public function edit(Request $request, $user_name){
        $user = User::where('user_name', $user_name)->latest()->get();
        $user = $user[0];
        $rules = [
            'nama' => 'required',
            'email' => 'required|email',
            'image' => 'image|file|max:1024',
            'pengalaman' => 'max:500',
            'instagram' => 'max:225',
            'facebook' => 'max:225',
            'twitter' => 'max:225'
        ];

        if($request->user_name != $user->user_name){
            $rules['user_name'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);


        if($request->file('image')){
            Storage::delete($request->oldImage);
            $validatedData['image'] = $request->file('image')->store('profil-image');
        }

        User::where('id', $user->id)->update($validatedData);

        return redirect('/profil')->with('pesan', 'profil kamu berhasil di simpan');


    }
}
