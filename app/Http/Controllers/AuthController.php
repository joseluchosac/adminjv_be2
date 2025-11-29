<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function createUser(CreateUserRequest $request)
  {
    // return response()->json($request->username);
    $user = User::create([
      'username' => $request->username,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    return response()->json([
      'success' => true,
      'msg' => 'Usuario creado satisfactoriamente',
      'token' => $user->createToken("API TOKEN")->plainTextToken,
    ]);
  }

  public function loginUser(LoginUserRequest $request)
  {
    if(!Auth::attempt($request->only(['username', 'password']))){
      return response()->json([
        'success' => false,
        'msg' => "Usuario o clave incorrectos"
      ], 401);
    };
    $user = User::where('username', $request->username)->first();
    return response()->json([
      'success' => true,
      'token' => $user->createToken("API TOKEN")->plainTextToken,
      'data' => $user,
    ]);
  }
}
