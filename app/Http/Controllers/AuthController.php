<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\AdminModel;
use App\Models\MahasiswaModel;
use App\Models\DosenModel;
use App\Models\RoleModel;
use \Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
            'status' => false,
            'message' => 'Validasi gagal',
            'errors' => $validator->errors()
            ], 422);
        }

        $credentials = $request->only('username', 'password');
        $guards = ['admin', 'mahasiswa', 'dosen'];
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->attempt($credentials)) {
            $request->session()->regenerate();
            $redirectUrl = '/beranda';
            switch ($guard) {
                case 'admin':
                $redirectUrl = '/admin/beranda';
                break;
                case 'mahasiswa':
                $redirectUrl = '/mahasiswa/beranda';
                break;
                case 'dosen':
                $redirectUrl = '/dosen/beranda';
                break;
            }
            return response()->json([
                'status' => true,
                'message' => 'Login berhasil',
                'redirect' => $redirectUrl
            ]);
            }
        }

        return response()->json([
            'status' => false,
            'message' => 'Username atau password salah'
        ], 401);
    }

    public function logout(Request $request)
    {
        foreach (['admin', 'mahasiswa', 'dosen'] as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
            }
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
