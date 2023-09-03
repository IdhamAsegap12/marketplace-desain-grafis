<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $title = 'Desainer';
        $users = User::where('level', 'desainer' )->latest()->paginate(9);
        return view('designer.index', compact('users', 'title'));
    }

    public function detail(User $user){
        $title = 'Detail Desainer';
        $user = $user;
        return view('designer.detail', compact('user', 'title'));
    }
}
