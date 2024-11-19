<?php

namespace App\Http\Controllers;
require '/var/www/html/vendor/autoload.php';

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Input;
use App\Models\Output;
use App\Models\Product;
class UIDController extends Controller
{
    public function enviarUidParaPHP(Request $request)
    {
  
        $request->validate([
            'uid' => 'required|string',
        ]);

    
        $uid = $request->input('uid');

        
        $phpAppUrl = 'http://localhost/projetoFinal4/MVC/Controller/NewInput_Controller.php';  

        
        try 
        {
            $client = new Client();
            $response = $client->post($phpAppUrl, [
                'form_params' => [
                    'uid' => $uid,  
                ]
            ]);

         
            if ($response->getStatusCode() == 200) {
                return response()->json(['message' => 'UID enviado com sucesso para a aplicação PHP:  .'], 200);
            } 
            else 
            {
                return response()->json(['message' => 'Erro ao enviar UID para a aplicação PHP.'], 500);
            }
        } 
        catch (\Exception $e) 
        {
            return response()->json(['message' => 'Erro: ' . $e->getMessage()], 500);
        }
    }

    public function enviarArduino(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'produto' => 'required|string',
            'valor' => 'required|integer',
            'idempresa' => 'required|integer',
        ]);
    
        // Coleta os dados da requisição
        $produto = $request->input('produto');
        $valor = $request->input('valor');
        $idempresa = $request->input('idempresa');
       
        // URL do Arduino
        $phpAppUrl = 'http://192.168.0.177:80';  // IP do Arduino
    
        try 
        {
            // Usa Guzzle para fazer a requisição POST
            $client = new Client();
            $response = $client->post($phpAppUrl, [
                'json' => [
                    'produto' => $produto,
                    'valor' => $valor,
                    'idempresa' => $idempresa, 
                ],
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]);
    
            // Verifica a resposta da requisição
            if ($response->getStatusCode() == 200) {
                return response()->json(['message' => 'Dados enviados com sucesso para o Arduino.'], 200);
            } 
            else 
            {
                return response()->json(['message' => 'Erro ao enviar dados.'], 500);
            }
        } 
        catch (\Exception $e) 
        {
            return response()->json(['message' => 'Erro: ' . $e->getMessage()], 500);
        }
    }
    
    


    public function enviarEntrada(Request $request)
{
    $validated = $request->validate([
        'uid' => 'required|string', 
        'produto' => 'required|string',
        'idempresa' => 'required|integer',
        
    ]);

    // Extração dos dados validados
    $produto = $validated['produto'];
    $idempresa = $validated['idempresa'];
    $uid = $validated['uid']; 

   $status = "em Estoque";

    $input = Input::create([
        'nome_produto' => $produto,
        'status' => $status,
        'uid' => $uid,
        'idempresa' => $idempresa
    ]);

    \Log::info("Dados recebidos do Arduino: ", [
        'uid' => $uid, 
        'produto' => $produto,
        'idempresa' => $idempresa,
    ]);

    $this->attQuantidadeEntrada($produto, $idempresa);

    // Retorna uma resposta de sucesso
    return response()->json(['status' => 'success', 'message' => 'Dados recebidos com sucesso!']);
}

public function enviarSaida(Request $request)
{
    $validated = $request->validate([
        'uid' => 'required|string',
        'produto' => 'required|string',
        'idempresa' => 'required|integer',
    ]);

    // Extração dos dados validados

    $idempresa = $validated['idempresa'];
    $uid = $validated['uid']; 
    $produto = $this->procurarProduto($uid, $idempresa);

    $status = "Saiu de Estoque";
   if($produto == "nulo")
   {
   }
   else
   {
    $output = Output::create([
        'nome_produto' => $produto,
        'status' => $status,
        'uid' => $uid,
        'idempresa' => $idempresa
    ]);
    $this->attStatus($idempresa, $uid);
   }
   

   $this->attQuantidadeSaida($produto, $idempresa);
   

   
    // Retorna uma resposta de sucesso
    return response()->json(['status' => 'success', 'message' => 'Dados recebidos com sucesso!']);
}

public function  attQuantidadeEntrada($produto, $idempresa)
{
    $product = Product::where('produto_nome', $produto)
    ->where('idempresa', $idempresa)   
    ->first();
    if($product)
    {
        $quantidade = $product->quantidade;
            if($quantidade === 0 || $quantidade > 0)
            {
                $quantidade = $quantidade +1;
                $product->quantidade = $quantidade;
                $product->save();
            }
            else
            {

            }
    }
}

public function attQuantidadeSaida($produto, $idempresa)
{
    $product = Product::where('produto_nome', $produto)
                      ->where('idempresa', $idempresa)   
                      ->first();
        if($product)
        {
            $qnt = $product->quantidade;
            if($qnt === 0)
            {
                
            }
            else
            {
                $qnt = $qnt -1;
                $product->quantidade = $qnt;
                $product->save();
            }
        }
}

public function procurarProduto($uid, $idempresa)
{
    $product = Input::where('uid', $uid)
    ->where('idempresa', $idempresa)   
    ->first();

    if($product)
        {
            $nome = $product->nome_produto;
           return $nome;
        }
        return "nulo";
}


public function attStatus($idempresa, $uid)
{
    $product = Input::where('uid', $uid)
    ->where('idempresa', $idempresa)   
    ->first();
    if($product)
    {
                $product->status = "Saiu de Estoque";
                $product->save();
                
    }

}

}
