<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDadosTable extends Migration
{
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('produto_nome');
            $table->string('fornecedor');
            $table->integer('quantidade');
            $table->integer('idempresa');
            $table->timestamps();
        });

        Schema::create('entrada', function (Blueprint $table) {
            $table->id();
            $table->string('nome_produto');
            $table->string('status');
            $table->string('uid')->unique();
            $table->integer('idempresa');
            $table->timestamps();
        });

        Schema::create('saida', function (Blueprint $table) {
            $table->id();
            $table->string('nome_produto');
            $table->string('status');
            $table->string('uid')->unique();
            $table->integer('idempresa');
            $table->timestamps();
        });

        Schema::create('fornecedor', function (Blueprint $table) {
            $table->id();
            $table->string('nome_fornecedor');
            $table->string('endereco');
            $table->string('email');
            $table->string('cnpj');
            $table->integer('idempresa');
            $table->timestamps();
        });

        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('nome_usuario')->unique();
            $table->string('email')->unique();
            $table->string('senha');
            $table->integer('nivel');
            $table->integer('idempresa');
            $table->timestamps();
        });

        Schema::create('empresa', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produto');
        Schema::dropIfExists('entrada');
        Schema::dropIfExists('saida');
        Schema::dropIfExists('fornecedor');
        Schema::dropIfExists('usuario');
        Schema::dropIfExists('empresa');
    }
}
