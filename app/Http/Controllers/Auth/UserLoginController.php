<?php

namespace App\Http\Controllers\Auth;

use App\Helper\Alert;
use App\Helper\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    public function index() {
        if (Auth::check()) {
            Alert::simple('info', 'Selamat anda telah login menggunakan session');
            return $this->redirectHome();
        }
        return view('auth.login');
    }
    public function login(Request $request) {
        $validator = new ValidatorHelper($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        if ($validator->isValid()) return redirect()->back();
        try {
            $user = User::where('username', $validator->validated()['username'])->first();
            if ($user == null) {
                Alert::simple('danger', 'Username tidak dapat ditemukan');
                return redirect()->back();
            }
            if (Hash::check($validator->validated()['password'], $user->password)){
                Auth::login($user);
                Alert::simple('success', 'Selamat datang kembali ' . Auth::user()->name);
                return $this->redirectHome();
            }
            Alert::simple('danger', 'Password yang anda masukan salah');
            Alert::inputValue('username', $validator->validated()['username']);
            return redirect()->back();
        } catch (\Exception $err) {
            Alert::simple('danger', $err->getMessage());
            return redirect()->back();
        }
    }
    public function registerAdmin() {
        try {
            if (User::where('username', 'admin')->get()->count() != 0) {
                Alert::simple('danger', 'User admin sudah terdaftar sebelumnya');
                return redirect('/');
            }
            $password = Hash::make('Elko101299');
            User::create([
                'name' => 'Admin',
                'username' => 'admin',
                'password' => $password,
                'role' => 'admin'
            ]);
            Alert::simple('success', 'User admin berhasil di registrasi');
            return redirect('/');
        } catch (\Exception $err) {
            Alert::simple('danger', $err->getMessage());
            return redirect('/');
        }
    }
    public function redirectHome() {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            return redirect('/admin/home');
        }
        dd('error');
    }
    public function logout() {
        Auth::logout();
        Alert::simple('success', 'Anda telah berhasil logout');
        return true;
    }

}
