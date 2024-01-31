<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $redirectTo = '/';
    //Login Pages
    public function login() {

        // Jika pengguna sudah login
        if (Auth::check()) {
            return redirect('/');
        }

        return view('pages.authenticate.login', [
            "title" => "Login",
            "link" => "login"
        ]);

    }

    //Register Pages
    public function register() {

        // Jika pengguna sudah login
        if (Auth::check()) {
            return redirect('/');
        }

        return view('pages.authenticate.register', [
            "title" => "Register",
            "link" => "login"
        ]);

    }

    //Action Register
    public function registerAction(Request $request) {
        // Validasi data yang dimasukkan
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan kesalahan
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->login($user);

        return redirect($this->redirectTo)->with('success', 'Selamat Datang');
    }

    //Jalankan fungsi Login
    public function loginAction(Request $request) {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Jika otentikasi berhasil
            Session::flash('success', 'Selamat Datang!'); // Tambahkan pesan keberhasilan ke sesi
            return redirect('/'); // Ganti '/dashboard' sesuai dengan rute setelah login
        } else if(Auth::attempt($credentials)) {
            Session::flash('success', 'Selamat Datang!'); // Tambahkan pesan keberhasilan ke sesi
            return redirect('/'); // Ganti '/dashboard' sesuai dengan rute setelah login
        } else {
            // Jika otentikasi gagal
            return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
        }
    }

    //Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
