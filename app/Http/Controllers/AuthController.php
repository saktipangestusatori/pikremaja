<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(Auth::user()->role == 'Admin') {
                return redirect()->intended('dashboard-admin');
            } else if(Auth::user()->role == 'Konselor')  {
                return redirect()->intended('dashboard-konselor');
            } else if(Auth::user()->role == 'Remaja')  {
                return redirect()->intended('dashboard-remaja');
            } else {
                return redirect()->intended('dashboard-admin');
            }
        }

        return back()->withErrors([
            'username' => 'Username dan Password tidak cocok!',
        ]);
    }

    public function registration(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'name' => 'required',
            'no_hp' => 'required',
        ]);

        if(date('Y') - Carbon::parse($request->tanggallahir)->format('Y') >24){
            return redirect('/register')->with('status','Anda Melebihi Batas Usia');
            
        } else if(date('Y') - Carbon::parse($request->tanggallahir)->format('Y') <10){
            return redirect('/register')->with('status','Anda Kurang Dari Batas Usia');
        }
        
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['role'] = 'Remaja';
        User::create($data);
        return redirect()->route('login')->with('status', 'Berhasil Daftar Akun pikremaja, Silahkan masuk menggunakan akun username dan password yang sudah didaftarkan');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


}
