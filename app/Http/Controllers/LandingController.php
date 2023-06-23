<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    //
    public function index() {
        return view('index');
    }
    public function login() {
        return view('login');
    }
    function loginProses(Request $request) {
        $form_username = $request->username;
        $form_password = $request->password;

        $payload = ['username' => $form_username, 'password' => $form_password];

        $cek = Auth::guard('userlogin')->attempt($payload);
        if(!$cek) {
            Session::flash('alert', 'warning|Login Gagal. Username atau Password Salah!');
            return redirect()->route('landing.login.index');
        }
        $request->session()->regenerate();
        return redirect()->intended(route('landing.index'));
    }
    function logoutProses(Request $request) {
        Auth::guard('userlogin')->logout();
        $request->session()->regenerate();
        return redirect()->intended(route('landing.login.index'));
    }
}
