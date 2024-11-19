<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\myUser;
use App\Models\Input;
use App\Models\Output;

class EmpController extends Controller
{
    public function buscarDados(Request $request)
{
    // Valida o idempresa
    $validatedData = $request->validate([
        'idempresa' => 'required|integer',
    ]);

    // Busca os nomes dos fornecedores com base no idempresa
    $idempresa = $validatedData['idempresa'];
    $nomesFornecedores = Supplier::where('idempresa', $idempresa)->pluck('nome_fornecedor');

    // Retorna os nomes dos fornecedores em formato JSON
    return response()->json($nomesFornecedores);
}

public function buscarProduto(Request $request)
{
  
    $validatedData = $request->validate([
        'idempresa' => 'required|integer',
    ]);

   
    $idempresa = $validatedData['idempresa'];
    $produtos = Product::where('idempresa', $idempresa)->pluck('produto_nome');


    return response()->json($produtos);
}

public function buscarTabelaProduto(Request $request)
    {
        
        $request->validate([
            'idempresa' => 'required|integer',
        ]);

        $produtos = Product::where('idempresa', $request->idempresa)->get();

    
        if ($produtos->isEmpty()) {
            return response()->json([
                'message' => 'Nenhum produto encontrado para essa empresa.',
                'data' => []
            ], 404);
        }


        return response()->json($produtos);
    }


public function buscarTabelaFornecedor(Request $request)
{
    
    $request->validate([
        'idempresa' => 'required|integer',
    ]);

    $fornecedor = Supplier::where('idempresa', $request->idempresa)->get();


    if ($fornecedor->isEmpty()) {
        return response()->json([
            'message' => 'Nenhum fornecedor encontrado para essa empresa.',
            'data' => []
        ], 404);
    }


    return response()->json($fornecedor);
}

public function buscarUsuario(Request $request)
{
  
    $validatedData = $request->validate([
        'idempresa' => 'required|integer',
    ]);

   
    $idempresa = $validatedData['idempresa'];
    $produtos = myUser::where('idempresa', $idempresa)->pluck('nome_usuario');


    return response()->json($produtos);
}

public function buscarTabelaUsuario(Request $request)
{
    
    $request->validate([
        'idempresa' => 'required|integer',
    ]);

    $usuario = myUser::where('idempresa', $request->idempresa)->get();


    if ($usuario->isEmpty()) {
        return response()->json([
            'message' => 'Nenhum fornecedor encontrado para essa empresa.',
            'data' => []
        ], 404);
    }


    return response()->json($usuario);
}



public function buscarEntrada(Request $request)
{
  
    $validatedData = $request->validate([
        'idempresa' => 'required|integer',
    ]);

   
    $idempresa = $validatedData['idempresa'];
    $uid = Input::where('idempresa', $idempresa)->pluck('uid');


    return response()->json($uid);
}

public function buscarTabelaEntrada(Request $request)
{
    
    $request->validate([
        'idempresa' => 'required|integer',
    ]);

    $uid = Input::where('idempresa', $request->idempresa)->get();


    if ($uid->isEmpty()) {
        return response()->json([
            'message' => 'Nenhum saida encontrado para essa empresa.',
            'data' => []
        ], 404);
    }


    return response()->json($uid);
}

public function buscarSaida(Request $request)
{
  
    $validatedData = $request->validate([
        'idempresa' => 'required|integer',
    ]);

   
    $idempresa = $validatedData['idempresa'];
    $uid = Output::where('idempresa', $idempresa)->pluck('uid');


    return response()->json($uid);
}

public function buscarTabelaSaida(Request $request)
{
    
    $request->validate([
        'idempresa' => 'required|integer',
    ]);

    $uid = Output::where('idempresa', $request->idempresa)->get();


    if ($uid->isEmpty()) {
        return response()->json([
            'message' => 'Nenhuma saida encontrado para essa empresa.',
            'data' => []
        ], 404);
    }


    return response()->json($uid);
}


}
