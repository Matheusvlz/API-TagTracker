<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Input as ProductInput;
use App\Models\Output as ProductOutput;
use App\Models\Supplier;
use App\Models\myUser;
use App\Models\Enterprise;
use Illuminate\Support\Facades\Hash;


class DadosController extends Controller
{
    public function produto(Request $request)
    {
       
        $validatedData = $request->validate([
            'produto_nome' => 'required|string|max:255',
            'fornecedor' => 'required|string|max:255',
            'quantidade' => 'required|integer',
            'idempresa' => 'required|integer|exists:empresa,id',
        ]);

    
        $product = Product::create([
            'produto_nome' => $validatedData['produto_nome'],
            'fornecedor' => $validatedData['fornecedor'],
            'quantidade' => $validatedData['quantidade'],
            'idempresa' => $validatedData['idempresa']
        ]);

        return response()->json(['message' => 'Produto criado com sucesso'], 201);
    }

    public function entrada(Request $request)
    {
       
        $validatedData = $request->validate([
            'nome_produto' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'uid' => 'required|string|max:255',
            'idempresa' => 'required|integer|exists:empresa,id',
        ]);

       
        $input = ProductInput::create([
            'nome_produto' => $validatedData['nome_produto'],
            'status' => $validatedData['status'],
            'uid' => $validatedData['uid'],
            'idempresa' => $validatedData['idempresa']
        ]);

        return response()->json(['message' => 'Entrada criada com sucesso'], 201);
    }

    public function saida(Request $request)
    {
    
        $validatedData = $request->validate([
            'nome_produto' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'uid' => 'required|string|max:255',
            'idempresa' => 'required|integer|exists:empresa,id',
        ]);

     
        $output = ProductOutput::create([
            'nome_produto' => $validatedData['nome_produto'],
            'status' => $validatedData['status'],
            'uid' => $validatedData['uid'],
            'idempresa' => $validatedData['idempresa']
        ]);

        return response()->json(['message' => 'Saída criada com sucesso'], 201);
    }

    public function fornecedor(Request $request)
    {
       
        $validatedData = $request->validate([
            'nome_fornecedor' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:fornecedor,email',
            'cnpj' => 'required|string|max:18|unique:fornecedor,cnpj',
            'idempresa' => 'required|integer|exists:empresa,id',
        ]);

        
        $supplier = Supplier::create([
            'nome_fornecedor' => $validatedData['nome_fornecedor'],
            'endereco' => $validatedData['endereco'],
            'email' => $validatedData['email'],
            'cnpj' => $validatedData['cnpj'],
            'idempresa' => $validatedData['idempresa']
            
        ]);

        return response()->json(['message' => 'Fornecedor criado com sucesso'], 201);
    }

    public function usuario(Request $request)
    {
  
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'nome_usuario' => 'required|string|max:255|unique:usuario,nome_usuario',
            'email' => 'required|email|max:255|unique:usuario,email',
            'senha' => 'required|string|min:6',
            'nivel' => 'required|integer',
            'idempresa' => 'required|integer|exists:empresa,id',
        ]);

     
        $user = myUser::create([
            'nome' => $validatedData['nome'],
            'nome_usuario' => $validatedData['nome_usuario'],
            'email' => $validatedData['email'],
            'senha' => Hash::make($validatedData['senha']),
            'nivel' => $validatedData['nivel'],
            'idempresa' => $validatedData['idempresa']
        ]);

        return response()->json(['message' => 'Usuário criado com sucesso'], 201);
    }

    public function empresa(Request $request)
    {
        
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:empresa,email',
            'senha' => 'required|string|min:6',
        ]);

       
        $enterprise = Enterprise::create([
            'nome' => $validatedData['nome'],
            'email' => $validatedData['email'],
            'senha' => Hash::make($validatedData['senha'])

        ]);

        return response()->json(['message' => 'Empresa criada com sucesso'], 201);
    }
    public function getid(Request $request)
    {
        $email = $request->query('email');

        $empresa = Enterprise::where('email', $email)->first();

        if ($empresa) 
        {
            return response()->json(['id' => $empresa->id]);
        } 
        else 
        {
            return response()->json(['error' => 'Empresa não encontrada'], 404);
        }
    }
    public function getusuarioid(Request $request)
    {   
        $email = $request->query('email');

        $usuario = myUser::where('email', $email)->first();

        if ($usuario) 
        {
            return response()->json(['idempresa' => $usuario->idempresa]);
        } 
        else 
        {
            return response()->json(['error' => 'Empresa não encontrada'], 404);
        }
    }

    public function getnivel(Request $request)
    {   
        $email = $request->query('email');

        $usuario = myUser::where('email', $email)->first();

        if ($usuario) 
        {
            return response()->json(['nivel' => $usuario->nivel]);
        } 
        else 
        {
            return response()->json(['error' => 'Empresa não encontrada'], 404);
        }
    }

}
