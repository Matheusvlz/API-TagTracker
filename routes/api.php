<?php

use App\Http\Controllers\ConfController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DadosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\UIDController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando']);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/enviar-produto', [DadosController::class, 'produto']);
Route::post('/enviar-entrada', [DadosController::class, 'entrada']);
Route::post('/enviar-saida', [DadosController::class, 'saida']);
Route::post('/enviar-fornecedor', [DadosController::class, 'fornecedor']);
Route::post('/enviar-usuario', [DadosController::class, 'usuario']);
Route::post('/enviar-empresa', [DadosController::class, 'empresa']);
Route::get('/empresa-id', [DadosController::class, 'getid']);
Route::get('/usuario-id', [DadosController::class, 'getusuarioid']);
Route::get('/usuario-nivel', [DadosController::class, 'getnivel']);
Route::post('/buscar-dados-fornecedor', [EmpController::class, 'buscarDados']);
Route::post('/buscar-dados-produto', [EmpController::class, 'buscarProduto']);
Route::post('/buscar-tabela-produto', [EmpController::class, 'buscarTabelaProduto']);
Route::delete('/deletar-produto', [ConfController::class, 'deletarProduto']);
Route::put('/editar-produto', [ConfController::class, 'editarProduto']);
Route::post('/buscar-tabela-fornecedor', [EmpController::class, 'buscarTabelaFornecedor']);
Route::delete('/deletar-fornecedor', [ConfController::class, 'deletarFornecedor']);
Route::put('/editar-fornecedor', [ConfController::class, 'editarFornecedor']);
Route::post('/buscar-dados-usuario', [EmpController::class, 'buscarUsuario']);
Route::post('/buscar-tabela-usuario', [EmpController::class, 'buscarTabelaUsuario']);
Route::delete('/deletar-usuario', [ConfController::class, 'deletarUsuario']);
Route::put('/editar-usuario', [ConfController::class, 'editarUsuario']);
Route::post('/enviar-uid', [UIDController::class, 'enviarUidParaPHP']);
Route::post('/enviar-arduino', [UIDController::class, 'enviarArduino']);
Route::post('/dados-entrada-arduino', [UIDController::class, 'enviarEntrada']);
Route::post('/dados-saida-arduino', [UIDController::class, 'enviarSaida']);
Route::post('/buscar-dados-entrada', [EmpController::class, 'buscarEntrada']);
Route::post('/buscar-tabela-entrada', [EmpController::class, 'buscarTabelaEntrada']);
Route::delete('/deletar-entrada', [ConfController::class, 'deletarEntrada']);
Route::post('/buscar-dados-saida', [EmpController::class, 'buscarSaida']);
Route::post('/buscar-tabela-saida', [EmpController::class, 'buscarTabelaSaida']);
Route::delete('/deletar-saida', [ConfController::class, 'deletarSaida']);