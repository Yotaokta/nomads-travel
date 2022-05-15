<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function home(Request $request)
    {
        return view('pages.login', ['title' => 'Login']);
    }

    public function register(Request $request)
    {
        return view('pages.register', ['title' => 'Register']);
    }

    public function createAccount(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|max:15|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT); 
        
        UserModel::create($data);
        return redirect('/auth/login');
    }

    public function isValidUser(Request $request)
    {
    
        $userValidate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($userValidate)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('invalid', 'gagal login');;
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/auth/login');
    }

}
