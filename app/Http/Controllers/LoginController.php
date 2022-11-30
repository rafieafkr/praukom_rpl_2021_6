<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login', [
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request){
        $data = $request->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required'],
        ]);
        // dd($data);
        
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        //tampilkan pesan error jika gagal login
        return back()->with('loginError','Login Failed !');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

}