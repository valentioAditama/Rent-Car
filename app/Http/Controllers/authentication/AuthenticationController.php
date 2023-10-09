<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function loginIndex(){
        return view('authentication.login');
    }

    public function registerIndex() {
        return view('authentication.register');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->intended('/', 200);
        }
    }

    public function register(Request $request) {
        try {
            $formData = $request->validate([
                'name' => 'required',
                'email' => 'email|required|unique:users',
                'password' => 'required|min:6'
            ]);
            
            User::created($formData);    
        } catch (\Throwable $error) {
            return $error->getMessage();
        }
    } 

    public function logout() {

    }
}
