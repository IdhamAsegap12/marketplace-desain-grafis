<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManajemenUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Manajemen User';
        $no = 0;
        $users = User::all();
        return view('dashboard.manajemen-user.index', compact('users','no', 'title'));
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user_name)
    {
        $title = 'Edit User';
        $user = User::where('user_name', $user_name)->latest()->get();
        $user = $user[0];
        return view('dashboard.manajemen-user.edit', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $rules = [
            'nama' => 'required|max:225',
            'email' => 'required|email',
            'level' => 'required'
        ];

        if ($request->user_name != $user->user_name){
            $rules['user_name'] = 'required|unique:users';
        } 
        
        $validatedData = $request->validate($rules);


        User::where('id', $user->id)->update($validatedData);

        return redirect('/manajemen-user')->with('pesan', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect('/manajemen-user')->with('pesan','User berhasil dihapus');
    }
}
