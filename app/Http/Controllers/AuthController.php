<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return view('register');
    }
    public function proses_register(Request $request)
    {
        $datasimpan = [
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'tgl_lahir' => $request->date,
        ];
        User::create($datasimpan);
        return redirect('/login');
    }

    public function proses_login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect('/explore');
        } else {
            echo "gagal login";
        }
    }



    // LOGOUT
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/login');
    }
}
