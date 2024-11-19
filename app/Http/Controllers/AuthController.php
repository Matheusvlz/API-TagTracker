<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\myUser; 
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'senha' => 'required|min:6',
    ]);

   
    $user = myUser::where('email', $request->email)->first();

   
    if ($user && Hash::check($request->senha, $user->senha)) 
    {
        return response()->json([
            'id' => true,
            'message' => 'Login realizado com sucesso.',
        ], 200);
    }

    return response()->json([
        'id' => false,
        'message' => 'Credenciais inválidas.',
    ], 401);
}

}
