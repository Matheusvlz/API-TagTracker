<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\myUser;
use App\Models\Input;
use App\Models\Output;
use Illuminate\Support\Facades\Hash;
class ConfController extends Controller
{
    public function deletarProduto(Request $request)
    {
  
        $request->validate([
            'produto_nome' => 'required|string',
            'idempresa' => 'required|integer',
        ]);

        // Tentativa de deletar o produto
        $produto = Product::where('produto_nome', $request->produto_nome)
                          ->where('idempresa', $request->idempresa)
                          ->first();

        if ($produto) 
        {
            $produto->delete(); 
            return response()->json(['message' => 'Produto deletado com sucesso.'], 200);
        }

        return response()->json(['message' => 'Produto não encontrado.'], 404);
    }

    public function editarProduto(Request $request)
    {
     
        $request->validate([
            'produto_nome' => 'required|string',
            'idempresa' => 'required|integer',
            'novo_nome' => 'required|string',
            'novo_fornecedor' => 'required|string',
            
        ]);

      
        $produto = Product::where('produto_nome', $request->produto_nome)
                          ->where('idempresa', $request->idempresa)
                          ->first();

        if ($produto) 
        {
            $produto->produto_nome = $request->novo_nome; 
            $produto->fornecedor = $request->novo_fornecedor; 
            $produto->save(); 
            
            return response()->json(['message' => 'Produto atualizado com sucesso.'], 200);
        }

        return response()->json(['message' => 'Produto não encontrado.'], 404);
    }


    public function deletarFornecedor(Request $request)
    {
  
        $request->validate([
            'nome_fornecedor' => 'required|string',
            'idempresa' => 'required|integer',
        ]);

        // Tentativa de deletar o produto
        $fornecedor = Supplier::where('nome_fornecedor', $request->nome_fornecedor)
                          ->where('idempresa', $request->idempresa)
                          ->first();

        if ($fornecedor) 
        {
            $fornecedor->delete(); 
            return response()->json(['message' => 'Fornecedor deletado com sucesso.'], 200);
        }

        return response()->json(['message' => 'Fornecedor não encontrado.'], 404);
    }

    public function editarFornecedor(Request $request)
    {
     
        $request->validate([
            'nome_fornecedor' => 'required|string',
            'idempresa' => 'required|integer',
            'novo_nome' => 'required|string',
            'novo_endereco' => 'required|string',
            'novo_email' => 'required|string',
            
        ]);

      
        $fornecedor = Supplier::where('nome_fornecedor', $request->nome_fornecedor)
                          ->where('idempresa', $request->idempresa)
                          ->first();

        if ($fornecedor) 
        {
            $fornecedor->nome_fornecedor = $request->novo_nome; 
            $fornecedor->endereco = $request->novo_endereco; 
            $fornecedor->email = $request->novo_email; 
            $fornecedor->save(); 
            
            return response()->json(['message' => 'Produto atualizado com sucesso.'], 200);
        }

        return response()->json(['message' => 'Produto não encontrado.'], 404);
    }

    public function deletarUsuario(Request $request)
    {
  
        $request->validate([
            'nome_usuario' => 'required|string',
            'idempresa' => 'required|integer',
        ]);

        // Tentativa de deletar o produto
        $usuario = myUser::where('nome_usuario', $request->nome_usuario)
                          ->where('idempresa', $request->idempresa)
                          ->first();

        if ($usuario) 
        {
            $usuario->delete(); 
            return response()->json(['message' => 'Usuario deletado com sucesso.'], 200);
        }

        return response()->json(['message' => 'Usuario não encontrado.'], 404);
    }

    public function editarUsuario(Request $request)
    {
     
        $request->validate([
            'nome_usuario' => 'required|string',
            'idempresa' => 'required|integer',
            'senha' => 'required|string',
            'nivel' => 'required|integer',
            
        ]);

      
        $usuario = myUser::where('nome_usuario', $request->nome_usuario)
                          ->where('idempresa', $request->idempresa)
                          ->first();

        if ($usuario) 
        {
            $usuario->senha =  Hash::make($request->senha); 
            $usuario->nivel = $request->nivel; 
            $usuario->save(); 
            
            return response()->json(['message' => 'Usuário atualizado com sucesso.'], 200);
        }

        return response()->json(['message' => 'Usuário não encontrado.'], 404);
    }


    public function deletarEntrada(Request $request)
    {
  
        $request->validate([
            'uid' => 'required|string',
            'idempresa' => 'required|integer',
        ]);

        // Tentativa de deletar o uid
        $uid = Input::where('uid', $request->uid)
                          ->where('idempresa', $request->idempresa)
                          ->first();

        if ($uid) 
        {
            $uid->delete(); 
            return response()->json(['message' => 'Entrada deletada com sucesso.'], 200);
        }

        return response()->json(['message' => 'Entrada não encontrada.'], 404);
    }

    public function deletarSaida(Request $request)
    {
  
        $request->validate([
            'uid' => 'required|string',
            'idempresa' => 'required|integer',
        ]);

        // Tentativa de deletar o uid
        $uid = Output::where('uid', $request->uid)
                          ->where('idempresa', $request->idempresa)
                          ->first();

        if ($uid) 
        {
            $uid->delete(); 
            return response()->json(['message' => 'Saida deletada com sucesso.'], 200);
        }

        return response()->json(['message' => 'Saida não encontrada.'], 404);
    }

}