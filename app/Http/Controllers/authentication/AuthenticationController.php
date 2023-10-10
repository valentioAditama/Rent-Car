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
        try {
            $credentials = $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);
            
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                
                return redirect()->intended('/', 200);
            } else { 
                return redirect()->back()->with(['message' => 'Email and Password Invalid']);
            }
    
        } catch (\Throwable $error) {
            return redirect('/')->with(['message' => 'Berhasil Login']);
        }
    }

    public function register(Request $request) {
        try {
            $formData = $request->validate([
                'name' => 'required',
                'email' => 'email|required|unique:users',
                'password' => 'required|min:6'
            ]);
            
            User::create($formData);
            return redirect()->back()->with(['message' => 'Successfully Register']);    
        } catch (\Throwable $error) {
            return $error->getMessage();
        }
    } 

    public function logout() {

    }
}
