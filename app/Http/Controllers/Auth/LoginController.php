<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|password',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Redirect berdasarkan peran pengguna
            switch ($user->role) {
                case 'siswa':
                    return redirect()->intended('/siswa/peminjaman/create'); // Halaman peminjaman siswa
                case 'admin':
                    return redirect()->intended('/admin/dashboard'); // Halaman dashboard admin
                default:
                    return redirect()->route('login')->withErrors('Role tidak dikenali.');
            }
        }

        return redirect()->route('login')->withErrors('Email atau password salah.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
?>