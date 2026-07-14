<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class AuthController extends CustomController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        if ($this->request->method() === 'POST') {
            $credentials = [
                'username' => $this->postField('username'),
                'password' => $this->postField('password')
            ];

            if ($this->isAuth($credentials)) {
                alert("login berhasil");
                return redirect('/admin');
            }
            return redirect('/auth')->with('failed', 'Periksa Kembali Username dan Password Anda');
        }
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
