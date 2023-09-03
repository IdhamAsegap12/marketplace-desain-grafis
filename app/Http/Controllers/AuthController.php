<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(){
        $title = 'Masuk';
        return view('auth.login', compact('title'));
    }

    public function auth(Request $request){
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credential)){
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('pesan', 'Email atau password salah!');
    }

    public function register(){
        $title = 'Daftar';
        return view('auth.register', compact('title'));
    }

    public function store(Request $request){
        $valdiation_data = $request->validate([
            'nama' => 'required|max:225',
            'user_name' => 'required|max:225|unique:users',
            'email' => 'required|email:dns|unique:users',
            'level' => 'required',
            'password' => 'required|min:8|confirmed ',
        ]);

        $valdiation_data['password'] = bcrypt($request->password);

        User::create($valdiation_data);

        return redirect('/masuk')->with('pesan', 'Pendaftaran berhasil, silahkan masuk');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function forgot(){
        $title = 'Lupa Kata Sandi';
        return view('auth.forgotpassword', compact('title'));
    }

    public function send(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('pesan', 'Link telah dikirim ke email anda');
        } else {
            return back()->with('pesan', 'Email tidak diketahui');
        }
        
    }

    public function reset($token){
        return view('auth.reset-password', [
            'token' => $token,
            'title' => 'Reset Kata Sandi'
        ]);
    }

    public function update(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password){
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET){
            return redirect('/masuk')->with('pesan', 'Password telah dirubah');
        } else{
            return back()->with('pesan', 'Password gagal dirubah');
        }
    }

    
}
