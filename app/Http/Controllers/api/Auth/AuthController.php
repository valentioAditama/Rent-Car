<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
   public function register(Request $request) {
        try {
            //validate
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password'
            ]);

            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $successp['fullname'] = $user->fullname;

            return response()->json([
                'code' => 201, 
                'status' => 'Created', 
                'message' => $success
            ], 201);

        } catch (\Throwable $error) {
            return response()->json([
                'code' => 400, 
                'status' => 'Bad request', 
                'message' => $error->errors()
            ], 400);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->plainTextToken;
            return response()->json([
                'code' => 200, 
                'status' => 'Ok', 
                'message' => $token
            ], 200);
        }

        return response()->json([
            'code' => 401,
            'status' => 'Unauthorized'
        ], 401);
    }

    public function logout(){
      try {
        Auth::user()->tokens()->delete();
      } catch (\Throwable $error) {
        return response([
          'code' => 400, 
          'status' => 'Bad Request',
          'message' => $error->errros()
        ], 400);
      }
    }
}
