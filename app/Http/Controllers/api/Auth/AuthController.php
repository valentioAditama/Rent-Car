<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        try {
            $request->validate([
                'name' => 'required', 
                'email' => 'required|email|unique:users', 
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password'
            ]);
            
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $success['token'] = $user->createToken('MyToken')->plainTextToken;
            $success['name'] = $user->name;

            return response([
                'code' => 201,
                'status' => 'Created', 
                'message' => $success
            ], 201);

        } catch (\Throwable $error) {
            return response([
                'code' => '400', 
                'status' => 'Bad Request',
                'message' => $error->errros()
            ], 400);
        }
    } 

    public function login(Request $request) {
        try {
          $credentials = $request->only(['email', 'password']);
          if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MyToken')->plainTextToken;
            return response([
              'code' => 200,
              'status' => 'Ok', 
              'message' => $token
            ], 200);
          }
        } catch (\Throwable $error) {
            return response([
                'code' => '400', 
                'status' => 'Bad Request',
                'message' => $error->errros()
            ], 400);
        }
    }
}
